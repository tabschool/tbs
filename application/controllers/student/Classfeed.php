<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Classfeed extends CI_Controller{

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

    public function index($offset = 0){

        $data['user_info'] = $this->student_model->get_row('users',array('id' =>user_id(),'status'=>1));
        $per_page = 15;
        $data['classfeeds'] = $this->student_model->classfeeds($offset, $per_page,user_id());

        $config = backend_pagination();
        $config['base_url'] = base_url() . 'student/classfeed/index/';
        $config['total_rows'] = $this->student_model->classfeeds(0, 0,user_id());
        $config['per_page'] = $per_page;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $data['template'] = "student/class/classfeed";
        $this->load->view('templates/student/layout', $data);
    }

    public function classes($value='')
    {
        $data['template'] = "student/class/edit";
        $this->load->view('templates/student/layout', $data);
    }

    public function view_feed($id='')
    {  
        if(empty($id)) redirect('student/classfeed/index/');
        $data['user_info'] = $this->student_model->get_row('users',array('id' =>user_id(),'status'=>1));
        $data['content_info'] = $this->student_model->get_row('contents',array('id' =>$id,'institute_id'=>$data['user_info']->parent_id,'course'=>$data['user_info']->course_id,'branch'=>$data['user_info']->branch_id,'semester'=>$data['user_info']->semester_id));
        if(empty($data['content_info'])) redirect('student/classfeed/index/');

        $data['template'] = "student/class/view";
        $this->load->view('templates/student/layout', $data);

    }


}