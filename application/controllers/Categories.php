<?php

if(!defined('BASEPATH')) exit('No direct script access allowed');
class Categories extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        clear_cache();
        $this->load->model('category_model');
    }

	public function index($offset=0){
		_check_superadmin_login(); //check login authentication
		$per_page=25;
		$data['categories'] = $this->category_model->categories($offset,$per_page);
		$data['offset'] = $offset;
 		$config=backend_pagination();
		$config['base_url'] = base_url().'backend/categories/index';
		$config['total_rows'] = $this->category_model->categories(0,0);
		$config['per_page'] = $per_page;
		$this->pagination->initialize($config);
		$data['pagination']=$this->pagination->create_links();
 		$data['template']='backend/category/index';
		$this->load->view('templates/backend/layout', $data);
	}

	public function add(){
		_check_superadmin_login(); //check login authentication

		$this->form_validation->set_rules('category_name', 'Category Name', 'trim|required');
		$this->form_validation->set_rules('description', 'Category Description', 'trim|required');
		
		$this->form_validation->set_rules('userfile','image','callback_userfile_check_add');

		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		if($this->form_validation->run() == TRUE){

			$cat_data = array(
								'category'	  => $this->input->post('category_name'),
								'subheading' => $this->input->post('subheading'),
								'description' => $this->input->post('description'),
								'slug'		  => url_title($this->input->post('category_name'),'-',TRUE),
								'status'	  => $this->input->post('status'),
								'created_date'=> date('Y-m-d h:i:s')
							  );
			if($this->session->userdata('userfile')):
                $userfile=$this->session->userdata('userfile');   
                $cat_data['main_image'] = $userfile['image'];  
                $cat_data['thumb_image'] = $userfile['thumb_image'];

            endif;

			if($this->category_model->insert('categories',$cat_data)){
				if($this->session->userdata('userfile')):
                    $this->session->unset_userdata('userfile');
                endif;
				$this->session->set_flashdata('msg_success','New Category has been created successfully.');
				redirect('backend/categories/');
			}
		}
		$data['template']='backend/category/add';
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
                'upload_path'  => './assets/uploads/categories/',
                'allowed_types'=> 'gif|jpg|png|jpeg',
                // 'image_resize' => TRUE,
                'source_image' => './assets/uploads/categories/',
                'new_image'    => './assets/uploads/categories/thumb/',
                // 'resize_width' => 200,
                // 'resize_height' => 200,
                'encrypt_name' => TRUE,
            );

            $filepath='./assets/uploads/categories/';
            $upload_file=upload_file($param);		
            if($upload_file['STATUS']){
        		$configs = array();
                //$configs[] = array('source_image' => $upload_file['UPLOAD_DATA']['file_name'], 'new_image' => 'medium/'.$upload_file['UPLOAD_DATA']['file_name'], 'width' => 325, 'height' => 325,'maintain_ratio' =>TRUE);
                $configs[] = array('source_image' => $upload_file['UPLOAD_DATA']['file_name'], 'new_image' => 'thumb/'.$upload_file['UPLOAD_DATA']['file_name'], 'width' => 300, 'height' => 300,'maintain_ratio' => TRUE);
                $this->load->library('image_lib');
                foreach ($configs as $config) {
                    $this->image_lib->thumb($config,$filepath);
                }
                $this->session->set_userdata('userfile',array('image'=>$param['upload_path'].$upload_file['UPLOAD_DATA']['file_name'],'thumb_image'=>$param['new_image'].$upload_file['UPLOAD_DATA']['file_name']));            
                return TRUE;        
            }else{          
                $this->form_validation->set_message('userfile_check_add', $upload_file['FILE_ERROR']);              
                return FALSE;
            } 
        }     
    }
	public function edit($cate_id='')	{

		_check_superadmin_login(); //check login authentication
		if(empty($cate_id)) redirect(base_url().'backend/category/categories');
	   	$data['category'] = $this->category_model->get_row('categories',array('id'=>$cate_id));
		$this->form_validation->set_rules('category_name', 'Category Name', 'trim|required');
		$this->form_validation->set_rules('description', 'Category Description', 'trim|required');
		if(!empty($_FILES['userfile']['name'])){
		   $this->form_validation->set_rules('userfile','image','callback_userfile_check_add');
		}
		$this->form_validation->set_error_delimiters('<div class="error">','</div>');
		if($this->form_validation->run() == TRUE){
		    $cat_data=array(
							'category'	  => $this->input->post('category_name'),
							'subheading' => $this->input->post('subheading'),
							'description' => $this->input->post('description'),
							'slug'		  => url_title($this->input->post('category_name'), '-', TRUE),
							'status'	  => $this->input->post('status'),
							'created_date'=> date('Y-m-d h:i:s')
						);
			if($this->session->userdata('userfile')):
                $userfile=$this->session->userdata('userfile');   
                $cat_data['main_image'] = $userfile['image'];  
                $cat_data['thumb_image'] = $userfile['thumb_image'];
                if(!empty($data['category'])){
            		$new_file=$data['category']->main_image;
					$thumb_file=$data['category']->thumb_image;
					@unlink($new_file);
					@unlink($thumb_file);
            	}        
            endif;
			if($this->category_model->update('categories',$cat_data,array('id'=>$cate_id))){
				if($this->session->userdata('userfile')):
                    $this->session->unset_userdata('userfile');
                endif;
				$this->session->set_flashdata('msg_success','Category has been Updated successfully.');
				redirect('backend/categories/');
			}
		}
		
		$data['template']='backend/category/edit';
		$this->load->view('templates/backend/layout',$data);	
	}
	public function delete($cate_id ='')	{
		_check_superadmin_login(); //check login authentication
		if(empty($cate_id)) redirect('backend/category/categories');
		$category=$this->category_model->get_row('categories',array('id'=>$cate_id));
		if(!empty($category)){
    		$new_file=$category->main_image;
			$thumb_file=$category->thumb_image;
			@unlink($new_file);
			@unlink($thumb_file);
        }    
		$this->category_model->delete('categories',array('id'=>$cate_id));
		$this->session->set_flashdata('msg_success','Category has been deleted successfully.');
		redirect('backend/categories');		
	}


}	