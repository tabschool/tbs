<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller{
    public function __construct(){
        parent::__construct();
        clear_cache();
        _check_user_login();  //check login authentication
	    permissionBasedRedirect(2);
    }

    public function index(){
	$data['template'] = "institute/dashboard/index";
	$this->load->view('templates/user/layout', $data);
    }

}
