<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller{
    public function __construct(){
        parent::__construct();
        clear_cache();
        _check_user_login();  //check login authentication
        if(Get_Teacher_Status()===TRUE) {
            redirect(base_url('teacher/onboard/'));
        } 
	    permissionBasedRedirect(3);
    }

    public function index(){

	$data['template'] = "teacher/dashboard/index";
	$this->load->view('templates/user/teacher_layout', $data);
    }

}
