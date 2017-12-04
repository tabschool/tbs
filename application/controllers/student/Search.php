<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller{

    public function __construct(){
        parent::__construct();
        clear_cache();
        _check_user_login();  //check login authentication
        
        if(Get_Student_Status()===TRUE) {
            redirect(base_url('student/onboard/'));
        }
        permissionBasedRedirect(4);
        $this->load->model('student_model');
    }

    public function index()
    {
        $this->form_validation->set_rules('search', 'Search', 'trim|required');        
        $this->form_validation->set_error_delimiters('<div class="error text-danger">', '</div>');
        if($this->form_validation->run()==TRUE){
            $search= $this->input->post('search');
            $data['books'] = $this->student_model->get_search_admin_books(trim($search));
            $data['mybooks'] = $this->student_model->get_search_mybooks(trim($search));
            $data['mynotes'] = $this->student_model->get_search_mynotes(trim($search));
            $data['classfeeds'] = $this->student_model->get_search_classfeed(trim($search));
           
        }
        $data['template'] = "student/class/search";
        $this->load->view('templates/student/layout', $data);    
    }


}