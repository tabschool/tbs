<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Courses extends CI_Controller{
    public function __construct(){
        parent::__construct();
        clear_cache();
        _check_admin_login();  //check  login authentication
        $this->load->model('course_model');
    }

    public function index($offset = 0){
        $per_page = 15;
        $data['templates'] = $this->course_model->courses($offset, $per_page);
        $config = backend_pagination();
        $config['base_url'] = base_url() . 'admin/courses/index/';
        $config['total_rows'] = $this->course_model->courses(0, 0);
        $config['per_page'] = $per_page;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $data['template'] = "admin/courses/index";
        $this->load->view('templates/backend/layout', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('author', 'Author', 'trim|required');
        $this->form_validation->set_rules('price', 'price', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="error text-danger">', '</div>');
        if ($this->form_validation->run() == TRUE) {
            $course_data = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'author' => $this->input->post('author'),
                'price' => $this->input->post('price'),                
                //'created_at' => date('Y-m-d h:i:s')
            );

            if ($this->course_model->insert('courses', $course_data)) {
                $this->session->set_flashdata('msg_success', 'New course added successfully.');
                redirect('admin/courses');
            } else {
                $this->session->set_flashdata('msg_error', 'New adding course failed, Please try again.');
                redirect('admin/courses');
            }
        }

        $data['template'] = "admin/courses/add";
        $this->load->view('templates/backend/layout', $data);
    }

    public function edit($course_id = 0) {
         
        if (empty($course_id)) redirect('admin/courses');

        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('author', 'Author', 'trim|required');
        $this->form_validation->set_rules('price', 'price', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="error text-danger">', '</div>');
        if ($this->form_validation->run() == TRUE) {
            $course_data = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'author' => $this->input->post('author'),
                'price' => $this->input->post('price'),                
                //'updated_at' => date('Y-m-d h:i:s')
            );

            if ($this->course_model->update('courses', $course_data, array('id' => $course_id))) {
                $this->session->set_flashdata('msg_success', 'Course updated successfully.');
                redirect('admin/courses');
            } else {
                $this->session->set_flashdata('msg_error', 'Updating course failed, Please try again.');
                redirect('admin/courses');
            }
        }
        
        $data['course'] = $this->course_model->get_row('courses', array('id' => $course_id));
        $data['template'] = "admin/courses/edit";
        $this->load->view('templates/backend/layout', $data);
    }

    public function view($course_id = 0)
    {         
        if (empty($course_id)) redirect('admin/courses');

        $data['course'] = $this->course_model->get_row('courses', array('id' => $course_id));

        $data['template'] = "admin/courses/view";
        $this->load->view('templates/backend/layout', $data);
    }

    public function delete($course_id = 0)
    {         
        if (empty($course_id)) redirect('admin/courses');

        if ($this->course_model->delete('courses', array('id' => $course_id))) {
            $this->session->set_flashdata('msg_success', 'Course deleted successfully.');
            redirect('admin/courses');
        } else {
            $this->session->set_flashdata('msg_error', 'Delete failed, Please try again.');
            redirect('admin/courses');
        }
    }

}
