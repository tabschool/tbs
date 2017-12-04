<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller{
    public function __construct(){
        parent::__construct();
        clear_cache();
        _check_user_login();  //check login authentication
    }

    public function index(){
	$data['template'] = "teacher/profile/index";
	$this->load->view('templates/user/layout', $data);
    }

}
