<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Books extends CI_Controller{

    public function __construct(){
        parent::__construct();
        clear_cache();
        _check_admin_login();  //check login authentication
        $this->load->model('book_model');
    }

    public function index($offset = 0){
        $per_page = 15;
        $data['templates'] = $this->book_model->books($offset,$per_page);
        $config = backend_pagination();
        $config['base_url'] = base_url() . 'admin/books/index/';
        $config['total_rows'] = $this->book_model->books(0, 0);
        $config['per_page'] = $per_page;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['template'] = "admin/books/index";
        $this->load->view('templates/backend/layout', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('book_name', 'Title', 'trim|required');
        $this->form_validation->set_rules('author_name', 'Author', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('price', 'Price', 'trim|required');
        $this->form_validation->set_rules('category', 'Category', 'trim|required');
        $this->form_validation->set_rules('pages', 'Page', 'trim|required');
        $this->form_validation->set_rules('publisher_name', 'Publisher Name', 'trim|required');
        $this->form_validation->set_rules('pub_year', 'Publish Year', 'trim|required');
        $this->form_validation->set_rules('status', 'Status', 'trim|required');
        $this->form_validation->set_rules('userfile','Upload Book','callback_userfile_check_add');
        $this->form_validation->set_error_delimiters('<div class="error text-danger">', '</div>');
        if($this->form_validation->run() == TRUE){

            $book_data = array(
                                'category_id' => $this->input->post('category'),
                                'book_name' => $this->input->post('book_name'),
                                'description' => $this->input->post('description'),
                                'author_name' => $this->input->post('author_name'),
                                'publisher_name' => $this->input->post('publisher_name'),
                                'price' => $this->input->post('price'),                
                                'pages' => $this->input->post('pages'),                
                                'pub_year' => $this->input->post('pub_year'),                
                                'status' => $this->input->post('status'),                
                                'created_at' => date('Y-m-d h:i:s')
                            );

            if($this->session->userdata('userfile')):
                $userfile=$this->session->userdata('userfile');   
                $book_data['path'] = $userfile['image'];  
                //$cat_data['thumb_image'] = $userfile['thumb_image'];
            endif;

            if($this->book_model->insert('books', $book_data)){
                if($this->session->userdata('userfile')):
                    $this->session->unset_userdata('userfile');
                endif;
                $this->session->set_flashdata('msg_success', 'New Book added successfully.');
                redirect('admin/books');
            } else {
                $this->session->set_flashdata('msg_error', 'New adding course failed, Please try again.');
                redirect('admin/books');
            }
            
        }
        $data['category'] = $this->book_model->get_result('categories',array('status'=>1));

        $data['template'] = "admin/books/add";
        $this->load->view('templates/backend/layout', $data);
    }


    public function userfile_check_add($str){           
        if($this->session->userdata('userfile')):
            $this->session->unset_userdata('userfile');
        endif;  
        if($this->session->userdata('userfile')){               
            return TRUE;
        }else{

            $param=array(
                'file_name' =>'userfile',
                'upload_path'  => './assets/uploads/books/',
                'allowed_types'=> 'doc|pdf',
                //'image_resize' => TRUE,
                'source_image' => './assets/uploads/books/',
                'new_image'    => './assets/uploads/books/thumb/',
                //'resize_width' => 200,
                //'resize_height' => 200,
                'encrypt_name' => TRUE,
            );
            $filepath='./assets/uploads/categories/';
            $upload_file=upload_file($param);       
            if($upload_file['STATUS']){
                $this->session->set_userdata('userfile',array('image'=>$param['upload_path'].$upload_file['UPLOAD_DATA']['file_name'],'thumb_image'=>$param['new_image'].$upload_file['UPLOAD_DATA']['file_name']));            
                return TRUE;        
            }else{          
                $this->form_validation->set_message('userfile_check_add', $upload_file['FILE_ERROR']);              
                return FALSE;
            } 
        }     
    }


    public function edit($book_id = 0) {
         
        if(empty($book_id)) redirect('admin/books');
        $data['book'] = $this->book_model->get_row('books',array('id'=>$book_id));
        if(empty($data['book'])) redirect('admin/books');

        $this->form_validation->set_rules('book_name', 'Title', 'trim|required');
        $this->form_validation->set_rules('author_name', 'Author', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('price', 'Price', 'trim|required');
        $this->form_validation->set_rules('category', 'Category', 'trim|required');
        $this->form_validation->set_rules('pages', 'Page', 'trim|required');
        $this->form_validation->set_rules('publisher_name', 'Publisher Name', 'trim|required');
        $this->form_validation->set_rules('pub_year', 'Publish Year', 'trim|required');
        $this->form_validation->set_rules('status', 'Status', 'trim|required');
        if(!empty($_FILES['userfile']['name'])){
           $this->form_validation->set_rules('userfile','Upload Book','callback_userfile_check_add');
        }
        $this->form_validation->set_error_delimiters('<div class="error text-danger">', '</div>');
        if($this->form_validation->run() == TRUE){

            $book_data =  array(
                                    'category_id' => $this->input->post('category'),
                                    'book_name' => $this->input->post('book_name'),
                                    'description' => $this->input->post('description'),
                                    'author_name' => $this->input->post('author_name'),
                                    'publisher_name' => $this->input->post('publisher_name'),
                                    'price' => $this->input->post('price'),                
                                    'pages' => $this->input->post('pages'),                
                                    'pub_year' => $this->input->post('pub_year'),                
                                    'status' => $this->input->post('status'),                
                                    'created_at' => date('Y-m-d h:i:s')
                                );
           if($this->session->userdata('userfile')):
                $userfile=$this->session->userdata('userfile');   
                $book_data['path'] = $userfile['image'];  
                if(!empty($data['category'])){
                    $new_file=$data['category']->path;
                    @unlink($new_file);
                }        

            endif;


            if($this->book_model->update('books', $book_data, array('id' => $book_id))) {
                if($this->session->userdata('userfile')):
                    $this->session->unset_userdata('userfile');
                endif;
                $this->session->set_flashdata('msg_success', 'Book updated successfully.');
                redirect('admin/books/');
            } else {
                $this->session->set_flashdata('msg_error', 'Updating book failed, Please try again.');
                redirect('admin/books/');
            }
        }
    
        $data['category'] = $this->book_model->get_result('categories',array('status'=>1));

        $data['template'] = "admin/books/edit";
        $this->load->view('templates/backend/layout', $data);
    }

    public function view($book_id=0)
    {         
        if(empty($book_id)) redirect('admin/courses');
        $data['course'] = $this->book_model->get_row('courses',array('id'=>$book_id));
        $data['template'] = "admin/courses/view";
        $this->load->view('templates/backend/layout', $data);
    }

    public function delete($book_id = 0)
    {         
        if(empty($book_id)) redirect('admin/courses');
        if($this->book_model->delete('books',array('id'=>$book_id))){
            $this->session->set_flashdata('msg_success', 'Course deleted successfully.');
            redirect('admin/books');
        }else{
            $this->session->set_flashdata('msg_error', 'Delete failed, Please try again.');
            redirect('admin/books');
        }
    }


}
