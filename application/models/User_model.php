<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model {
	public function insert($table_name='',  $data=''){
		$query=$this->db->insert($table_name, $data);
		if($query)
			return $this->db->insert_id();
		else
			return FALSE;		
	}
	public function get_result($table_name='', $id_array='',$columns=array()){
		if(!empty($columns)):
			$all_columns = implode(",", $columns);
			$this->db->select($all_columns);
		endif; 
		if(!empty($id_array)):		
			foreach ($id_array as $key => $value){
				$this->db->where($key, $value);
			}
		endif;		
		$query=$this->db->get($table_name);
		if($query->num_rows()>0)
			return $query->result();
		else
			return FALSE;
	}
	public function get_row($table_name='', $id_array='',$columns=array()){
		if(!empty($columns)):
			$all_columns = implode(",", $columns);
			$this->db->select($all_columns);
		endif; 
		if(!empty($id_array)):		
			foreach ($id_array as $key => $value){
				$this->db->where($key, $value);
			}
		endif;
		$query=$this->db->get($table_name);
		if($query->num_rows()>0)
			return $query->row();
		else
			return $query->num_rows();
	}
	public function update($table_name='', $data='', $id_array=''){
		if(!empty($id_array)):
			foreach ($id_array as $key => $value){
				$this->db->where($key, $value);
			}
		endif;
		return $this->db->update($table_name, $data);		
	}
	public function delete($table_name='', $id_array=''){		
	 return $this->db->delete($table_name, $id_array);
	}
	
	public function login($data='',$user_type=FALSE){		
		$query = $this->db->get_where('users',$data);
		if($query->num_rows()==1){
			$user_data = array(
			'id' 			=> $query->row()->id,
			'role' 			=> $query->row()->role,
			'userName' 		=> $query->row()->userName,
			'fullName'		=> $query->row()->fullName,
			'email'			=> $query->row()->email,
			'last_ip' 		=> $query->row()->last_ip,
			'last_login' 	=> $query->row()->last_login,
			'logged_in' 	=> TRUE);
			//if($user_type)
				//$this->session->set_userdata('superadmin_info',$user_data);
			//else
				$this->session->set_userdata('user_info',$user_data);

				$this->update('users',array('last_ip' => $this->input->ip_address(),
					'last_login' => date('Y-m-d h:i:s')),array('id'=>$query->row()->id));
		
			return TRUE;
		}else{
			$this->session->set_flashdata('msg_error', 'Incorrect Email or Password.');
			return FALSE;
		}
	}
	
	public function password_check($data='',$user_id=''){  
		$query = $this->db->get_where('users',$data,array('id'=>$user_id));
 		if($query->num_rows()>0)
			return TRUE;
		else{
			//$this->form_validation->set_message('password_check', 'The %s field can not match');
			return FALSE;
		}
	}

	public function insert_array($table_name='',  $data=''){
		$query=$this->db->insert_batch($table_name, $data);
		if($query)
			return TRUE;
		else
			return FALSE;		
	}
	
	public function institutes($offset = '', $per_page = '',$sort_by,$sort_order) {


		$sort_order = ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_columns = array('status');
        $sort_by = (in_array($sort_by, $sort_columns)) ? $sort_by : 'id';


        if(!empty($_GET['institute_name'])){
             $this->db->like('institute_name',trim($this->input->get('institute_name',TRUE)));
        }

        if(!empty($_GET['first_name'])){
             $this->db->like('first_name',trim($this->input->get('first_name',TRUE)));
         
        } 

        if(!empty($_GET['email'])){
            $this->db->like('email',trim($this->input->get('email',TRUE)));
        }

        if(!empty($_GET['phone'])){
            $this->db->like('phone',trim($this->input->get('phone',TRUE)));
        }

        $this->db->from('users');
        $this->db->where('role',2);
        if ($offset >= 0 && $per_page > 0) {
            $this->db->limit($per_page, $offset);
            $this->db->order_by($sort_by, $sort_order);
            $query = $this->db->get();
            if ($query->num_rows() > 0)
                return $query->result();
            else
                return FALSE;
        }else {
            return $this->db->count_all_results();
        }
    }

	public function teachers($offset='',$per_page='',$sort_by,$sort_order){

		$sort_order = ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_columns = array('status');
        $sort_by = (in_array($sort_by, $sort_columns)) ? $sort_by : 'id';

        if(!empty($_GET['institute_name'])){
             $this->db->like('parent_id',trim($this->input->get('institute_name',TRUE)));
        }

        if(!empty($_GET['first_name'])){
             $this->db->like('first_name',trim($this->input->get('first_name',TRUE)));
        } 

        if(!empty($_GET['last_name'])){
             $this->db->like('last_name',trim($this->input->get('last_name',TRUE)));
        } 

        if(!empty($_GET['email'])){
            $this->db->like('email',trim($this->input->get('email',TRUE)));
        }

        if(!empty($_GET['phone'])){
            $this->db->like('phone',trim($this->input->get('phone',TRUE)));
        }
        
        $this->db->from('users');
        $this->db->where('role',3);
        if ($offset >= 0 && $per_page > 0) {
            $this->db->limit($per_page, $offset);
            $this->db->order_by($sort_by, $sort_order);
            $query = $this->db->get();
            if ($query->num_rows() > 0)
                return $query->result();
            else
                return FALSE;
        }else {
            return $this->db->count_all_results();
        }
    }

	public function students($offset='',$per_page='',$sort_by,$sort_order){

		$sort_order = ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_columns = array('status');
        $sort_by = (in_array($sort_by, $sort_columns)) ? $sort_by : 'id';

        if(!empty($_GET['institute_name'])){
             $this->db->like('parent_id',trim($this->input->get('institute_name',TRUE)));
        }

        if(!empty($_GET['first_name'])){
             $this->db->like('first_name',trim($this->input->get('first_name',TRUE)));
        } 

        if(!empty($_GET['last_name'])){
             $this->db->like('last_name',trim($this->input->get('last_name',TRUE)));
        } 

        if(!empty($_GET['email'])){
            $this->db->like('email',trim($this->input->get('email',TRUE)));
        }

        if(!empty($_GET['phone'])){
            $this->db->like('phone',trim($this->input->get('phone',TRUE)));
        }

        $this->db->from('users');
        $this->db->where('role',4);
        if ($offset >= 0 && $per_page > 0) {
            $this->db->limit($per_page, $offset);
            $this->db->order_by($sort_by, $sort_order);
            $query = $this->db->get();
            if ($query->num_rows() > 0)
                return $query->result();
            else
                return FALSE;
        }else {
            return $this->db->count_all_results();
        }
    }


	public function institute_teachers($offset = '', $per_page = '') {
        $this->db->from('users');
        $this->db->where('parent_id',user_id());
        $this->db->where('role',3);
        if ($offset >= 0 && $per_page > 0) {
            $this->db->limit($per_page, $offset);
            $this->db->order_by('id', 'desc');
            $query = $this->db->get();
            if ($query->num_rows() > 0)
                return $query->result();
            else
                return FALSE;
        }else {
            return $this->db->count_all_results();
        }
    }

	public function institute_students($offset = '', $per_page = '') {
        $this->db->from('users');
        $this->db->where('parent_id',user_id());
        $this->db->where('role',4);
        if ($offset >= 0 && $per_page > 0) {
            $this->db->limit($per_page, $offset);
            $this->db->order_by('id', 'desc');
            $query = $this->db->get();
            if ($query->num_rows() > 0)
                return $query->result();
            else
                return FALSE;
        }else {
            return $this->db->count_all_results();
        }
    }

}