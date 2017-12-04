<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Course_model extends CI_Model
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


    public function courses($offset = '', $per_page = '',$user_id=0) {
        $this->db->from('courses');
    	if($user_id>0){
            $this->db->where('institute_id',$user_id);
        }
        if($offset >= 0 && $per_page > 0){
            $this->db->limit($per_page, $offset);
            $this->db->order_by('id', 'desc');
            $query = $this->db->get();
            if ($query->num_rows() > 0)
                return $query->result();
            else
                return FALSE;
        } else {
            return $this->db->count_all_results();
        }
    }


    public function branches($offset = '', $per_page = '',$course_id='') {

        $this->db->where('course_id',$course_id);
        $this->db->where('institute_id',user_id());
        $this->db->from('course_branches');
        
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


    public function semesters($offset = '', $per_page = '',$course_id='',$branch_id=''){
        $this->db->where('course_id',$course_id);
        $this->db->where('institute_id',user_id());
        $this->db->where('branch_id',$branch_id);
        $this->db->from('course_semester');
        if($offset >= 0 && $per_page > 0){
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
