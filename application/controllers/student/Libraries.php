<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Libraries extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        clear_cache();
        _check_user_login();  //check login authentication

        if(Get_Student_Status()===TRUE) {
            redirect(base_url('student/onboard/'));
        }
        permissionBasedRedirect(4);
        $this->load->model('library_model');
    }

    
    public function index($offset = 0){

        $per_page = 15;
        $data['libraries'] = $this->library_model->libraries($offset, $per_page,user_id());
        $config = backend_pagination();
        $config['base_url'] = base_url() . 'student/libraries/index/';
        $config['total_rows'] = $this->library_model->libraries(0, 0,user_id());
        $config['per_page'] = $per_page;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $data['template'] = "student/libraries/index";
        $this->load->view('templates/student/layout', $data);
    }


    public function add_to_mybook()
    {
        if(!empty($_POST['status'])){
            $book_info = $this->library_model->get_row('books',array('id'=>$_POST['book_id']));
            if (!empty($book_info)) {
                
                $libraries_data = array(
                    'user_id' => user_id(),
                    'book_id' => $book_info->id,
                    'category_id' => $book_info->category_id,
                    'bookName' => $book_info->book_name,
                    'status'=> 1,                              
                    'created_at' => date('Y-m-d h:i:s')
                );
                if ($this->library_model->insert('libraries', $libraries_data)) {
                    echo 'success';
                    return TRUE;
                } 
            } 
        }
        echo'failed';
        return FALSE;
    }

    public function edit($library_id = 0) {
         
        if (empty($library_id)) redirect('user/libraries');

        $this->form_validation->set_rules('category_id', 'Category', 'trim|required');
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');        

        $this->form_validation->set_error_delimiters('<div class="error text-danger">', '</div>');
        if ($this->form_validation->run() == TRUE) {
            $libraries_data = array(
                'user_id' => user_id(),
                'category_id' => $this->input->post('category_id'),
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),                
                //'updated_at' => date('Y-m-d h:i:s')
            );

            if ($this->library_model->update('libraries', $libraries_data, array('id' => $library_id ,'user_id'=>user_id() ))) {
                $this->session->set_flashdata('msg_success', 'Note updated successfully.');
                redirect('user/libraries');
            } else {
                $this->session->set_flashdata('msg_error', 'Updating note failed, Please try again.');
                redirect('user/libraries');
            }
        }
        
        $data['libraries'] = $this->library_model->get_row('libraries', array('id' => $library_id ,'user_id'=>user_id() ));
        $data['template'] = "user/libraries/edit";
        $this->load->view('templates/student/layout', $data);
    }

    public function view($library_id = 0)
    {         
        if (empty($library_id)) redirect('user/libraries');

        $data['libraries'] = $this->library_model->get_row('libraries', array('id' => $library_id,'user_id'=>user_id() ));

        $data['template'] = "student/libraries/view";
        $this->load->view('templates/student/layout', $data);
    }

    public function delete($library_id = 0)
    {         
        if (empty($library_id)) redirect('student/libraries');

        if ($this->library_model->delete('libraries', array('id' => $note_id,'user_id'=>user_id()))) {
            $this->session->set_flashdata('msg_success', 'Note deleted successfully.');
            redirect('student/libraries');
        } else {
            $this->session->set_flashdata('msg_error', 'Delete failed, Please try again.');
            redirect('student/libraries');
        }
    }


}
