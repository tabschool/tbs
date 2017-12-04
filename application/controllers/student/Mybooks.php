<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mybooks extends CI_Controller{
    public function __construct(){
        parent::__construct();
        clear_cache();
        _check_user_login();  //check login authentication
        $this->load->model('book_model');
    }

    
    public function index($offset = 0){

        $per_page = 15;
        $data['mybooks'] = $this->book_model->students_books($offset, $per_page,user_id());
        $config = backend_pagination();
        $config['base_url'] = base_url() . 'user/Mybooks/index/';
        $config['total_rows'] = $this->book_model->students_books(0, 0,user_id());
        $config['per_page'] = $per_page;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $data['template'] = "student/book/index";
        $this->load->view('templates/student/layout', $data);
    }

    public function read($book_id='')
    {
        if(empty($book_id)) redirect('user/Mybooks');
        $book_id = explode('_',$book_id);
        $data['mybook'] = $this->book_model->get_row('books',array('id'=>$book_id[0]));
        if(empty($data['mybook'])) redirect('user/Mybooks');
       
       
        $data['template'] = "student/book/view";
        $this->load->view('templates/student/layout', $data);
    }

}