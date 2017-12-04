<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Teachers extends CI_Controller{
    public function __construct(){
        parent::__construct();
        clear_cache();
        _check_user_login();  //check login authentication
        $this->load->model('user_model');
    }

    public function index($offset=0){

        $per_page = 10;
        $data['teachers'] = $this->user_model->institute_teachers($offset, $per_page);
        $config = backend_pagination();
        $config['base_url'] = base_url() . 'institute/teachers/index/';
        $config['total_rows'] = $this->user_model->institute_teachers(0, 0);
        $config['per_page'] = $per_page;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();


        $data['template'] = "institute/teachers/index";
        $this->load->view('templates/user/layout', $data);
    }

    // function email_check($str=''){
    //    if($this->user_model->get_row('users',array('email'=>$str))):
    //         $this->form_validation->set_message('email_check', 'The %s already exists.');
    //         return FALSE;
    //    else:
    //         return TRUE;
    //    endif;
    // }

    function check_email($email,$id){  
        if($_POST){ 	
            $user_info = $this->user_model->get_row('users', array('id'=>$id));  
            if($_POST['email']!=$user_info->email){
              $resp = $this->user_model->get_row('users', array('email'=>$_POST['email']));
              if($resp){
                $this->form_validation->set_message('check_email', 'Email already exist.');
                return FALSE;
            } else{
                return TRUE;
            }
            }else{
                return TRUE;
            }
        }
    }


    public function add(){

        $this->form_validation->set_rules('teacher_id[]', 'Teacher Id', 'trim|required');
        $this->form_validation->set_rules('first_name[]', 'First name', 'trim|required');
        $this->form_validation->set_rules('last_name[]', 'Last name', 'trim|required');
        $this->form_validation->set_rules('email[]', 'Email address', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('contact[]', 'Phone', 'trim|required');
        
        $this->form_validation->set_error_delimiters('<div class="error text-danger">', '</div>');
        if ($this->form_validation->run() == TRUE) {
                      
            $formValues = $this->input->post(NULL, TRUE);
            $existU= 0;
            $newU= 0;
            for ($i=0; $i < count($_POST['email']) ; $i++) { 
                $where = array('email' => $formValues['email'][$i] , 'enrollment_number' => $formValues['teacher_id'][$i] );
                $teacherExist= $this->user_model->get_row('users', $where);
                
                if($teacherExist){
                    $existU++;
                }else{        
                    $newU++;        
                    $pass = generateRandomString();
                    $teacher_data = array(
                        'role' => 3,
                        'status' => 1,                
                        'parent_id' => user_id(),             
                        'enrollment_number' => $formValues['teacher_id'][$i],        
                        'first_name' => $formValues['first_name'][$i],
                        'last_name' => $formValues['last_name'][$i],
                        'email' => $formValues['email'][$i],
                        'fullName' => $formValues['first_name'][$i]." ". $formValues['last_name'][$i],
                        'password' => sha1($pass),
                        'mobile' => $formValues['contact'][$i],                
                        //'created_at' => date('Y-m-d h:i:s')
                    );
                    $this->user_model->insert('users', $teacher_data);
                } 
            }

            $this->session->set_flashdata('msg_success', ''.$newU.' new and '.$existU.'exist teacher account created successfully.');
            redirect('institute/teachers');
            /*if ($this->user_model->insert('users', $teacher_data)) {
                $this->session->set_flashdata('msg_success', 'New teacher account created successfully.');
                redirect('institute/teachers');
            } else {
                $this->session->set_flashdata('msg_error', 'New teacher account failed, Please try again.');
                redirect('institute/teachers');
            }*/
        }

        $data['template'] = "institute/teachers/add";
        $this->load->view('templates/user/layout', $data);
    }

    public function edit($id=0){
        $data['teachers'] = $this->user_model->get_row('users', array('id' => $id,'parent_id'=>user_id()));
        
       
        
        if(empty( $data['teachers']))
        redirect('institute/teachers');

        $this->form_validation->set_rules('teacher_id', 'Teacher Id.', 'trim|required');
        $this->form_validation->set_rules('first_name', 'First name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last name', 'trim|required');
       
       	$this->form_validation->set_rules('email','Email','trim|required|valid_email|callback_check_email['.$data['teachers']->id.']');

        $this->form_validation->set_rules('contact', 'Phone', 'trim|required');
        
        $this->form_validation->set_error_delimiters('<div class="error text-danger">', '</div>');
        if ($this->form_validation->run() == TRUE) {
                      
            $formValues = $this->input->post(NULL, TRUE);
            $teacher_data = array(
                              
                'parent_id' => user_id(),             
                'unique_number' => $this->input->post('teacher_id'),        
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'fullName' => $this->input->post('first_name')." ". $this->input->post('last_name'),                        
                'mobile' => $this->input->post('contact'),                
                'updated_at' => date('Y-m-d h:i:s')
            );
            $this->user_model->update('users', $teacher_data,array('id' => $data['teachers']->id,'parent_id'=>user_id()));
         
            $this->session->set_flashdata('msg_success', 'Teacher account updated successfully.');
            redirect('institute/teachers');
        }

        
        $data['template'] = "institute/teachers/edit";
        $this->load->view('templates/user/layout', $data);
    }

    public function view($id=0){
	    $data['teachers'] = $this->user_model->get_row('users', array('id' => $id,'parent_id'=>user_id()));

        $data['template'] = "institute/teachers/view";
        $this->load->view('templates/user/layout', $data);
    }

    public function delete(){
	        
        if ($this->user_model->delete('users', array('id' => $id,'parent_id'=>user_id()))) {
            $this->session->set_flashdata('msg_success', 'Teacher account deleted successfully.');
           redirect('institute/teachers');
        } else {
            $this->session->set_flashdata('msg_error', 'Delete failed, Please try again.');
           redirect('institute/teachers');
        }
    }

}
