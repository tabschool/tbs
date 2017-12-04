<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller{


    public function __construct(){
        parent::__construct();
        clear_cache();
        _check_admin_login();  //check  login authentication
        $this->load->model('book_model');
    }

    
    public function index($offset = 0){

        $per_page = 15;
        $data['offset']= $offset ;
        $data['categories'] = $this->book_model->categories($offset,$per_page);
        $config = backend_pagination();
        $config['base_url'] = base_url() . 'admin/category/index/';
        $config['total_rows'] = $this->book_model->categories(0,0);
        $config['per_page'] = $per_page;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();


        $data['template'] = "admin/category/index";
        $this->load->view('templates/backend/layout', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('category_name','Category Name', 'trim|required');
        $this->form_validation->set_rules('category_description', 'Category Description', 'trim|required');
        $this->form_validation->set_rules('status', 'Status', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="error text-danger">', '</div>');
        if($this->form_validation->run() == TRUE){

            $cat_data = array(
                                    'category_name' => $this->input->post('category_name'),
                                    'slug'=>url_title($this->input->post('category_name'),'-',TRUE),
                                    'category_description' => $this->input->post('category_description'),
                                    'status' => $this->input->post('status'),               
                                    'created_at' => date('Y-m-d h:i:s')
                                );

            if ($this->book_model->insert('categories',$cat_data)) {
                $this->session->set_flashdata('msg_success', 'New Category added successfully.');
                redirect('admin/category/');
            } else {
                $this->session->set_flashdata('msg_error', 'New Adding Category failed, Please try again.');
                redirect('admin/category/');
            }
            
        }
        $data['template'] = "admin/category/add";
        $this->load->view('templates/backend/layout', $data);
    }


    public function edit($cat_id = 0) {
         
        if(empty($cat_id)) redirect('admin/category/');
        $this->form_validation->set_rules('category_name','Category Name', 'trim|required');
        $this->form_validation->set_rules('category_description', 'Category Description', 'trim|required');
        $this->form_validation->set_rules('status', 'Status', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="error text-danger">', '</div>');
        if ($this->form_validation->run() == TRUE){

            $cat_data = array(
                                    'category_name' => $this->input->post('category_name'),
                                    'slug'=>url_title($this->input->post('category_name'),'-',TRUE),
                                    'category_description' => $this->input->post('category_description'),
                                    'status' => $this->input->post('status'),               
                                   // 'created_at' => date('Y-m-d h:i:s')
                                );


            if($this->book_model->update('categories',$cat_data, array('id'=>$cat_id))){
                $this->session->set_flashdata('msg_success', 'Course updated successfully.');
                redirect('admin/category');
            } else {
                $this->session->set_flashdata('msg_error', 'Updating course failed, Please try again.');
                redirect('admin/category');
            }
        }
        
        $data['category'] = $this->book_model->get_row('categories',array('id'=>$cat_id));

        $data['template'] = "admin/category/edit";
        $this->load->view('templates/backend/layout', $data);
    }

    public function view($cat_id = 0)
    {         
        if(empty($cat_id)) redirect('admin/category');

        $data['course'] = $this->book_model->get_row('categories', array('id' => $cat_id));

        $data['template'] = "admin/courses/view";
        $this->load->view('templates/backend/layout', $data);
    }

    public function delete($cat_id = 0)
    {         
        if(empty($cat_id)) redirect('admin/category');
        if($this->book_model->delete('categories', array('id'=>$cat_id))) {
            $this->session->set_flashdata('msg_success', 'Category deleted successfully.');
            redirect('admin/category/');
        } else {
            $this->session->set_flashdata('msg_error', 'Delete failed, Please try again.');
            redirect('admin/category/');
        }
    }


}
