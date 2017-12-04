<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Onboard extends CI_Controller{

    public function __construct(){
        parent::__construct();
        clear_cache();
        _check_user_login();  //check login authentication
        if(Get_Student_Status()===FALSE) {
            redirect(base_url('student/dashboard/'));
        } 
        $this->load->model('common_model');
    }
   
    public function index()
    {
    	redirect('student/onboard/first','refresh');
    }

    public function first(){

    	$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
          $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        if($this->form_validation->run() == TRUE)
        {
        	$file_name='';
            if(!empty($_FILES['userfile']['name'])){

	        	$config['upload_path'] = './assets/uploads/user_profile/';
			    $config['allowed_types'] = 'gif|jpg|png';
			    $config['encrypt_name'] = TRUE;
			    $config['max_size'] = '102400';

				$this->load->library('upload', $config);
				if(!$this->upload->do_upload())
				{
					$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('photofail', 'Select the image file');
				}else{
		            $data = array('upload_data' => $this->upload->data());
					$file_name = $data['upload_data']['file_name'];
				}
		    } 

            $userData = array(
			                'first_name' => $this->input->post('first_name'),
			                'last_name' => $this->input->post('last_name')
			            ); 

            if(!empty($file_name))  $userData['coverImage'] =base_url().'assets/uploads/user_profile/'.$file_name;
            $this->common_model->update('users',$userData,array('id' =>user_id(),'role'=>4));
            redirect(base_url('student/onboard/second'));
        }
        $data['records']= $this->common_model->get_row('users',array('id'=>user_id(),'role'=>4));

		$data['template'] = "student/onboard/first_onboard";
		$this->load->view('templates/onboard/main_layout', $data);
    }

    public function second()
    {
    	$this->form_validation->set_rules('birthday', 'Birthday', 'trim|required');
        $this->form_validation->set_rules('sex', 'Gender', 'required');
        $this->form_validation->set_rules('password', 'Password', 'trim');
        $this->form_validation->set_rules('cpassword', 'Password Confirmation', 'trim|matches[password]');
          $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        if($this->form_validation->run() != FALSE)
        {
            $userData = array(
                'birthday' => $this->input->post('birthday'),
                'sex' => $this->input->post('sex')
            ); 
            if(!empty($this->input->post('password'))){
            	$userData['password'] = md5($this->input->post('password'));
            }
            
            $this->common_model->update('users',$userData,array('id' =>user_id(),'role'=>4));

            redirect(base_url('student/onboard/third/')); 

        }

    	$data['records']= $this->common_model->get_row('users',array('id'=>user_id(),'role'=>4));

    	$data['template'] = "student/onboard/second_onboard";
		$this->load->view('templates/onboard/main_layout', $data);
    }

    public function third()
    {
    	$data['records']= $this->common_model->get_row('users',array('id'=>user_id(),'role'=>4));
    	$this->form_validation->set_rules('institute_id', 'Institute Id', 'trim|required');
        $this->form_validation->set_rules('course', 'Course Id', 'trim|required');
        $this->form_validation->set_rules('branch', 'Branch Id', 'trim|required');
        $this->form_validation->set_rules('semester', 'Semester Id', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="error">','</div>');
        if($this->form_validation->run() != FALSE)
        {
            $arrayName  =  array(
                                    'course_id'    => $this->input->post('course'),
                                    'branch_id'    => $this->input->post('branch'),
                                    'semester_id'  => $this->input->post('semester')
                                );

            $User = $this->common_model->update('users',$arrayName,array('id'=>user_id(),'role'=>4));
            redirect(base_url('student/onboard/followteachers/'));
        }

        if(!empty($data['records']->parent_id)){
            $data['institute_info'] = $this->common_model->get_row('users',array('id'=>$data['records']->parent_id,'role'=>2));
            $data['courses'] = $this->common_model->get_result('courses',array('institute_id'=>$data['institute_info']->id));
        } 

    	$data['template'] = "student/onboard/third_onboard";
		$this->load->view('templates/onboard/main_layout', $data);
    }


     public function getCourceList(){

        $user_info  = $this->common_model->get_row('users',array('role'=>3,'id'=>user_id()));
        $courceData = $this->common_model->get_result('courses',array('institute_id'=>$user_info->parent_id));

        $test=''; 
        $main='<option value=""> - Select Course - </option>';

        if(isset($courceData) && !empty($courceData)){

            foreach($courceData as $row){
                $test.='<li class=""><span>'.$row->course_name.'</span></li>';
                $main.="<option value='".$row->id."'>".$row->course_name."</option>";
            }

            $arrayName = array('test' =>$test,'main'=>$main );
            echo json_encode($arrayName);
        }
        else
        {

            $test.='<li class=""><span> No Record </span></li>';
            $main.="<option value=''> No Record </option>";
            $arrayName = array('test' =>$test,'main'=>$main );

        }

    }

    public function getCourceBrachList()
    {
        $main='<option value="">-Select Branch-</option>';
        $user_info  = $this->common_model->get_row('users',array('role'=>4,'id'=>user_id()));
        if(isset($_POST) && !empty($user_info) ){
        	
            $institute_id = $this->input->post('institute_id'); // institute id
            $course_id = $this->input->post('course_id'); // Coid id
            $BranchData = $this->common_model->get_result('course_branches',array('institute_id'=>$user_info->parent_id,'course_id'=>$course_id));
            if(!empty($BranchData)){
                foreach($BranchData as $row){
                    $main.="<option value='".$row->id."'>".$row->branch_name."</option>";

                }
                $arrayName = array('status' =>TRUE,'resp'=>$main);
                echo json_encode($arrayName);
            }
            else
            {
               $arrayName = array('status' =>FALSE,'resp'=>$main);
               echo json_encode($arrayName);
            } 
        } else {
             $arrayName = array('status' =>FALSE,'resp'=>$main);
               echo json_encode($arrayName);
        }

    }

    public function getCourceBrachSemesterList()
    {

    	$main='<option value="">-Select Semester-</option>';
        $user_info  = $this->common_model->get_row('users',array('role'=>4,'id'=>user_id()));
        if(isset($_POST) && !empty($user_info) ){

            $institute_id = $this->input->post('institute_id'); // institute id
            $course_id = $this->input->post('course_id'); // Coid id
            $branch_id = $this->input->post('branch_id'); // Coid id
            //$semData = $this->common_model->getCourceBrachSemesterList($id,$coid,$brid);
            $semData = $this->common_model->get_result('course_semester',array('institute_id'=>$user_info->parent_id,'course_id'=>$course_id,'branch_id'=>$branch_id));
            if(isset($semData) && !empty($semData)){
                foreach($semData as $row){
                
                    $main.="<option value='".$row->id."'>".$row->semester."</option>";

                }
                $arrayName = array('status' =>TRUE,'resp'=>$main );
                echo json_encode($arrayName);
            }
            else
            {
               $arrayName = array('status' =>FALSE,'resp'=>$main );
               echo json_encode($arrayName);
            }

        } else {
            $arrayName = array('status' =>FALSE,'resp'=>$main );
            echo json_encode($arrayName);
        }

    }


    public function followteachers($value='')
    {
        $data['records']= $this->common_model->get_row('users',array('id'=>user_id(),'role'=>4));
        if(!empty($data['records']->parent_id)){
            $data['institute_info'] = $this->common_model->get_row('users',array('id'=>$data['records']->parent_id,'role'=>2));
            $data['teachers'] = $this->common_model->get_result('users',array('parent_id'=>$data['institute_info']->id,'status'=>1,'role'=>3));
        } 


        $this->form_validation->set_rules('teacher_id[]', 'Teachers Id', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if($this->form_validation->run() != FALSE)
        {

            $arrayName  =  array( 
                                    'follow_teacher_ids'  => serialize($this->input->post('teacher_id')),
                                    'status'       => 1,
                                    'logn_status'  => 1,
                                );

            $User = $this->common_model->update('users',$arrayName,array('id'=>user_id(),'role'=>4));
            redirect(base_url('student/onboard/complete/'));
        }

        $data['template'] = "student/onboard/follow_teacher";
        $this->load->view('templates/onboard/main_layout', $data);
    }

    public function complete()
    {
    	$user_info  = $this->common_model->get_row('users',array('role'=>4,'id'=>user_id()));
    	
    	$data['template'] = "teacher/onboard/onboard_fifth";
		$this->load->view('templates/onboard/layout', $data);
    }





}
