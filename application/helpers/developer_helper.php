<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    if (!function_exists('clear_cache')) {
        function clear_cache()
        {
            $CI = & get_instance();
            $CI->output->set_header('Expires: Wed, 11 Jan 1984 05:00:00 GMT');
            $CI->output->set_header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . 'GMT');
            $CI->output->set_header("Cache-Control: no-cache, no-store, must-revalidate");
            $CI->output->set_header("Pragma: no-cache");
        }
    }

    if (!function_exists('user_logged_in')) {
        function user_logged_in()
        {
            $CI = & get_instance();
            $superadmin_info = $CI->session->userdata('user_info');
            if($superadmin_info['logged_in'] === TRUE) return TRUE; else return FALSE;
        }
    }

    if (!function_exists('_check_user_login')) {
        function _check_user_login() {
            if(user_logged_in()=== FALSE && user_role() ===FALSE) redirect('auth/login');

        }
    }

    if (!function_exists('_check_admin_login')) {
        function _check_admin_login() {
            if(user_logged_in()=== FALSE && user_role() === 1 ) redirect('auth/login');

        }
    }


    if (!function_exists('_check_institute_login')) {
        function _check_institute_login() {
            if(user_logged_in()=== FALSE && user_role() === 1 ) redirect('auth/login');

        }
    }

   if (!function_exists('isUserRole')) {
        function isUserRole($role) {
            //if(user_logged_in()=== FALSE && user_role() == 1 ) redirect('auth/login');

        }
    }
    if (!function_exists('check_teacher_login_status')) {
        function check_teacher_login_status($id) {
            if(user_logged_in()=== FALSE && user_role() == 1 )
            {
                return TRUE;
            }
        }
    }

   if (!function_exists('user_role')) {
        function user_role()
        {
            $CI = & get_instance();
            $user_info = $CI->session->userdata('user_info');
            if($user_info['logged_in'] === TRUE)
                return $user_info['role'];
            else 
                return FALSE;
        }
    } 

    if (!function_exists('Get_Teacher_Status')) {
        function Get_Teacher_Status()
        {
            $CI = & get_instance();
            $CI->load->model('common_model');
            $user_info = $CI->session->userdata('user_info');
            if($user_info['logged_in'] === TRUE){
                $user = $CI->common_model->get_row('users',array('id'=>$user_info['id'],'role'=>3));
                if($user->logn_status==0) {
                    return TRUE;
                } else {
                   return FALSE;
                }

            }else {
                return FALSE;
            }
        }
    }

    if(!function_exists('Get_Student_Status')) {
        function Get_Student_Status()
        {
            $CI = & get_instance();
            $CI->load->model('common_model');
            $user_info = $CI->session->userdata('user_info');
            if($user_info['logged_in'] === TRUE){
                $user = $CI->common_model->get_row('users',array('id'=>$user_info['id'],'role'=>4));
                if ($user->logn_status==0) {
                    return TRUE;
                } else {
                   return FALSE;
                }

            }else {
                return FALSE;
            }
        }
    }
	
   

    if(!function_exists('roleBasedRedirect')) {
	    function roleBasedRedirect (){
            if(user_role() == 2){
                
                redirect('institute/dashboard');

            }else if(user_role() == 3){

                if (Get_Teacher_Status()==TRUE) {

                    redirect('teacher/onboard/');

                } else {

                    redirect('teacher/dashboard');
                }
                
            }else if(user_role() == 4){

                if (Get_Teacher_Status()==TRUE) {

                    redirect('student/onboard/');

                } else {

                    redirect('student/dashboard');
                }


            }else {

                redirect('admin/dashboard');	
            
            }
	    }
    }

  if (!function_exists('permissionBasedRedirect')) {
	function permissionBasedRedirect ($role_id=0)
        {
            if($role_id != user_role()){
            echo "<strong>Unauthorized: Permission Denied.</strong> <br> Go ";
            if(user_role() == 2)
                echo '<a href="'.base_url('institute/dashboard').'">Back</a>';
            else if(user_role() == 3)		
                echo '<a href="'.base_url('teacher/dashboard').'">Back</a>';
            else if(user_role() == 4)
                echo '<a href="'.base_url('student/dashboard').'">Back</a>';
            else 
                echo '<a href="'.base_url('admin/dashboard').'">Back</a>';		
            die();	
            }	
	    }
    }


    if (!function_exists('user_id')) {
        function user_id()
        {
            $CI = & get_instance();
            $user_info = $CI->session->userdata('user_info');
            if($user_info['logged_in'] === TRUE)
                return $user_info['id'];
            else
                return FALSE; 
        }
    }  

    if (!function_exists('teacher_loggedin_id')) {
        function teacher_loggedin_id()
        {
            $CI = & get_instance();
            $user_info = $CI->session->userdata('user_info');
            if($user_info['logged_in'] === TRUE && user_role() == 3)
                return $user_info['id'];
            else
                return FALSE; 
        }
    }


if (!function_exists('get_teacher_info')) {
        function get_teacher_info($teach_id)
        {
            $CI = & get_instance();
             if($menu = $CI->common_model->get_row('users',array('id'=>$teach_id,'role'=>3,'status'=>1))){ 
                return $menu;
            } else { 
                return FALSE; 
            }
        }
    }

    if(!function_exists('get_student_name')){
        function get_student_name()
        {
            $CI = & get_instance();
            $CI->load->model('common_model');
            if($menu = $CI->common_model->get_row('users',array('id'=>user_id(),'role'=>4))){ 
                return $name =  $menu->first_name.' '.$menu->last_name;
            } else { 
                return FALSE; 
            }
        }
    }

    if(!function_exists('get_teacher_name')){
        function get_teacher_name()
        {
            $CI = & get_instance();
            $CI->load->model('common_model');
            if($menu = $CI->common_model->get_row('users',array('id'=>user_id(),'role'=>3))){ 
                return $name =  $menu->first_name.' '.$menu->last_name;
            } else { 
                return FALSE; 
            }
        }
    }  

    if(!function_exists('get_institute_name')){
        function get_institute_name($institute_id='')
        {
            $CI = & get_instance();
            $CI->load->model('common_model');
            if($menu = $CI->common_model->get_row('users',array('id'=>$institute_id,'role'=>2))){ 
                return $name =  $menu->institute_name;
            } else { 
                return FALSE; 
            }
        }
    }

    if(!function_exists('get_user_Image_info')){
        function get_user_Image_info()
        {
            $CI = & get_instance();
            $CI->load->model('common_model');
            if($menu = $CI->common_model->get_row('users',array('id'=>user_id()))){ 
                return $name =  $menu->coverImage;
            } else { 
                return FALSE; 
            }
        }
    }

    if (!function_exists('user_name')) {
        function user_name()
        {
        $CI = & get_instance();
        $user_info = $CI->session->userdata('user_info');
        if ($user_info['logged_in'] === TRUE) return $user_info['fullName'];  else return FALSE;
        }
    }

    if (!function_exists('feed_time')) {
        function feed_time($date)
        {

               $timestamp = strtotime($date);   
       
               $strTime = array("second", "minute", "hour", "day", "month", "year");
               $length = array("60","60","24","30","12","10");

               $currentTime = time();
               if($currentTime >= $timestamp) {
                    $diff     = time()- $timestamp;
                    for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
                    $diff = $diff / $length[$i];
                    }

                    $diff = round($diff);
                    return $diff . " " . $strTime[$i] . "(s) ago ";
               }
           
        }
    }


   

    if (!function_exists('time_elapsed_string')) {
        function time_elapsed_string($datetime, $full = false)
        {
            $now = new DateTime;
            $ago = new DateTime($datetime);

            $ago->setTimezone(new DateTimeZone('Asia/Kolkata'));
            $diff = $now->diff($ago);

            $diff->w = floor($diff->d / 7);
            $diff->d -= $diff->w * 7;

            $string = array(
                    'y' => 'year',
                    'm' => 'month',
                    'w' => 'week',
                    'd' => 'day',
                    'h' => 'hour',
                    'i' => 'minute',
                    's' => 'second',
            );
            foreach ($string as $k => &$v) {
                if ($diff->$k) {
                    $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                } else {
                    unset($string[$k]);
                }
            }

            if (!$full) $string = array_slice($string, 0, 1);
            return $string ? implode(', ', $string) . ' ago' : 'just now';
        }
    }

    if (!function_exists('backend_pagination')) {
        function backend_pagination()
        {
        $data = array();
        $data['full_tag_open'] = '<ul class="pagination">';
        $data['full_tag_close'] = '</ul>';
        $data['first_tag_open'] = '<li>';
        $data['first_tag_close'] = '</li>';
        $data['num_tag_open'] = '<li>';
        $data['num_tag_close'] = '</li>';
        $data['last_tag_open'] = '<li>';
        $data['last_tag_close'] = '</li>';
        $data['next_tag_open'] = '<li>';
        $data['next_tag_close'] = '</li>';
        $data['prev_tag_open'] = '<li>';
        $data['prev_tag_close'] = '</li>';
        $data['cur_tag_open'] = '<li class="active"><a href="#">';
        $data['cur_tag_close'] = '</a></li>';
        return $data;
        }
    }


    if (!function_exists('frontend_pagination')) {
        function frontend_pagination()
        {
        $data = array();
        $data['full_tag_open'] = '<ul class="pagination pull-right">';
        $data['full_tag_close'] = '</ul>';
        $data['first_tag_open'] = '<li>';
        $data['first_tag_close'] = '</li>';
        $data['num_tag_open'] = '<li>';
        $data['num_tag_close'] = '</li>';
        $data['last_tag_open'] = '<li>';
        $data['last_tag_close'] = '</li>';
        $data['next_tag_open'] = '<li>';
        $data['next_tag_close'] = '</li>';
        $data['prev_tag_open'] = '<li>';
        $data['prev_tag_close'] = '</li>';
        $data['cur_tag_open'] = '<li class="active"><a href="#">';
        $data['cur_tag_close'] = '</a></li>';
        return $data;
        }
    }
    
    if (!function_exists('msg_alert')) {

        function msg_alert_backend()
        {
        $CI = & get_instance();
        ?>

        <?php if ($CI->session->flashdata('msg_success')): ?>

        <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <!-- <strong>Success :</strong> <br> --> <?php echo $CI->session->flashdata('msg_success'); ?>
        </div>

        <?php endif; ?>

        <?php if ($CI->session->flashdata('msg_info')): ?>

        <div class="alert alert-info">

        <button type="button" class="close" data-dismiss="alert">&times;</button>

        <!-- <strong>Info :</strong> <br> --> <?php echo $CI->session->flashdata('msg_info'); ?>

        </div>

        <?php endif; ?>

        <?php if ($CI->session->flashdata('msg_warning')): ?>

        <div class="alert alert-warning">

        <button type="button" class="close" data-dismiss="alert">&times;</button>

        <!--  <strong>Warning :</strong> <br> --> <?php echo $CI->session->flashdata('msg_warning'); ?>

        </div>

        <?php endif; ?>


        <?php if ($CI->session->flashdata('msg_error')): ?>

        <div class="alert alert-danger">

        <button type="button" class="close" data-dismiss="alert">&times;</button>

        <!-- <strong>Error :</strong> <br> --> <?php echo $CI->session->flashdata('msg_error'); ?>

        </div>

        <?php endif; ?>

        <?php

        }

    }


    if (!function_exists('msg_alert_frontend')) {

        function msg_alert_frontend()
        {

        $CI = & get_instance();

        ?>

        <?php if ($CI->session->flashdata('msg_success')): ?>


        <div class="alert alert-success">

        <!--  <button type="button" class="close" data-dismiss="alert">&times;</button> -->

        <!-- <strong>Success :</strong> <br> --> <?php echo $CI->session->flashdata('msg_success'); ?>

        </div>

        <?php endif; ?>

        <?php if ($CI->session->flashdata('msg_info')): ?>

        <div class="alert alert-info">

        <!-- <button type="button" class="close" data-dismiss="alert">&times;</button> -->

        <!-- <strong>Info :</strong> <br> --> <?php echo $CI->session->flashdata('msg_info'); ?>

        </div>

        <?php endif; ?>

        <?php if ($CI->session->flashdata('msg_warning')): ?>

        <div class="alert alert-warning">

        <!-- <button type="button" class="close" data-dismiss="alert">&times;</button> -->

        <!--  <strong>Warning :</strong> <br> --> <?php echo $CI->session->flashdata('msg_warning'); ?>


        </div>

        <?php endif; ?>

        <?php if ($CI->session->flashdata('msg_error')): ?>

        <div class="alert alert-danger">

        <!-- <button type="button" class="close" data-dismiss="alert">&times;</button> -->

        <!-- <strong>Error :</strong> <br> --> <?php echo $CI->session->flashdata('msg_error'); ?>

        </div>

        <?php endif; ?>

        <?php

        }
    }

  if (!function_exists('generateRandomString')) {
        function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
  }

    if (!function_exists('get_course_category_name')) {
        
        function get_course_category_name($cat_id=''){

            $CI = & get_instance();
            $CI->db->where('id',$cat_id);
            $CI->db->from('course_category');
            $query = $CI->db->get();  
            if ($query->num_rows()>0) 
                return $query->row();
            else
                return 0;
        
        }
    } 
 if (!function_exists('get_course_name')) {
        
        function get_course_name($cat_id=''){

            $CI = & get_instance();
            $CI->db->where('id',$cat_id);
            $CI->db->from('courses');
            $query = $CI->db->get();  
            if ($query->num_rows()>0) 
                return ucfirst($query->row()->course_name);
            else
                return 0;
        
        }
    } 


 if (!function_exists('get_this_book_status')) {
        
        function get_this_book_status($book_id=''){

            $CI = & get_instance();
            $CI->db->where('book_id',$book_id);
            $CI->db->where('user_id',user_id());
            $CI->db->from('libraries');
            $query = $CI->db->get();  
            if ($query->num_rows()>0) 
                return TRUE;
            else
                return FALSE;
        
        }
    } 

    if (!function_exists('get_book_infomation')) {
        
        function get_book_infomation($book_id=''){

            $CI = & get_instance();
            $CI->db->where('id',$book_id);
            $CI->db->from('books');
            $query = $CI->db->get();  
            if ($query->num_rows()>0) 
                return $query->row();
            else
                return FALSE;
        
        }
    }
    if (!function_exists('get_all_notebook')) {
        
        function get_all_notebook(){

            $CI = & get_instance();
            $CI->db->where('user_id',user_id());
            $CI->db->from('notebooks');
            $query = $CI->db->get();  
            if ($query->num_rows()>0) 
                return $query->result();
            else
                return FALSE;
        
        }
    }

    // if (!function_exists('get_all_notebook')) {
        
    //     function get_all_notebook(){

    //         $CI = & get_instance();
    //         $CI ->db->select('lb.*,b.id as main_book_id,b.*');
    //         $CI ->db->where('lb.user_id',user_id());
    //         $CI ->db->from('libraries as lb');
    //         $CI ->db->join('books as b','lb.book_id = b.id','left'); 
    //         $query = $CI ->db->get();  
    //         if ($query->num_rows()>0) 
    //             return $query->result();
    //         else
    //             return 0;
        
    //     }
    // } 






    
    /* GET INSTITUTE NAME */

    if (!function_exists('get_institute_name')) {
        
        function get_institute_name($inst_id=''){

            $CI = & get_instance();
            $CI->db->where('role',2);
            $CI->db->where('status',1);
            $CI->db->where('id',$inst_id);
            $CI->db->from('users');
            $query = $CI->db->get();  
            if ($query->num_rows()>0) 
                return $query->row()->institute_name;
            else
                return 0;
        
        }
    }

    /* GET BOOK CATEGORY */

    if (!function_exists('get_all_book_category')){    
        function get_all_book_category($inst_id=''){
            $CI = & get_instance();
            $CI->db->where('status',1);
            $CI->db->from('categories');
            $query = $CI->db->get();  
            if ($query->num_rows()>0) 
                return $query->result();
            else
                return 0;
        }
    }

    
/**

 *

 *  Menu Information

 *

 */


if (!function_exists('upload_file')) {



    function upload_file($param = null) {



        $CI = & get_instance();



        $config['upload_path'] = './assets/uploads/';



        $config['allowed_types'] = 'gif|jpg|png|xls|xlsx|csv|jpeg|pdf|doc|docx';



        $config['max_size'] = 1024 * 90;



        $config['image_resize'] = TRUE;

        

        $config['resize_width'] = 200;



        $config['resize_height'] = 200;

 

        if ($param) {



            $config = $param + $config;



        }



        $CI->load->library('upload');



        $CI->upload->initialize($config);



        if (!empty($config['file_name'])) $file_Status = $CI->upload->do_upload($config['file_name']);



        else $file_Status = $CI->upload->do_upload();



        if (!$file_Status) {



            return array('STATUS' => FALSE, 'FILE_ERROR' => $CI->upload->display_errors());



        } else {





        $uplaod_data = $CI->upload->data();



            // if(empty($param['resize_width'])&&empty($param['resize_height'])){

            //      // $original_height = $uplaod_data['image_height']; 

            //      // $original_width =  $uplaod_data['image_width']; 

            //         $config['resize_width']=175; 

            //         $config['resize_height']=150;

            //  } 



            $upload_file = explode('.', $uplaod_data['file_name']);





            if ($config['image_resize'] && in_array($upload_file[1], array('gif', 'jpeg', 'jpg', 'png', 'bmp', 'jpe'))) {



                $param2 = array(



                    'source_image' => $config['source_image'] . $uplaod_data['file_name'],



                    'new_image' => $config['new_image'] . $uplaod_data['file_name'],



                    'create_thumb' => FALSE,



                    'maintain_ratio' => TRUE,



                    'width' => $config['resize_width'],



                    'height' => $config['resize_height'],



                );





                image_resize($param2);



            }



            if (empty($config['image_resize']) && in_array($upload_file[1], array('gif', 'jpeg', 'jpg', 'png', 'bmp', 'jpe'))) {



                $param3 = array(

                    'file_name' => $uplaod_data['file_name'],



                    'source_image' => $config['source_image'] . $uplaod_data['file_name'],



                    'new_image' => $config['new_image'] . $uplaod_data['file_name'],



                    'maintain_ratio' => 0,



                    'width' => $config['resize_width'],



                    'height' => $config['resize_height'],



                );



               create_frontend_thumbnail($param3);



            }

            return array('STATUS' => TRUE, 'UPLOAD_DATA' => $uplaod_data);



        }



    }







}



    function create_frontend_thumbnail($config_img = '')
    {

        $CI = & get_instance();

        $config_image['image_library'] = 'gd2';

        $config_image['source_image'] = $config_img['source_image'];

        $config_image['file_name'] = $config_img['file_name'];

        $config_image['new_image'] = $config_img['new_image'];

        $config_image['height'] = $config_img['height'];

        $config_image['width'] = $config_img['width'];

        list($width, $height, $type, $attr) = getimagesize($config_image['source_image']);

        if ($width < $height) {

            $cal = $width / $height;


            $config_image['width'] = $config_img['width'] * $cal;


        }



        if ($height < $width) {



            $cal = $height / $width;



            $config_image['height'] = $config_img['height'] * $cal;



        }



        $CI->load->library('image_lib');

        $CI->image_lib->initialize($config_image);

        if (!$CI->image_lib->resize()) return array('status' => FALSE, 'error_msg' => $CI->image_lib->display_errors());



        else return array('status' => TRUE, 'file_name' => $config_image['file_name']);



    }


/**

 *

 *  thumbnail image

 *

 */



if (!function_exists('create_thumbnail')) {

    function create_thumbnail($config_img = '')
    {


        $CI = & get_instance();

        $config_image['image_library'] = 'gd2';

        $config_image['source_image'] = $config_img['source_path'] . $config_img['file_name'];

        $config_image['encrypt_name'] = TRUE;

        $config_image['new_image'] = $config_img['destination_path'] . $config_img['file_name'];

        $config_image['maintain_ratio'] = FALSE;

        $config_image['height'] = $config_img['height'];

        $config_image['width'] = $config_img['width'];

    if (!empty($config_image['image_resize'])) {

        list($width, $height, $type, $attr) = getimagesize($config_img['source_path'] . $config_img['file_name']);



        if ($width < $height) {



            $cal = $width / $height;



            $config_image['width'] = $config_img['width'] * $cal;



        }



        if ($height < $width) {



            $cal = $height / $width;



            $config_image['height'] = $config_img['height'] * $cal;



        }

    }


        $CI->load->library('image_lib');

        $CI->image_lib->initialize($config_image);

        if (!$CI->image_lib->resize()) return array('status' => FALSE, 'error_msg' => $CI->image_lib->display_errors());



        else return array('status' => TRUE, 'file_name' => $config_img['file_name']);



    }







}



function check_image_type($image,$type){

     switch ($type) {

           case IMAGETYPE_JPEG:

             $source = imagecreatefromjpeg($path);

             break;

             

           case IMAGETYPE_GIF:

             $source = imagecreatefromgif($path);

           

           case IMAGETYPE_PNG:

             $source = imagecreatefrompng($path);

           }

           return $source;

   }

