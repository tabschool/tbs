<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller{
    public function __construct(){
        parent::__construct();
        clear_cache();
        _check_user_login();  //check login authentication
        $this->load->model('Student_model');
    }

    public function index(){
    	$data['user_info']  =  $this->Student_model->get_row('users',array('id'=>user_id(),'status'=>1,'role'=>4));
		
		$data['template'] = "student/profile/profile";
		$this->load->view('templates/student/layout', $data);
    }
    public function setting(){
    	$data['user_info']  =  $this->Student_model->get_row('users',array('id'=>user_id(),'status'=>1,'role'=>4));
		
		$data['template'] = "student/profile/index";
		$this->load->view('templates/student/layout', $data);
    }

    public function update_code(){
    	$user_info = $this->Student_model->get_row('users',array('id'=>user_id(),'status'=>1,'role'=>4));
		if (isset($_POST['status'])) {
			$qoute = $this->input->post('qoute');
			$array = array('qoute'=>$qoute);
			if($this->Student_model->update('users',$array,array('id'=>user_id(),'status'=>1,'role'=>4))){
				$arr = array('status'=>TRUE,'error'=>0,'message'=>'your motto has updated successfully');
				$main = json_encode($arr);
				echo $main;
				return false;
			}else{
				$arr = array('status'=>FALSE,'error'=>2,'message'=>'your operation has failed');
				$main = json_encode($arr);
				echo $main;
				return false;
			}
		
		} else{
			$arr = array('status'=>FALSE,'error'=>2,'message'=>'your operation has failed');
			$main = json_encode($arr);
			echo $main;
			return false;
		}
    }
    public function change_password(){
		if (isset($_POST['status'])) {
			$old_password = $this->input->post('old_password');
			$new_password = $this->input->post('new_password');
			
    		$user_info = $this->Student_model->get_row('users',array('id'=>user_id(),'password'=>sha1($old_password),'status'=>1,'role'=>4));
    		if(empty($user_info)){

    			$arr = array('status'=>FALSE,'error'=>1,'message'=>'your old password not in our record');
				$main = json_encode($arr);
				echo $main;
				return false;

    		}else{


				$array = array('password'=>sha1($new_password));
				if($this->Student_model->update('users',$array,array('id'=>user_id(),'status'=>1,'role'=>4))){
					
					$message = 'Tabschool: Your tab school password has changed';          
		            $authKey = "4131A8OhCb4HetmU591dccd7"; //Your authentication key
		            $mobileNumber = $user_info->mobile; //Multiple mobiles numbers separated by comma
		            $senderId = "TABSCH"; //Sender ID,While using route4 sender id should be 6 characters long.
		            $message = urlencode($message);//Your message to send, Add URL encoding here.
		            $route = 4; //Define route
		            
		            $postData1 = array(
		                'authkey' => $authKey,
		                'mobiles' => $mobileNumber,
		                'message' => $message,
		                'sender' => $senderId,
		                'route' => $route
		            ); //Prepare you post parameters
		            $url="http://bulksms.veevaainfotech.org/api/sendhttp.php"; //API URL
		            // init the resource
		            $ch = curl_init();
		            curl_setopt_array($ch, array(
		                CURLOPT_URL => $url,
		                CURLOPT_RETURNTRANSFER => true,
		                CURLOPT_POST => true,
		                CURLOPT_POSTFIELDS => $postData1
		                //,CURLOPT_FOLLOWLOCATION => true
		            ));
		            //Ignore SSL certificate verification
		            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		            //get response
		            $output = curl_exec($ch);

		            //Print error if any
		            if(curl_errno($ch))
		            {
		                echo 'error:' . curl_error($ch);
		                redirect('/Signup/');
		            }
		            curl_close($ch);



					$arr = array('status'=>TRUE,'error'=>0,'message'=>'your password has updated successfully');
					$main = json_encode($arr);
					echo $main;
					return false;
				}else{
					$arr = array('status'=>FALSE,'error'=>1,'message'=>'your operation has failed');
					$main = json_encode($arr);
					echo $main;
					return false;
				}
			}	
		
		} else{
			$arr = array('status'=>FALSE,'error'=>1,'message'=>'your operation has failed');
			$main = json_encode($arr);
			echo $main;
			return false;
		}
    }

    public function change_email(){
		if (isset($_POST['status'])) {
			$new_email = $this->input->post('new_email');
			$old_email = $this->input->post('old_email');
			
    		$user_info = $this->Student_model->get_row('users',array('id'=>user_id(),'email'=>trim($old_email),'status'=>1,'role'=>4));
    		if(empty($user_info)){

    			$arr = array('status'=>FALSE,'error'=>1,'message'=>'your old email not in our record');
				$main = json_encode($arr);
				echo $main;
				return false;

    		}else{

				$array = array('email'=>trim($new_email));
				if($this->Student_model->update('users',$array,array('id'=>user_id(),'status'=>1,'role'=>4))){
					
					$message = 'Tabschool: Your tab school email address has changed';          
		            $authKey = "4131A8OhCb4HetmU591dccd7"; //Your authentication key
		            $mobileNumber = $user_info->mobile; //Multiple mobiles numbers separated by comma
		            $senderId = "TABSCH"; //Sender ID,While using route4 sender id should be 6 characters long.
		            $message = urlencode($message);//Your message to send, Add URL encoding here.
		            $route = 4; //Define route
		            
		            $postData1 = array(
		                'authkey' => $authKey,
		                'mobiles' => $mobileNumber,
		                'message' => $message,
		                'sender' => $senderId,
		                'route' => $route
		            ); //Prepare you post parameters
		            $url="http://bulksms.veevaainfotech.org/api/sendhttp.php"; //API URL
		            // init the resource
		            $ch = curl_init();
		            curl_setopt_array($ch, array(
		                CURLOPT_URL => $url,
		                CURLOPT_RETURNTRANSFER => true,
		                CURLOPT_POST => true,
		                CURLOPT_POSTFIELDS => $postData1
		                //,CURLOPT_FOLLOWLOCATION => true
		            ));
		            //Ignore SSL certificate verification
		            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		            //get response
		            $output = curl_exec($ch);

		            //Print error if any
		            if(curl_errno($ch))
		            {
		                echo 'error:' . curl_error($ch);
		                redirect('/Signup/');
		            }
		            curl_close($ch);


					$arr = array('status'=>TRUE,'error'=>0,'message'=>'your email has updated successfully');
					$main = json_encode($arr);
					echo $main;
					return false;
				}else{
					$arr = array('status'=>FALSE,'error'=>1,'message'=>'your operation has failed');
					$main = json_encode($arr);
					echo $main;
					return false;
				}
			}	
		
		} else{
			$arr = array('status'=>FALSE,'error'=>1,'message'=>'your operation has failed');
			$main = json_encode($arr);
			echo $main;
			return false;
		}
    }

    public function profile_image_set($value='')
    {
    	if(!empty($_FILES)){
    		
			if(!empty($filename = $_FILES['files']['name'][0])){
				$this->session->set_userdata('file_data',$_FILES['files']);
    		    $allowed =  array('gif','png','jpg','jpeg');
				$ext = pathinfo($filename, PATHINFO_EXTENSION);
				if(!in_array($ext,$allowed)){
					$this->session->set_userdata('file_data','');
					$this->session->unset_userdata('file_data');
					$arr = array('status'=>FALSE,'error'=>1,'message'=>'only png jpeg gif jpg files are allow');
					$main = json_encode($arr);
					echo $main;
					return false;
				}else{

					$_FILES['userfile']['name']    = $_FILES['files']['name'][0];
			        $_FILES['userfile']['type']    = $_FILES['files']['type'][0];
			        $_FILES['userfile']['tmp_name']= $_FILES['files']['tmp_name'][0];
			        $_FILES['userfile']['error']   = $_FILES['files']['error'][0];
			        $_FILES['userfile']['size']    = $_FILES['files']['size'][0];

					$config1 = array(
										'upload_path'  => "./assets/uploads/user_profile/",
										'allowed_types'=> "gif|jpg|png|jpeg",
										'overwrite'    => TRUE,
										'max_size'     => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
										'max_height'   => "800",
										'max_width'    => "2000",
										'encrypt_name'  => TRUE
								);

					$this->load->library('upload',$config1);
					if($this->upload->do_upload())
					{
						$data = $this->upload->data();

						$config['image_library'] = 'gd2';
						$config['source_image'] = "./assets/uploads/user_profile/".$data['file_name'];
                        $config['new_image'] = "./assets/uploads/user_profile/thumb/".$data['file_name'];
						$config['create_thumb'] = FALSE;
						$config['maintain_ratio'] = TRUE;
						$config['width']         = 230;
						$config['height']       =200;
						$this->load->library('image_lib', $config);
						$this->image_lib->resize();
						$user_info =  $this->Student_model->get_row('users',array('id' =>user_id(),'status'=>1,'role'=>4));
        				if (!empty($user_info->coverImage)) {
        				
        					$Nimage = str_replace(base_url(),'./',$user_info->coverImage);
        					$Fimage = str_replace(base_url(),'./',$user_info->main_image);

        					@unlink($Nimage);
        					@unlink($Fimage);
        				}
        				$new_file = base_url("assets/uploads/user_profile/thumb/".$data['file_name']);
        				$main_image = base_url("assets/uploads/user_profile/".$data['file_name']);

     					$arrayImg = array('coverImage' => $new_file,'main_image'=>$main_image);
     					$this->Student_model->update('users',$arrayImg,array('id' =>user_id(),'status'=>1,'role'=>4));
     					$arr = array('status'=>TRUE,'error'=>0,'message'=>'Image Upload successfully');
						$main = json_encode($arr);
						echo $main;
						return false;

					}else{

						$this->session->set_userdata('file_data','');
						$this->session->unset_userdata('file_data');
						$arr = array('status'=>FALSE,'error'=>1,'message'=>$this->upload->display_errors());
						$main = json_encode($arr);
						echo $main;
						return false;
					}
				}
			}
		
    	}
    }


    public function change_cover_image()
    {
    	if(!empty($_FILES)){
			if(!empty($filename = $_FILES['files']['name'][0])){
				$this->session->set_userdata('file_data',$_FILES['files']);
    		    $allowed =  array('gif','png','jpg','jpeg');
				$ext = pathinfo($filename, PATHINFO_EXTENSION);
				if(!in_array($ext,$allowed)){
					$this->session->set_userdata('file_data','');
					$this->session->unset_userdata('file_data');
					$arr = array('status'=>FALSE,'error'=>1,'message'=>'only png jpeg gif jpg files are allow');
					$main = json_encode($arr);
					echo $main;
					return false;
				}else{

					list($width, $height, $type, $attr) = getimagesize($_FILES['files']['tmp_name'][0]);

					if ($width<1000 || $height<300) {
						$arr = array('status'=>FALSE,'error'=>1,'message'=>'Please upload 1200x400 above dimention file');
						$main = json_encode($arr);
						echo $main;
						return false;
					} else {

					$_FILES['userfile']['name']    = $_FILES['files']['name'][0];
			        $_FILES['userfile']['type']    = $_FILES['files']['type'][0];
			        $_FILES['userfile']['tmp_name']= $_FILES['files']['tmp_name'][0];
			        $_FILES['userfile']['error']   = $_FILES['files']['error'][0];
			        $_FILES['userfile']['size']    = $_FILES['files']['size'][0];

					$config1 = array(
										'upload_path'  => "./assets/uploads/coverImage/",
										'allowed_types'=> "gif|jpg|png|jpeg",
										'overwrite'    => TRUE,
										'max_size'     => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
										'max_height'   => "800",
										'max_width'    => "2000",
										'encrypt_name'  => TRUE
								);

					$this->load->library('upload',$config1);
					if($this->upload->do_upload())
					{
						$data = $this->upload->data();
						$user_info =  $this->Student_model->get_row('users',array('id' =>user_id(),'status'=>1,'role'=>4));
        				if(!empty($user_info->cover_photo)){
        					$Nimage = str_replace(base_url(),'./',$user_info->cover_photo);
        					@unlink($Nimage);
        				}
        				$new_file = base_url("assets/uploads/coverImage/".$data['file_name']);
     					$arrayImg = array('cover_photo' => $new_file);
     					$this->Student_model->update('users',$arrayImg,array('id' =>user_id(),'status'=>1,'role'=>4));
     					$arr = array('status'=>TRUE,'error'=>0,'message'=>'Image Upload successfully');
						$main = json_encode($arr);
						echo $main;
						return false;

					}else{

						$this->session->set_userdata('file_data','');
						$this->session->unset_userdata('file_data');
						$arr = array('status'=>FALSE,'error'=>1,'message'=>$this->upload->display_errors());
						$main = json_encode($arr);
						echo $main;
						return false;
					}
				}
				}
			}
    	}
    }

    public function change_course_status()
    {
    	if(!empty($_POST['status']) && !empty($_POST['check'])){ 

    		$user_info = $this->Student_model->get_row('users',array('id'=>user_id(),'status'=>1,'role'=>4));
    		if(empty($user_info)){
    			 echo 'failed';
                return true;
    		}else{
	            $check_data = array(
	                                
	                              'course_view'=> $_POST['check'],                            
	                             
	                            );

	            if($this->Student_model->update('users',$check_data,array('id'=>user_id(),'status'=>1,'role'=>4))) {
	                echo 'successfully';
	                return true;
	            } else {
	                echo 'failed';
	                return true;
	            }
        	}
        } else {
            echo 'failed';
            return true;
        }
    }
    public function change_birthday_status()
    {
    	if(!empty($_POST['status']) && !empty($_POST['check'])){ 

    		$user_info = $this->Student_model->get_row('users',array('id'=>user_id(),'status'=>1,'role'=>4));
    		if(empty($user_info)){
    			 echo 'failed';
                return true;
    		}else{
	            $check_data = array(
	                                
	                              'birthday_view'=> $_POST['check'],                            
	                             
	                            );

	            if($this->Student_model->update('users',$check_data,array('id'=>user_id(),'status'=>1,'role'=>4))) {
	                echo 'successfully';
	                return true;
	            } else {
	                echo 'failed';
	                return true;
	            }
        	}
        } else {
            echo 'failed';
            return true;
        }
    }

    public function change_city_status()
    {
    	if(!empty($_POST['status']) && !empty($_POST['check'])){ 

    		$user_info = $this->Student_model->get_row('users',array('id'=>user_id(),'status'=>1,'role'=>4));
    		if(empty($user_info)){
    			 echo 'failed';
                return true;
    		}else{
	            $check_data = array(
	                                
	                              'city_view'=> $_POST['check'],                            
	                             
	                            );

	            if($this->Student_model->update('users',$check_data,array('id'=>user_id(),'status'=>1,'role'=>4))) {
	                echo 'successfully';
	                return true;
	            } else {
	                echo 'failed';
	                return true;
	            }
        	}
        } else {
            echo 'failed';
            return true;
        }
    }

    public function change_address_status()
    {
    	if(!empty($_POST['status']) && !empty($_POST['check'])){ 

    		$user_info = $this->Student_model->get_row('users',array('id'=>user_id(),'status'=>1,'role'=>4));
    		if(empty($user_info)){
    			 echo 'failed';
                return true;
    		}else{
	            $check_data = array(
	                                
	                              'address_view'=> $_POST['check'],                            
	                             
	                            );

	            if($this->Student_model->update('users',$check_data,array('id'=>user_id(),'status'=>1,'role'=>4))) {
	                echo 'successfully';
	                return true;
	            } else {
	                echo 'failed';
	                return true;
	            }
        	}
        } else {
            echo 'failed';
            return true;
        }
    }

    public function change_parents_status()
    {
    	if(!empty($_POST['status']) && !empty($_POST['check'])){ 

    		$user_info = $this->Student_model->get_row('users',array('id'=>user_id(),'status'=>1,'role'=>4));
    		if(empty($user_info)){
    			 echo 'failed';
                return true;
    		}else{
	            $check_data = array(
	                                
	                              'parents_view'=> $_POST['check'],                            
	                             
	                            );

	            if($this->Student_model->update('users',$check_data,array('id'=>user_id(),'status'=>1,'role'=>4))) {
	                echo 'successfully';
	                return true;
	            } else {
	                echo 'failed';
	                return true;
	            }
        	}
        } else {
            echo 'failed';
            return true;
        }
    }

    public function change_gender_status()
    {
    	if(!empty($_POST['status']) && !empty($_POST['check'])){ 

    		$user_info = $this->Student_model->get_row('users',array('id'=>user_id(),'status'=>1,'role'=>4));
    		if(empty($user_info)){
    			 echo 'failed';
                return true;
    		}else{
	            $check_data = array(
	                                
	                              'gender_view'=> $_POST['check'],                            
	                             
	                            );

	            if($this->Student_model->update('users',$check_data,array('id'=>user_id(),'status'=>1,'role'=>4))) {
	                echo 'successfully';
	                return true;
	            } else {
	                echo 'failed';
	                return true;
	            }
        	}
        } else {
            echo 'failed';
            return true;
        }
    }

}
