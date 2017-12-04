<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {
	
    function __construct(){
        parent::__construct();
        clear_cache();
        $this->load->library('twilio');
        $this->load->library('excel');
        $this->load->model('user_model');
    }

    public function index($value='')
    {
    	
    }

}