<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Onboard extends CI_Controller{

    public function __construct(){
        parent::__construct();
        clear_cache();
        _check_user_login();  //check login authentication
        if(Get_Teacher_Status()===FALSE) {
            redirect(base_url('teacher/dashboard/'));
        } 
        $this->load->model('common_model');
    }

    public function index()
    {
    	$this->first();
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
            
            $this->common_model->update('users',$userData,array('id' =>user_id(),'role'=>3));

            redirect(base_url('teacher/onboard/second'));

        }
        $data['records']= $this->common_model->get_row('users',array('id' => user_id(),'role'=>3));

		$data['template'] = "teacher/onboard/first_onboard";
		$this->load->view('templates/onboard/main_layout', $data);
    }

    public function second()
    {
    	$this->form_validation->set_rules('birthday', 'Birthday', 'trim|required');
        $this->form_validation->set_rules('sex', 'Gender', 'trim|required');
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
            
            $this->common_model->update('users',$userData,array('id' =>user_id(),'role'=>3));

            redirect(base_url('teacher/onboard/third/')); 

        }

    	$data['records']= $this->common_model->get_row('users',array('id' => user_id(),'role'=>3));

    	$data['template'] = "teacher/onboard/second_onboard";
		$this->load->view('templates/onboard/main_layout', $data);
    }

    public function third()
    {
    	$data['records']= $this->common_model->get_row('users',array('id'=>user_id(),'role'=>3));

        if(!empty($data['records']->parent_id)){

            $data['institute_info'] = $this->common_model->get_row('users',array('id'=>$data['records']->parent_id,'role'=>2));
            $data['courses'] = $this->common_model->get_result('courses',array('institute_id'=>$data['institute_info']->id));
        }
        
    	$this->form_validation->set_rules('institute_id', 'Institute Id', 'trim|required');
        
        $this->form_validation->set_rules('course_id[]', 'Course Id', 'trim|required');

        $this->form_validation->set_rules('branch_id[]', 'Course Id', 'trim|required');

        $this->form_validation->set_rules('semester[]', 'Semester Id', 'trim|required');

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        if($this->form_validation->run() != FALSE)
        {
           
            $arrayName  =  array(
                                    'course_id'    => serialize($this->input->post('course_id[]')),
                                    'branch_id'    => serialize($this->input->post('branch_id[]')),
                                    'semester_id'  => serialize($this->input->post('semester[]')),
                                    'status'       => 1,
                                    'logn_status'  => 1,
                                );

            $User = $this->common_model->update('users',$arrayName,array('id' =>user_id(),'role'=>3));
            redirect(base_url('teacher/onboard/complete/')); 

        }

    	$data['institueList']= $this->common_model->get_result('users',array('role'=>2));
        $data['courceData'] = $this->common_model->get_result('courses',array('institute_id'=>$data['records']->parent_id));

    
    	$data['template'] = "teacher/onboard/third_onboard";
		$this->load->view('templates/onboard/main_layout', $data);
    }


    function course_branches()
    {
        $resp='';
        if($_POST['status']){
            $course_ids =  $_POST['course_ids'];
            $institute_id =  $_POST['institute_id'];
            if(!empty($course_ids) ){

                for($i=0; $i < count($course_ids) ; $i++) { 
                    $branchs = $this->common_model->get_result('course_branches',array('institute_id'=>$institute_id,'course_id'=>$course_ids[$i]));
            
                    if(!empty($branchs)){
                        foreach($branchs as $row){
                    
                            $resp.='<li>';
                            $resp.='<div class="info-block block-info clearfix">';
                            $resp.='<div class="square-box pull-left">';
                            $resp.='</div>';
                            $resp.='<div data-toggle="buttons" class="btn-group bizmoduleselect">';
                            $resp.='<label class="btn btn-default branch_select">';
                            $resp.='<div class="bizcontent">';
                            $resp.='<input type="checkbox" id="branch_id_'.$course_ids[$i].'_'.$row->id.'" name="branch_id[]" autocomplete="off" value="'.$row->id.'">';
                            $resp.='<p>';
                             if(!empty($row->branch_name)) {  
                                $resp.= ucfirst($row->branch_name);
                             } 
                            $resp.='</p>';
                            $resp.='</div>';
                            $resp.='</label>';
                            $resp.='</div>';
                            $resp.='</div>';
                            $resp.='</li>';
                        }
                    }
                }

                echo $resp;
                return FALSE;
            }
        }
    }

    function course_branch_semeters()
    {
        $resp='';
        if($_POST['status']){

            $branch_ids =  $_POST['branch_ids'];
            $institute_id =  $_POST['institute_id'];
            if(!empty($branch_ids) ){

                for($i=0; $i < count($branch_ids) ; $i++) { 

                    $branch =  explode('_',$branch_ids[$i]);
                    $course_id = $branch[2];

                    $branch_id = $branch[3];
                    $branch_info=  $this->common_model->get_row('course_branches',array('institute_id'=>$institute_id,'course_id'=>$course_id,'id'=>$branch_id));
                    $semesters = $this->common_model->get_result('course_semester',array('institute_id'=>$institute_id,'course_id'=>$course_id,'branch_id'=>$branch_id));

                    if(!empty($semesters)){
                        $resp.='<p> <i class="fa fa-star"></i> '.ucfirst($branch_info->branch_name).'</p><ul>';
                        foreach($semesters as $row){

                            $resp.='<li>';
                            $resp.='<div class="info-block block-info clearfix">';
                            $resp.='<div class="square-box pull-left semester_select">';
                            $resp.='</div>';
                            $resp.='<div data-toggle="buttons" class="btn-group bizmoduleselect">';
                            $resp.='<label class="btn btn-default">';
                            $resp.='<div class="bizcontent">';
                            $resp.='<input type="checkbox" id="sem_id_'.$course_id.'_'.$branch_id.''.$row->id.'" name="semester[]" autocomplete="off" value="'.$row->id.'_'.$branch_id.'">';
                            $resp.='<p>';
                            if(!empty($row->semester)) {  
                                $resp.= ucfirst($row->semester);
                            } 
                            $resp.='</p>';
                            $resp.='</div>';
                            $resp.='</label>';
                            $resp.='</div>';
                            $resp.='</div>';
                            $resp.='</li>';
                        }
                        $resp.='</ul>';
                    }
                }

                echo $resp;
                return FALSE;
            }
        }
    }

     public function getCourceList(){


        $user_info  = $this->common_model->get_row('users',array('role'=>3,'id'=>user_id()));

        $courceData = $this->common_model->get_result('courses',array('institute_id'=>$user_info->parent_id));

        $test=''; $main='<option value="">-Select Course-</option>';
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
    	$user_info  = $this->common_model->get_row('users',array('role'=>3,'id'=>user_id()));

        $id = $this->input->post('id'); // institute id
        $coid = $this->input->post('coid'); // Coid id
        $BranchData = $this->common_model->get_result('course_branches',array('institute_id'=>$user_info->parent_id,'course_id'=>$coid));
        
        $test=''; $main='<option value="">-Select Branch-</option>';

        if(isset($BranchData) && !empty($BranchData)){
            foreach($BranchData as $row){
                $test.='<li class=""><span>'.$row->branch_name.'</span></li>';
                $main.="<option value='".$row->id."'>".$row->branch_name."</option>";

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

    public function getCourceBrachSemesterList()
    {

    	$user_info  = $this->common_model->get_row('users',array('role'=>3,'id'=>user_id()));
        $id = $this->input->post('id'); // institute id
        $coid = $this->input->post('coid'); // Course id
        $brid = $this->input->post('brid'); // Coid id
        //$semData = $this->common_model->getCourceBrachSemesterList($id,$coid,$brid);
        $semData = $this->common_model->get_result('course_semester',array('institute_id'=>$user_info->parent_id,'course_id'=>$coid,'branch_id'=>$brid));
        
        $test=''; $main='<option value="">-Select Semester-</option>';

        if(isset($semData) && !empty($semData)){
            
            foreach($semData as $row){
                
                $test.='<li class=""><span>'.$row->semester.'</span></li>';
                $main.="<option value='".$row->id."'>".$row->semester."</option>";

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

    public function complete()
    {
    	$user_info  = $this->common_model->get_row('users',array('role'=>3,'id'=>user_id()));
    	
    	$data['template'] = "teacher/onboard/last_onboard";
		$this->load->view('templates/onboard/main_layout', $data);
    }





}
