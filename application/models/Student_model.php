<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Student_model extends CI_Model
{

    public function insert($table_name = '', $data = '')
    {
        $query = $this->db->insert($table_name, $data);
        if ($query) return $this->db->insert_id();
        else return FALSE;
    }

    public function get_result($table_name = '', $id_array = '', $columns = array(),$order_by = array())
    {
        if (!empty($columns)):
            $all_columns = implode(",", $columns);
            $this->db->select($all_columns);
        endif;
        if (!empty($id_array)):
            foreach ($id_array as $key => $value) {
                $this->db->where($key, $value);
            }
        endif;
        if (!empty($order_by)):
            $this->db->order_by($order_by[0], $order_by[1]);
        endif;
        $query = $this->db->get($table_name);
        if ($query->num_rows() > 0) return $query->result();
        else return FALSE;
    }

    public function get_row($table_name = '', $id_array = '', $columns = array())
    {
        if (!empty($columns)):
            $all_columns = implode(",", $columns);
            $this->db->select($all_columns);
        endif;
        if (!empty($id_array)):
            foreach ($id_array as $key => $value) {
                $this->db->where($key, $value);
            }
        endif;
        $query = $this->db->get($table_name);
        if ($query->num_rows() > 0) return $query->row();
        else return FALSE;
    }

    public function update($table_name = '', $data = '', $id_array = '')
    {
        if (!empty($id_array)):
            foreach ($id_array as $key => $value) {
                $this->db->where($key, $value);
            }
        endif;
        return $this->db->update($table_name, $data);
    }

    public function delete($table_name = '', $id_array = ''){
        return $this->db->delete($table_name, $id_array);
    }


    public function classfeeds($offset = '', $per_page = '',$user_id) {
        $user_info =  $this->get_row('users',array('id' =>user_id(),'status'=>1));
        $this->db->from('contents');
        $this->db->where('institute_id',$user_info->parent_id);
        $this->db->where('course',$user_info->course_id);
        $this->db->where('branch', $user_info->branch_id);
        $this->db->where('semester',$user_info->semester_id);
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


    public function get_search_admin_books($search='') {
        $this->db->like('book_name',$search);
        $this->db->or_like('author_name', $search);
        $this->db->or_like('publisher_name', $search);
        $this->db->from('books');
        $query =  $this->db->get();  
        if ($query->num_rows()>0) 
            return $query->result();
        else
            return FALSE;
    }

    public function get_search_mybooks($search='') {

        $this->db->select('lb.*,b.id as main_book_id,b.*');
        $this->db->like('b.book_name',$search);
        $this->db->or_like('b.author_name', $search);
        $this->db->or_like('b.publisher_name', $search);
        $this->db->where('lb.user_id',user_id());
        $this->db->from('libraries as lb');
        $this->db->join('books as b','lb.book_id = b.id','left'); 
        $query = $this->db->get();  
        if($query->num_rows()>0) 
            return $query->result();
        else
            return FALSE;
    
    } 


    public function get_search_mynotes($search='') {

       $this->db->like('title',$search);
        $this->db->or_like('description', $search);
        $this->db->where('status',1);
         $this->db->where('user_id',user_id());
        $this->db->from('mynotes');
        $query =  $this->db->get();  
        if ($query->num_rows()>0) 
            return $query->result();
        else
            return FALSE;
    
    } 

    public function get_search_classfeed($search='') {

        $user_info =  $this->get_row('users',array('id' =>user_id(),'status'=>1,'role'=>4));

        $this->db->like('title',$search);
        $this->db->where('institute_id',$user_info->parent_id);
        $this->db->where('course',$user_info->course_id);
        $this->db->where('branch', $user_info->branch_id);
        $this->db->where('semester',$user_info->semester_id);
       
        $this->db->from('contents');
        $query =  $this->db->get();  
        if ($query->num_rows()>0) 
            return $query->result();
        else
            return FALSE;
    
    } 


    public function get_student_content_notification(){

        $user_info =  $this->get_row('users',array('id' =>user_id(),'status'=>1,'role'=>4));
        
        $this->db->where('institute_id',$user_info->parent_id);
        $this->db->where('course',$user_info->course_id);
        $this->db->where('branch', $user_info->branch_id);
        $this->db->where('semester',$user_info->semester_id);
        $this->db->from('contents');
        $this->db->order_by('id', 'desc');
        $query =  $this->db->get();  
        if ($query->num_rows()>0) 
            return $query->result();
        else
            return FALSE;
    
    }

    public function get_student_task_notification(){

        $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d');
        $this->db->where('date',$curr_date);
        $this->db->where('user_id',user_id());
        $this->db->from('mytasks');
        $this->db->order_by('id','desc');
        $query =  $this->db->get();  
        if ($query->num_rows()>0) 
            return $query->result();
        else
            return FALSE;

    }




}
