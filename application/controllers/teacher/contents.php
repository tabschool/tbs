<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Contents extends CI_Controller{
    public function __construct(){
        parent::__construct();
        clear_cache();
        _check_user_login();  //check login authentication
        $this->load->model('content_model');
    }

    public function index($offset = 0){
        //teacher_loggedin_id();
        $per_page = 15;
        $data['contents'] = $this->content_model->contents($offset,$per_page,teacher_loggedin_id());
        $config = backend_pagination();
        $config['base_url'] = base_url() . 'teacher/contents/index/';
        $config['total_rows'] = $this->content_model->contents(0,0,teacher_loggedin_id());
        $config['per_page'] = $per_page;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $data['template'] = "teacher/contents/contents";
        $this->load->view('templates/user/teacher_layout', $data);
    }

    public function add()
    {
        $data['teacher'] = $this->content_model->get_row('users',array('id'=>teacher_loggedin_id(),'logn_status'=>1,'status'=>1));
        if(empty($data['teacher'])){
            redirect('auth/login');
        } 
        $data['institute_courses'] = $this->content_model->get_result('courses',array('institute_id'=>$data['teacher']->parent_id)); 

        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('start_date', 'Start date', 'trim|required');
        $this->form_validation->set_rules('end_date', 'End date', 'trim|required');
        $this->form_validation->set_rules('content-course', 'Course', 'trim|required');
        $this->form_validation->set_rules('content-branch', 'Branch', 'trim|required');
        $this->form_validation->set_rules('content-semester', 'Year semester', 'trim|required');
        $this->form_validation->set_rules('content-subject', 'Subjects', 'trim|required');
        $this->form_validation->set_rules('parameters', 'H5P Content', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="error text-danger">', '</div>');
        if($this->form_validation->run() == TRUE){

            $content_data=array(
                                'user_id' => teacher_loggedin_id(),
                                'institute_id' => $data['teacher']->parent_id,
                                'title' => $this->input->post('title'),
                                'description' => $this->input->post('description'),
                                'startDate' => date('Y-m-d',strtotime($this->input->post('start_date'))),
                                'endDate' =>  date('Y-m-d',strtotime($this->input->post('end_date'))),
                                'start_HH' => $this->input->post('start_HH'),
                                'start_MM' => $this->input->post('start_MM'),
                                'start_meridian' => $this->input->post('start_meridian'),
                                'end_HH' => $this->input->post('end_HH'),
                                'end_MM' => $this->input->post('end_MM'),
                                'end_meridian' => $this->input->post('end_meridian'),
                                'course' => $this->input->post('content-course'),
                                'branch' => $this->input->post('content-branch'),
                                'semester' => $this->input->post('content-semester'),
                                'subject' => $this->input->post('content-subject'),
                                //'fileName' => $this->input->post('fileName'),                
                                'created_at' => date('Y-m-d h:i:s')
                            );

            if($this->input->post('parameters') !== null){
                $content_data['content'] = json_encode($this->input->post('parameters'));
            }
            if($this->input->post('parameters') !== null){
                $content_data['filtered'] = json_encode($this->input->post('parameters'));
            }
            if ($this->input->post('library') !== null){
                $content_data['library_id'] = $this->input->post('library');
            }
        

            if ($this->content_model->insert('contents', $content_data)) {
                $this->session->set_flashdata('msg_success', 'New content added successfully.');
                redirect('teacher/contents/');
            } else {
                $this->session->set_flashdata('msg_error', 'New adding content failed, Please try again.');
                 redirect('teacher/contents/');
            }


        }

        //$data[''] = $this->
        $data['template'] = "teacher/contents/add";
        $this->load->view('templates/user/teacher_layout', $data);
    }

    function get_course_branches()
    {
        $array = array(); $resp=''; 
        if($_POST['status']=='status'){
            $branches =  $this->content_model->get_result('course_branches',array('institute_id'=>$_POST['institute_id'],'course_id'=>$_POST['course_id']));  
            if(!empty($branches)){
                $resp.='<option value="">- Select Branch- </option>';
                foreach ($branches as $row) {
                   $resp.='<option value="'.$row->id.'">'.ucfirst($row->branch_name).'</option>';
                }
                $array['status'] = TRUE;
                $array['resp'] = $resp;
                echo  json_encode($array); 
                return TRUE;

            } else {
                $array['status'] = FALSE;
                $array['resp'] = '';
                echo  json_encode($array); 
                return FALSE;
            }            
        } else {
            $array['status'] = FALSE;
            $array['resp'] = '';
            echo  json_encode($array); 
            return FALSE;
        }
        
    }
    function get_course_semesters()
    {
        $array = array(); $resp=''; 
        if($_POST['status']=='status'){
            $semesters =  $this->content_model->get_result('course_semester',array('institute_id'=>$_POST['institute_id'],'course_id'=>$_POST['course_id'],'branch_id'=>$_POST['branch_id']));  
            if(!empty($semesters)){
                $resp.='<option value="">- Select Year Semesters- </option>';
                foreach ($semesters as $row) {
                   $resp.='<option value="'.$row->id.'">'.ucfirst($row->semester).'</option>';
                }
                $array['status'] = TRUE;
                $array['resp'] = $resp;
                echo  json_encode($array); 
                return TRUE;

            } else {
                $array['status'] = FALSE;
                $array['resp'] = '';
                echo  json_encode($array); 
                return FALSE;
            }            
        } else {
            $array['status'] = FALSE;
            $array['resp'] = '';
            echo  json_encode($array); 
            return FALSE;
        }
        
    }

    function get_course_subjects()
    {
        $array = array(); $resp=''; 
        if($_POST['status']=='status'){
            $subjects =  $this->content_model->get_result('course_semester_subjects',array('institute_id'=>$_POST['institute_id'],'course_id'=>$_POST['course_id'],'branch_id'=>$_POST['branch_id'],'semester_id'=>$_POST['semester_id']));  
            if(!empty($subjects)){
                $resp.='<option value="">- Select Subject - </option>';
                foreach ($subjects as $row) {
                   $resp.='<option value="'.$row->id.'">'.ucfirst($row->subject_name).'</option>';
                }
                $array['status'] = TRUE;
                $array['resp'] = $resp;
                echo  json_encode($array); 
                return TRUE;

            } else {
                $array['status'] = FALSE;
                $array['resp'] = '';
                echo  json_encode($array); 
                return FALSE;
            }            
        } else {
            $array['status'] = FALSE;
            $array['resp'] = '';
            echo  json_encode($array); 
            return FALSE;
        }
        
    }

    public function edit($content_id = 0) {
         
        if (empty($content_id)) redirect('teacher/contents');

        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('startDate', 'Start date', 'trim|required');
        $this->form_validation->set_rules('endDate', 'End date', 'trim|required');
        $this->form_validation->set_rules('branch', 'Branch', 'trim|required');
        $this->form_validation->set_rules('subjects', 'Subjects', 'trim|required');
        $this->form_validation->set_rules('yearSemester', 'Year semester', 'trim|required');
        $this->form_validation->set_rules('fileName', 'file name', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="error text-danger">', '</div>');
        if($this->form_validation->run() == TRUE){

            $content_data = array( 
                                    'user_id' => user_id(),
                                    'title' => $this->input->post('title'),
                                    'description' => $this->input->post('description'),
                                    'startDate' => $this->input->post('startDate'),
                                    'endDate' => $this->input->post('endDate'),
                                    'branch' => $this->input->post('branch'),
                                    'subjects' => $this->input->post('subjects'),
                                    'yearSemester' => $this->input->post('yearSemester'),
                                    'fileName'   => $this->input->post('fileName'),
                                    'updated_at' => date('Y-m-d h:i:s')
                                );

            if ($this->content_model->update('contents', $content_data, array('id' => $content_id ,'user_id'=>user_id() ))) {
               
                $this->session->set_flashdata('msg_success', 'Content updated successfully.');
                redirect('teacher/contents');

            } else {

                $this->session->set_flashdata('msg_error', 'Updating Content failed, Please try again.');
                redirect('teacher/contents');

            }
        }
        $data['contents'] = $this->content_model->get_row('contents', array('id' => $content_id ,'user_id'=>user_id() ));
        
        $data['template'] = "teacher/contents/edit";
        $this->load->view('templates/backend/layout', $data);
    }

    public function view($content_id = 0)
    {         
        if (empty($content_id)) redirect('teacher/contents');

        $data['contents'] = $this->content_model->get_row('contents', array('id' => $content_id,'user_id'=>user_id() ));

        $data['template'] = "teacher/contents/view";
        $this->load->view('templates/backend/layout', $data);
    }

    public function delete($content_id = 0)
    {         
        if (empty($content_id)) redirect('teacher/contents');

        if ($this->content_model->delete('contents', array('id' => $content_id,'user_id'=>user_id()))) {
            $this->session->set_flashdata('msg_success', 'Content deleted successfully.');
            redirect('teacher/contents');
        } else {
            $this->session->set_flashdata('msg_error', 'Delete failed, Please try again.');
            redirect('teacher/contents');
        }
    }


}
