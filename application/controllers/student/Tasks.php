<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Tasks extends CI_Controller{
    public function __construct(){
        parent::__construct();
        clear_cache();
        _check_user_login();  //check login authentication
        $this->load->model('task_model');
    }

    
    public function index($offset = 0){

        $per_page = 15;
        $data['tasks'] = $this->task_model->tasks($offset, $per_page,user_id());
        $config = backend_pagination();
        $config['base_url'] = base_url() . 'student/Tasks/index/';
        $config['total_rows'] = $this->task_model->tasks(0, 0,user_id());
        $config['per_page'] = $per_page;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $data['template'] = "student/tasks/index";
        $this->load->view('templates/student/layout', $data);
    }


    public function add_user_task()
    {
        if(!empty($_POST['status']) && !empty($_POST['date'])){
            
            $note_data = array(
                                'user_id'     => user_id(),
                                'time'  => $this->input->post('hour_minute'),
                                'task'       => $this->input->post('title'),
                                'date'        => date('Y-m-d',strtotime($this->input->post('date'))),   
                                'status'      => 1,                            
                                'create_at'   => date('Y-m-d h:i:s')
                            );

            if($this->task_model->insert('mytasks',$note_data)) {
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

    public function edit_user_task() {
         
        if(!empty($_POST['status']) && !empty($_POST['task_id'])){

            $data['tasks'] = $this->task_model->get_row('mytasks', array('id'=>$_POST['task_id'],'user_id'=>user_id() ));
        
            if (!empty($data['tasks'])) {
        
            $task_data = array(

                'time'       => $this->input->post('hour_minute'),
                'task'       => $this->input->post('title'),
                'date'        => date('Y-m-d',strtotime($this->input->post('date'))),   
                'status'      => 1,     
                //'updated_at' => date('Y-m-d h:i:s')
            );

            if ($this->task_model->update('mytasks', $task_data, array('id' =>$_POST['task_id'] ,'user_id'=>user_id() ))) {
                  echo 'successfully';
                return true;
            } else {
                echo 'failed';
                return true;
            }

        }else{
            echo 'failed';
                return true;
        }
        
        }else{
            echo 'failed';
                return true;
        }
    }

    public function done_task($task_id = 0)
    {         
        if (empty($task_id)) redirect('student/Tasks');
        $data['tasks'] = $this->task_model->get_row('mytasks', array('id' => $task_id,'user_id'=>user_id() ));
        if(empty($data['tasks'])) redirect('student/Tasks');

        $task_data = array(
            'status' => 2,
        );

        if ($this->task_model->update('mytasks', $task_data, array('id' => $task_id ,'user_id'=>user_id() ))) {
            $this->session->set_flashdata('msg_success', 'Task status has updated successfully.');
            redirect('student/Tasks');
        } else {
            $this->session->set_flashdata('msg_error', 'operation failed, Please try again.');
            redirect('student/Tasks');
        }
    }

    public function delete($task_id = 0)
    {         
        if(empty($task_id)) redirect('student/Tasks');
        $data['tasks'] = $this->task_model->get_row('mytasks', array('id'=>$task_id,'user_id'=>user_id() ));
        if(empty($data['tasks'])) redirect('student/Tasks');

        if ($this->task_model->delete('mytasks', array('id'=>$task_id,'user_id'=>user_id()))) {
            $this->session->set_flashdata('msg_success', 'Task deleted successfully.');
            redirect('student/Tasks');
        } else {
            $this->session->set_flashdata('msg_error', 'Delete failed, Please try again.');
            redirect('student/Tasks');
        }
    }


}
