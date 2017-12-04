<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller{
    public function __construct(){
        parent::__construct();
        clear_cache();
        _check_admin_login();  //check  login authentication
        $this->load->model('user_model');
    }

    public function index(){
        $data['template'] = "admin/users/index";
        $this->load->view('templates/backend/layout', $data);
    }

    public function institutes($sort_by='id',$sort_order='desc',$offset = 0){

        $per_page = 15;
        $data['institutes'] = $this->user_model->institutes($offset, $per_page,$sort_by,$sort_order);
        $config = backend_pagination();
        $config['base_url'] = base_url() . 'admin/users/institutes/'. $sort_by.'/'.$sort_order.'/';
        $config['total_rows'] = $this->user_model->institutes(0, 0,$sort_by,$sort_order);
        $config['per_page'] = $per_page;
        $config['uri_segment']=6;
        if(!empty($_SERVER['QUERY_STRING'])){
            $config['suffix'] = "?".$_SERVER['QUERY_STRING'];
        }
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['sort_by']=$sort_by;
        $data['sort_order']=$sort_order;
        $data['template'] = "admin/users/institutes";
        $this->load->view('templates/backend/layout', $data);
    }

    public function teachers($sort_by='id',$sort_order='desc',$offset = 0){

        $per_page = 15;
        $data['teachers'] = $this->user_model->teachers($offset, $per_page,$sort_by,$sort_order);
        $config = backend_pagination();
        $config['base_url']  = base_url() . 'admin/users/teachers/'. $sort_by.'/'.$sort_order.'/';
        $config['total_rows']= $this->user_model->teachers(0, 0,$sort_by,$sort_order);
        $config['per_page']  = $per_page;

        $config['uri_segment']=6;
        if(!empty($_SERVER['QUERY_STRING'])){
            $config['suffix'] = "?".$_SERVER['QUERY_STRING'];
        }
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $data['sort_by']=$sort_by;
        $data['sort_order']=$sort_order;

         $data['institutes'] = $this->user_model->get_result('users',array('role'=>2,'status'=>1,''));


        $data['template'] = "admin/users/teachers";
        $this->load->view('templates/backend/layout', $data);
    }
    public function students($sort_by='id',$sort_order='desc',$offset = 0){

        $per_page = 15;
        $data['students'] = $this->user_model->students($offset, $per_page,$sort_by,$sort_order);
        $config = backend_pagination();
        $config['base_url'] = base_url() . 'admin/users/students/';
        $config['total_rows'] = $this->user_model->students(0, 0,$sort_by,$sort_order);
        $config['per_page'] = $per_page;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $data['institutes'] = $this->user_model->get_result('users',array('role'=>2,'status'=>1,''));

        $data['template'] = "admin/users/students";
        $this->load->view('templates/backend/layout', $data);
    }

    public function updateStatus($user_id=0,$status=0,$redirect='institutes')
    {
        if ($this->user_model->update('users', array('status'=>$status), array('id' => $user_id))) {
            $this->session->set_flashdata('msg_success', 'User status updated successfully.');
            redirect('admin/users/'.$redirect); 
        }
        redirect('admin/users/institutes');
    }

}
