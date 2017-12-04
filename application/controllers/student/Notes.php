<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Notes extends CI_Controller{

    public function __construct(){
        parent::__construct();
        clear_cache();
        _check_user_login();  //check login authentication
        $this->load->model('note_model');
    }


    public function index($offset = 0){

        $per_page = 15;
        $data['notebooks'] = $this->note_model->notebooks($offset, $per_page,user_id());
        $config = backend_pagination();
        $config['base_url'] = base_url() . 'user/notes/index/';
        $config['total_rows'] = $this->note_model->notebooks(0, 0,user_id());
        $config['per_page'] = $per_page;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $data['template'] = "student/notes/index";
        $this->load->view('templates/student/layout', $data);
    }

    public function details($noet_id,$offset = 0){
        $per_page = 15;
        $data['notes'] = $this->note_model->notes($offset, $per_page,$noet_id,user_id());
        $config = backend_pagination();
        $config['base_url'] = base_url() . 'user/notes/index/'.$noet_id.'/';
        $config['total_rows'] = $this->note_model->notes(0, 0,$noet_id,user_id());
        $config['per_page'] = $per_page;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $data['template'] = "student/notes/chapter";
        $this->load->view('templates/student/layout', $data);
    }



    public function add_note()
    {
        if(!empty($_POST['status']) && !empty($_POST['note_book'])){ 

            $note_data = array(
                                'user_id'     => user_id(),
                                'notebook_id' => $this->input->post('note_book'),
                                'title'       => $this->input->post('title'),
                                'description' => $this->input->post('description'),   
                                'status'      => 1,                            
                                'create_at'   => date('Y-m-d h:i:s')
                            );

            if($this->note_model->insert('mynotes',$note_data)) {
                echo 'successfully';
                return true;
            } else {
                echo 'failed';
                return true;
            }

        } else {
            echo 'failed';
            return true;
        }
    }

    public function edit($note_id = 0) {
         
        if(empty($note_id)) redirect('user/notes');

        $this->form_validation->set_rules('category_id', 'Category', 'trim|required');
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');        

        $this->form_validation->set_error_delimiters('<div class="error text-danger">', '</div>');
        if ($this->form_validation->run() == TRUE) {
            $note_data = array(
                'user_id' => user_id(),
                'category_id' => $this->input->post('category_id'),
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),                
                //'updated_at' => date('Y-m-d h:i:s')
            );

            if ($this->note_model->update('notes', $note_data, array('id' => $note_id ,'user_id'=>user_id() ))) {
                $this->session->set_flashdata('msg_success', 'Note updated successfully.');
                redirect('user/notes');
            } else {
                $this->session->set_flashdata('msg_error', 'Updating note failed, Please try again.');
                redirect('user/notes');
            }
        }
        
        $data['notes'] = $this->note_model->get_row('notes', array('id' => $note_id ,'user_id'=>user_id() ));
        $data['template'] = "user/notes/edit";
        $this->load->view('templates/backend/layout', $data);
    }

    public function create_notebook()
    {         
        if(!empty($_POST['status']) && !empty($_POST['notebook'])){ 
            
            $array= array(
                            'user_id' =>user_id(), 
                            'notebook'=> $this->input->post('notebook'),
                            'slug'=> url_title($this->input->post('notebook'),'-',TRUE),
                            'status'=>1,
                            'create_at' => date('Y-m-d h:i:s')
                        );
           
            if ($this->note_model->insert('notebooks',$array)) {
                echo 'successfully';
                return true;
            } else {
                echo 'failed';
                return true;
            }
        
        } else {
            echo 'failed';
            return true;
        }
    } 


    public function update_note()
    {         
        if(!empty($_POST['status']) && !empty($_POST['main_id'])){ 
            $note_info = $this->note_model->get_row('mynotes',array('id' =>$_POST['main_id'] ,'user_id'=>user_id()));
            if (!empty($note_info)) {
        
                 $note_data = array(
                                   // 'user_id'     => user_id(),
                                        'notebook_id' => $this->input->post('note_book'),
                                        'title'       => $this->input->post('title'),
                                        'description' => $this->input->post('description'),   
                                   // 'status'      => 1,                            
                                    //'create_at'   => date('Y-m-d h:i:s')
                                );
               
                if ($this->note_model->update('mynotes',$note_data,array('id' =>$_POST['main_id'] ,'user_id'=>user_id()))) {
                    echo 'successfully';
                    return true;
                } else {
                    echo 'failed';
                    return true;
                }

            }else {
                echo 'failed';
                return true;
            }
        
        } else {
            echo 'failed';
            return true;
        }
    }

    public function delete($note_id = 0)
    {         
        if(empty($note_id)) redirect('student/Notes');
        $data['notes'] = $this->note_model->get_row('notebooks',array('id'=>$note_id,'user_id'=>user_id()));
        if(empty($data['notes'])) redirect('student/Notes');
        $this->note_model->delete('mynotes',array('notebook_id'=>$note_id,'user_id'=>user_id()));
        if($this->note_model->delete('notebooks',array('id'=>$note_id,'user_id'=>user_id()))) {
            $this->session->set_flashdata('msg_success', 'Note deleted successfully.');
            redirect('student/Notes');
        } else {
            $this->session->set_flashdata('msg_error', 'Delete failed, Please try again.');
            redirect('student/Notes');
        }
    }

    public function chapter_delete($notebook_id='',$note_id ='')
    {         
        if(empty($note_id) || empty($notebook_id)) redirect('student/Notes');
        $data['notes'] = $this->note_model->get_row('mynotes',array('id'=>$note_id,'notebook_id'=>$notebook_id,'user_id'=>user_id()));
        if(empty($data['notes'])) redirect('student/Notes');

        if($this->note_model->delete('mynotes',array('id'=>$note_id,'notebook_id'=>$notebook_id,'user_id'=>user_id()))) {
            $this->session->set_flashdata('msg_success', 'Note deleted successfully.');
            redirect('student/Notes/details/'.$notebook_id);
        } else {
            $this->session->set_flashdata('msg_error', 'Delete failed, Please try again.');
            redirect('student/Notes/details/'.$notebook_ids);
        }
    }


}
