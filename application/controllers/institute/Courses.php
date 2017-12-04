<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Courses extends CI_Controller{

    public function __construct(){
        parent::__construct();
        clear_cache();
        _check_institute_login();  //check  login authentication
        $this->load->model('course_model');
    }

    public function index($offset = 0){

        $per_page = 15;
        $data['courses'] = $this->course_model->courses($offset, $per_page,user_id());
        $config = backend_pagination();
        
        $data['offset']= $offset;

        $config['base_url'] = base_url() . 'institute/Courses/index/';
        $config['total_rows'] = $this->course_model->courses(0, 0,user_id());
        $config['per_page'] = $per_page;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $data['template'] = "institute/courses/index";
        $this->load->view('templates/user/layout', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('course_name', 'Course Name', 'required');
        $this->form_validation->set_rules('course_category_id', 'Course Category ', 'required');
        $this->form_validation->set_rules('duration_year_sem_months', 'Course Duration', 'required|numeric');

        $this->form_validation->set_error_delimiters('<div class="error text-danger">', '</div>');
        if ($this->form_validation->run() == TRUE) {
        
            $course_data  =  array(
                                    'institute_id' =>  user_id(),
                                    'course_category_id' =>  $this->input->post('course_category_id'),
                                    'course_name'  =>  $this->input->post('course_name'),
                                    'duration_year_sem_months'  =>  $this->input->post('duration_year_sem_months'),
                                    'status'       =>  1,
                                    'create_time'  =>  date('Y-m-d H:i:s'),
                                );

            if ($this->course_model->insert('courses', $course_data)) {
                $this->session->set_flashdata('msg_success', 'New course added successfully.');
                redirect('institute/courses');
            } else {
                $this->session->set_flashdata('msg_error', 'New adding course failed, Please try again.');
                redirect('institute/courses');
            }
        }

        $data['category'] = $this->course_model->get_result('course_category',array('status'=>1));
        $data['template'] = "institute/courses/add";
        $this->load->view('templates/user/layout', $data);
    }

    public function edit($course_id = 0) {
         
        if(empty($course_id)) redirect('institute/courses');
        $data['course'] = $this->course_model->get_row('courses',array('id'=>$course_id));
        if(empty($data['course'])) redirect('institute/courses/'); 

        $data['category'] = $this->course_model->get_result('course_category',array('status'=>1));

       $this->form_validation->set_rules('course_name', 'Course Name', 'required');
        $this->form_validation->set_rules('course_category_id', 'Course Category ', 'required');
        $this->form_validation->set_rules('duration_year_sem_months', 'Course Duration', 'required|numeric');

        $this->form_validation->set_error_delimiters('<div class="error text-danger">', '</div>');
        if ($this->form_validation->run() == TRUE) {
             $course_data = array(
                                  
                                    'course_category_id' =>  $this->input->post('course_category_id'),
                                    'course_name'  =>  $this->input->post('course_name'),
                                    'duration_year_sem_months'  =>  $this->input->post('duration_year_sem_months'),
                                    'status'       =>  1,
                                    'create_time'  =>  date('Y-m-d H:i:s'),
                                );
            if ($this->course_model->update('courses', $course_data, array('id' => $course_id))) {
                $this->session->set_flashdata('msg_success', 'Course updated successfully.');
                redirect('institute/courses');
            } else {
                $this->session->set_flashdata('msg_error', 'Updating course failed, Please try again.');
                redirect('institute/courses');
            }
        }
        
        $data['template'] = "institute/courses/edit";
        $this->load->view('templates/user/layout', $data);
    }

    // public function view($course_id = 0)
    // {         
    //     if (empty($course_id)) redirect('institute/courses');
    //     $data['course'] = $this->course_model->get_row('courses', array('id' => $course_id));

    //     $data['template'] = "institute/courses/view";
    //     $this->load->view('templates/user/layout', $data);
    // }

    public function delete($course_id = 0)
    {         
        if (empty($course_id)) redirect('institute/courses');

        if ($this->course_model->delete('courses', array('id' => $course_id))) {
            $this->session->set_flashdata('msg_success', 'Course deleted successfully.');
            redirect('institute/courses');
        } else {
            $this->session->set_flashdata('msg_error', 'Delete failed, Please try again.');
            redirect('institute/courses');
        }
    }



    function branches($course_id='',$offset=0)
    {
      
        if(empty($course_id)) redirect('institute/courses/'); 
        $data['course'] = $this->course_model->get_row('courses',array('id'=>$course_id));
        if(empty($data['course'])) redirect('institute/courses/'); 

        $per_page=25;
        $data['branches'] = $this->course_model->branches($offset,$per_page,$course_id);
        $data['offset'] = $offset;
        $config=backend_pagination();
        $config['base_url'] = base_url().'institute/courses/branches/'.$course_id.'/';
        $config['total_rows'] = $this->course_model->branches(0,0,$course_id);
        $config['per_page'] = $per_page;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['pagination']=$this->pagination->create_links();    

            
        $data['template'] = "institute/courses/branch_list";
        $this->load->view('templates/user/layout', $data);
    }   

    public function  add_branch($course_id='')
    {
        if(empty($course_id)) redirect('institute/courses/'); 
        $data['course'] = $this->course_model->get_row('courses',array('id'=>$course_id));
        if(empty($data['course'])) redirect('institute/courses/'); 

        $this->form_validation->set_rules('branch_name', 'Branch Name', 'required');
       
        $this->form_validation->set_error_delimiters('<div class="error text-danger">', '</div>');
        if($this->form_validation->run() == TRUE){
            
            $branch_data = array(
                                    'institute_id' => user_id(),
                                    'course_id'    =>  $data['course']->id,
                                    'branch_name'  =>  $this->input->post('branch_name'),
                                    'status'       =>  1,
                                    'create_time'  =>  date('Y-m-d H:i:s'),
                                );


            if($this->course_model->insert('course_branches', $branch_data ,array('id'=>$data['course']->id))){

                $this->session->set_flashdata('msg_success','Course has updated successfully.');
                redirect('institute/courses/branches/'.$data['course']->id);
            
            }else{
                $this->session->set_flashdata('msg_error','Operation failed, Please try again.');
                redirect('institute/courses/branches/'.$data['course']->id);
            }

        }

        $data['template'] = "institute/courses/add_branch";
        $this->load->view('templates/user/layout', $data);
         
    }  

    public function  edit_branch($course_id='',$branch_id='')
    {
        if(empty($course_id)) redirect('institute/courses/'); 
        $data['course'] = $this->course_model->get_row('courses',array('id'=>$course_id));
        if(empty($data['course'])) redirect('institute/courses/'); 

        if(empty($branch_id)) redirect('institute/courses/branches/'.$data['course']->id); 
        $data['branch'] = $this->course_model->get_row('course_branches',array('course_id'=>$course_id,'id'=>$branch_id));
        if(empty($data['branch'])) redirect('institute/courses/branches/'.$data['course']->id); 


        $this->form_validation->set_rules('branch_name', 'Branch Name', 'required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if($this->form_validation->run() == TRUE){
            
            $branch_data = array(

                                    'branch_name'  =>  $this->input->post('branch_name'),
                                    'status'       =>  1,
                                    'update_time'  =>  date('Y-m-d H:i:s'),
                                );


            if($this->course_model->update('course_branches', $branch_data ,array('id'=>$data['branch']->id))){

                $this->session->set_flashdata('msg_success','Course has updated successfully.');
                redirect('institute/courses/branches/'.$data['course']->id);
            
            }else{

                $this->session->set_flashdata('msg_error','Operation failed, Please try again.');
                redirect('institute/courses/branches/'.$data['course']->id);
            
            }

        }
         
        $data['template'] = "institute/courses/edit_branch";
        $this->load->view('templates/user/layout', $data);
    }    

    function semesters($course_id='',$branch_id='',$offset=0)
    {

        if(empty($course_id)) redirect('institute/courses/'); 
        $data['course'] = $this->course_model->get_row('courses',array('id'=>$course_id));
        if(empty($data['course'])) redirect('institute/courses/'); 

        if(empty($branch_id)) redirect('institute/courses/branches/'.$data['course']->id); 
        $data['branch'] = $this->course_model->get_row('course_branches',array('course_id'=>$course_id,'id'=>$branch_id));
        if(empty($data['branch'])) redirect('institute/courses/branches/'.$data['course']->id); 

        $per_page=25;
        $data['semesters'] = $this->course_model->semesters($offset,$per_page,$course_id,$branch_id);
        $data['offset']    = $offset;
        $config=backend_pagination();
        $config['base_url'] = base_url().'institute/courses/semesters/'.$course_id.'/'.$branch_id.'/';
        $config['total_rows'] = $this->course_model->semesters(0,0,$course_id,$branch_id);
        $config['per_page'] = $per_page;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['pagination']=$this->pagination->create_links();    

        $data['template'] = "institute/courses/semester_list";
        $this->load->view('templates/user/layout', $data);
    } 

    public function semester_add($course_id='',$branch_id='',$offset=0)
    {

        if(empty($course_id)) redirect('institute/courses/'); 
        $data['course'] = $this->course_model->get_row('courses',array('id'=>$course_id));
        if(empty($data['course'])) redirect('institute/courses/'); 

        if(empty($branch_id)) redirect('institute/courses/branches/'.$data['course']->id); 
        $data['branch'] = $this->course_model->get_row('course_branches',array('course_id'=>$course_id,'id'=>$branch_id));
        if(empty($data['branch'])) redirect('institute/courses/branches/'.$data['course']->id); 

        $this->form_validation->set_rules('semester_name', 'Semester Name', 'required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        if($this->form_validation->run() == TRUE){
            
            $sem_data = array(
                                'institute_id' =>  user_id(),
                                'course_id'    =>  $data['course']->id,
                                'branch_id'    =>  $data['branch']->id,
                                'semester'     =>  $this->input->post('semester_name'),
                                'status'       =>  1,
                                'create_time'  =>  date('Y-m-d H:i:s'),
                            );


            if($insert_id =$this->course_model->insert('course_semester', $sem_data)){

                for($i=0; $i<count($this->input->post('subject_name')); $i++){
                    $semester = array();
                    
                    $semester['institute_id'] = $data['course']->institute_id;
                    $semester['course_id'] = $data['course']->id;
                    $semester['branch_id'] = $data['branch']->id;
                    $semester['semester_id'] = $insert_id ;
                    $semester['subject_name'] = $_POST['subject_name'][$i];
                    $semester['description'] = $_POST['description'][$i];
                    $semester['create_time'] = date('Y-m-d H:i:s');
                
                    $semester['status'] =1;
                    
                    $this->course_model->insert('course_semester_subjects',$semester); 
                }
            
           

                $this->session->set_flashdata('msg_success','Semester has updated successfully.');
                redirect('institute/courses/semesters/'.$data['course']->id.'/'.$data['branch']->id);
            
            }else{

                $this->session->set_flashdata('msg_error','Operation failed, Please try again.');
                 redirect('institute/courses/semesters/'.$data['course']->id.'/'.$data['branch']->id);
            
            }

        }

       
         $data['template'] = "institute/courses/semester_add";
        $this->load->view('templates/user/layout', $data);
    } 
     

    function semester_delete($semester_id='',$course_id='',$branch_id='')
    {
        if(empty($semester_id))  redirect('institute/courses/');

        $this->institute_model->delete('course_semester',array('id'=>$semester_id,'branch_id'=>$branch_id,'course_id'=>$course_id));

        $this->institute_model->delete('course_semester_subjects',array('semester_id'=>$semester_id,'branch_id'=>$branch_id,'course_id'=>$course_id));
        $this->session->set_flashdata('msg_success','Semester has been deleted successfully.');
        
        redirect('institute/courses/semesters/'.$course_id.'/'.$branch_id); 
    }

    function branch_delete($course_id='',$branch_id='')
    {
        if(empty($course_id) || empty($branch_id))   redirect('institute/courses/');

        $this->institute_model->delete('course_branches',array('id'=>$branch_id,'course_id'=>$course_id));

        $this->institute_model->delete('course_semester',array('branch_id'=>$branch_id,'course_id'=>$course_id));
        $this->session->set_flashdata('msg_success','Branch has been deleted successfully.');
        
         redirect('institute/courses/branches/'.$course_id);
    }

    function view($view,$data=""){
        $this->load->view('elements/institute/header',$data);
        if($this->uri->segment('2') != 'signup' && $this->uri->segment('3') != 'checkout' && $this->uri->segment(1) != "resendOTP" && $this->uri->segment(3) != "check_otp" && $this->uri->segment(2) != "plans" && $this->uri->segment(2) != "bulkupload" && $this->uri->segment(2) != "bulkupload_teacher"){
            $this->load->view('elements/institute/sidebar',$data);
        }
        $this->load->view($view,$data);
        $this->load->view('elements/institute/footer',$data);
    }

    public function category_delete($id='',$offset=''){

        if(empty($id))  redirect('institute/courses/categories/'.$offset);

        $this->institute_model->delete('course_category',array('id'=>$id));
        $this->session->set_flashdata('msg_success','Category has been deleted successfully.');
        
        redirect('institute/courses/categories/'.$offset); 

    }


}
