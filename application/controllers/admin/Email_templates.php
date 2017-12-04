<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Email_templates extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        clear_cache();
        _check_admin_login();  //check  login authentication
        $this->load->model('email_templates_model');
    }

    public function index($offset = 0)
    {         
        $per_page = 10;
        $data['templates'] = $this->email_templates_model->email_templates($offset, $per_page);
        $config = backend_pagination();
        $config['base_url'] = base_url() . 'admin/email_templates/index/';
        $config['total_rows'] = $this->email_templates_model->email_templates(0, 0);
        $config['per_page'] = $per_page;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $data['template'] = "admin/email_templates/index";
        $this->load->view('templates/backend/layout', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('name', 'Template Name', 'trim|required');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required');
        $this->form_validation->set_rules('body', 'Template Body', 'trim|required');
        $this->form_validation->set_rules('template_subject_admin', 'Subject Admin', 'trim');
        $this->form_validation->set_rules('template_body_admin', 'Template Body Admin', 'trim');
        $this->form_validation->set_error_delimiters('<div class="error text-danger">', '</div>');
        if ($this->form_validation->run() == TRUE) {
            $template_data = array(
                'template_name' => $this->input->post('name'),
                'template_subject' => $this->input->post('subject'),
                'template_body' => $this->input->post('body'),
                'template_subject_admin' => $this->input->post('template_subject_admin'),
                'template_body_admin' => $this->input->post('template_body_admin'),
                //'created_at' => date('Y-m-d h:i:s')
            );

            if ($this->email_templates_model->insert('email_templates', $template_data)) {
                $this->session->set_flashdata('msg_success', 'New email template added successfully.');
                redirect('admin/email_templates');
            } else {
                $this->session->set_flashdata('msg_error', 'New add email template failed, Please try again.');
                redirect('admin/email_templates');
            }
        }

        $data['template'] = "admin/email_templates/add";
        $this->load->view('templates/backend/layout', $data);
    }

    public function edit($template_id = '') {
         
        if (empty($template_id)) redirect('admin/email_templates');

        $this->form_validation->set_rules('name', 'Template Name', 'trim|required');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required');
        $this->form_validation->set_rules('body', 'Template Body', 'trim|required');
        $this->form_validation->set_rules('template_subject_admin', 'Subject Admin', 'trim');
        $this->form_validation->set_rules('template_body_admin', 'Template Body Admin', 'trim');
        $this->form_validation->set_error_delimiters('<div class="error text-danger">', '</div>');
        if ($this->form_validation->run() == TRUE) {
            $template_data = array(
                'template_name' => $this->input->post('name'),
                'template_subject' => $this->input->post('subject'),
                'template_body' => $this->input->post('body'),
                'template_subject_admin' => $this->input->post('template_subject_admin'),
                'template_body_admin' => $this->input->post('template_body_admin'),
               // 'updated_at' => date('Y-m-d h:i:s')
            );
            if ($this->email_templates_model->update('email_templates', $template_data, array('id' => $template_id))) {
                $this->session->set_flashdata('msg_success', 'Email template updated successfully.');
                redirect('admin/email_templates');
            } else {
                $this->session->set_flashdata('msg_error', 'Email template update failed, Please try again.');
                redirect('admin/email_templates');
            }
        }
        $data['email_template'] = $this->email_templates_model->get_row('email_templates', array('id' => $template_id));
        $data['template'] = "admin/email_templates/edit";
        $this->load->view('templates/backend/layout', $data);
    }

    public function view($template_id = '')
    {
         
        if (empty($template_id)) redirect('admin/email_templates');

        $data['email_template'] = $this->email_templates_model->get_row('email_templates', array('id' => $template_id));

        $data['template'] = "admin/email_templates/view";
        $this->load->view('templates/backend/layout', $data);
    }

    public function delete($template_id = '')
    {
         
        if (empty($template_id)) redirect('admin/email_templates');

        if ($this->email_templates_model->delete('email_templates', array('id' => $template_id))) {
            $this->session->set_flashdata('msg_success', 'Email template deleted successfully.');
            redirect('admin/email_templates');
        } else {
            $this->session->set_flashdata('msg_error', 'Delete failed, Please try again.');
            redirect('admin/email_templates');
        }
    }
}