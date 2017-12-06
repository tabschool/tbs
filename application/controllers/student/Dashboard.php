<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        clear_cache();
        _check_user_login();  //check login authentication
        if(Get_Student_Status()===TRUE) {
            redirect(base_url('student/onboard/'));
        }
	    permissionBasedRedirect(4);
        $this->load->model('student_model');
    }

    public function index(){
        $data['template'] = "student/dashboard/index";
        $this->load->view('templates/student/layout', $data);
    }


    public function get_notification()
    { 
        $resp='';  $i=0; $j=0;
        if($_POST['status']){
        $user_info =  $this->student_model->get_row('users',array('id' =>user_id(),'status'=>1,'role'=>4));
        
    

        $con_not = $this->student_model->get_student_content_notification();
        $task_not = $this->student_model->get_student_task_notification();
        
        if(!empty($con_not)){

            foreach($con_not as $value){
                $content = $this->student_model->get_row('content_notification_status',array('user_id'=>user_id(),'content_id'=>$value->id));
                if(empty($content)){  
                    $i++;
                    $resp.='<li>';
                    $resp.='<a href="'.base_url('student/dashboard/check_contnet_status/'.$value->id).'">';
                    $resp.='<i class="material-icons">C</i>';
                    $resp.=ucfirst($value->title);
                    $resp.='</a>';
                    $resp.='</li>';            
                }
            }
        }

        if(!empty($task_not)){
            foreach($task_not as $value){
                date_default_timezone_set('Asia/Kolkata');
                $time = explode('/',$value->time);
                if(trim($time[2])===date('A')){
                    $main_time = strtotime(date($time[0].':'.$time[1]));
                    $min_time  = date('H:i',strtotime("-15 minutes",$main_time));
                    $time=date('H:i'); //5 minutes
                    if(strtotime($time)<=strtotime($min_time))
                    {
                        $check = $this->student_model->get_row('task_notification_status',array('user_id'=>user_id(),'task_id'=>$value->id));
                        if(empty($check)){
                            $arr = array('user_id'=>user_id(),'task_id'=>$value->id,'status'=>1,'msg_status'=>1);
                            $this->student_model->insert('task_notification_status',$arr);
                            $this->send_no($user_info->mobile);

                        } 
                    }
                }
                $j++;
                $resp.='<li>';
                $resp.='<a href="#">';
                $resp.='<i class="material-icons">event_note</i>';
                $resp.=ucfirst($value->task);
                $resp.='</a>';
                $resp.='</li>';            
            }
        }

        $total_no = $i+$j;

        if(!empty($resp)){
            $array = array('status'=>TRUE,'html'=>$resp,'count'=>$total_no);  
            $main  = json_encode($array);
            echo $main; return TRUE;
        }else{
            $array = array('status'=>FALSE,'html'=>'','count'=>0);  
            $main  = json_encode($array);
            echo $main; return FALSE;
        } 
      }else{
          $array = array('status'=>FALSE,'html'=>'','count'=>0);  
          $main  = json_encode($array);
          echo $main; return FALSE;
      }
    }

    public function check_contnet_status($content_id='')
    {   
        if(empty($content_id)) redirect('student/Classfeed/');
        $con_info = $this->student_model->get_row('contents',array('id'=>$content_id));
        if(empty($con_info)) redirect('student/Classfeed/');
        
        $array = array('user_id'=>user_id(),'content_id'=>$con_info->id,'status'=>1);
        if ($this->student_model->insert('content_notification_status',$array)) {
           redirect('student/Classfeed/view_feed/'.$con_info->id);
        } else {
           redirect('student/Classfeed/');
        }
    }


    public function send_no($moble='')
    {
        
        $message = 'Tabschool: Your Task is ready to execute in 15 minutes -Please visit Tabschool';          
        $authKey = "4131A8OhCb4HetmU591dccd7"; //Your authentication key
        $mobileNumber = $moble; //Multiple mobiles numbers separated by comma
        $senderId = "TABNOT"; //Sender ID,While using route4 sender id should be 6 characters long.
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
    }


}
