<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller{
    public function __construct(){
        parent::__construct();
        clear_cache();
        _check_admin_login();  //check  login authentication
	permissionBasedRedirect(1);
    }

    public function index(){
        $data['template'] = "admin/index";
        $this->load->view('templates/backend/layout', $data);
    }

}
