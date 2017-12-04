<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends CI_Controller {
	
    function __construct(){
        parent::__construct();
        clear_cache();
        //$this->load->library('twilio');
        //$this->load->library('excel');
        $this->load->model('user_model');
    }
    
    function index(){

        $this->form_validation->set_rules('username', 'User name', 'trim|required|min_length[5]|max_length[12]|is_unique[users.userName]');
        $this->form_validation->set_rules('email','Email', 'trim|required');
        $this->form_validation->set_rules('phone','Phone', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('conPassword', 'Password Confirmation', 'trim|required|matches[password]');
        $this->form_validation->set_rules('institute_name', 'Institute Name', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        if ($this->form_validation->run() != FALSE)
        {
            $token = random_string('alnum', 6);

            $postData = array(
                                    'role'      => 2,
                                    'status'    => 0,
                                    'userName'  => $this->input->post('username'),
                                    'email'     => $this->input->post('email'),
                                    'mobile'    => $this->input->post('phone'),
                                    'password'  => sha1($this->input->post('password')),
                                    'institute_name' => $this->input->post('institute_name'),
                                    'secret_key' => $token
                             );

            //$this->send_otp_mail($this->input->post('username'),$this->input->post('email'),$token);
            //OTP on 

            $message = 'Tabschool: Phone verification otp -'.$token;          
            $authKey = "4131A8OhCb4HetmU591dccd7"; //Your authentication key
            $mobileNumber = $this->input->post('phone'); //Multiple mobiles numbers separated by comma
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

            $institute_id = $this->user_model->insert('users',$postData);
            
            $postData['institute_id'] =  $institute_id;
           
            if(!empty($institute_id)){

                $this->session->set_userdata("institute_info",$postData);
                //$this->session->set_flashdata('message',"Institute saved successfully. OTP send on your registered phone number. Right now user this OTP : $token");
                redirect('/Signup/check_otp');

            }

        }
        else
        {
            //$this->view('institute/signup');
            $data['template']='institute/register';
            $this->load->view('templates/institute/main_layout', $data);
        }
    }


    public function send_otp_mail($username='',$email='',$otp='')
    {
        $to=$email; //change to ur mail address
        $strSubject="Notification to Verify OTP from Tabschool";
        $message .= '<html>';
        $message .= '<body>';
        $message .= '<table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;border-left:solid 1px #e6e6e6;border-right:solid 1px #e6e6e6">';
        $message .= '<tbody>';
        $message .= '<tr>';
        $message .= '<td width="10" bgcolor="#28354d" style="width:10px;background:linear-gradient(to bottom,#28354d 0%,#28354d 89%);background-color:#28354d">&nbsp;</td>';
        $message .= '<td valign="middle" align="left" height="50" bgcolor="#28354d" style="background:linear-gradient(to bottom,#28354d 0%,#28354d 89%);background-color:#28354d;padding:0;margin:0"><a style="text-decoration:none;outline:none;color:#ffffff;font-size:13px" href="#" target="_blank">';
        $message .= 'Tabschool.Com</a></td>';
        $message .= '<td valign="middle" align="right" height="50" bgcolor="#28354d" style="background:linear-gradient(to bottom,#28354d 0%,#28354d 89%);background-color:#28354d;padding:0;margin:0"><a style="text-decoration:none;outline:none;color:#ffffff;font-size:12px" href="" target="_blank">';
        $message .= '</a></td>';
        $message .= '<td width="10" bgcolor="#28354d" style="width:10px;background:linear-gradient(to bottom,#28354d 0%,#28354d 89%);background-color:#28354d">&nbsp;</td>';
        $message .= '</tr>';
        $message .= '</tbody>';
        $message .= '</table>';
        $message .= '<table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;border-left:solid 1px #e6e6e6;border-right:solid 1px #e6e6e6">';
        $message .= '<tbody>';
        $message .= '</tbody>';
        $message .= '</table>';
        $message .= '<table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;border-left:solid 1px #e6e6e6;border-right:solid 1px #e6e6e6">';
        $message .= '<tbody>';
        $message .= '<tr>';
        $message .= '<td align="left" valign="top" style="color:#2c2c2c;display:block;line-height:20px;font-weight:300;margin:0 auto;clear:both;border-bottom:2px dashed #ccc;background-color:#f9f9f9;padding:20px" bgcolor="#F9F9F9"><p style="padding:0;margin:0;font-size:16px;font-weight:bold;font-size:13px"> Hi  '.$username.'';
        $message .= '</p>';
        $message .= '<br>';
        $message .= '<p style="padding:0;margin:0;color:#565656;line-height:22px;font-size:13px">Lorem ipsum dolor sit amet, consectetur pisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo <a href="#"> www.tabschool.com,</a> consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse';
        $message .= 'cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non';
        $message .= 'proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';
        $message .= '</p>';
        $message .= '<p> <strong> Your One Time Password :</strong> '.$otp.'  </p>';
        $message .= '</td>';
        $message .= '</tr>';
        $message .= '</tbody>';
        $message .= '</table>';
        $message .= '<table width="100%" cellspacing="0" cellpadding="0" style="max-width:600px;border:solid 1px #e6e6e6;border-top:none">';
        $message .= '<tbody>';
        $message .= '<tr>';
        $message .= '<td valign="top" align="center" style="text-align:center;background-color:#f9f9f9;display:block;margin:0 auto;clear:both;padding:15px 40px" bgcolor=""><p style="padding:0;margin:0 0 7px 0">';
        $message .= '<a title="tabschool.com" style="text-decoration:none;color:#565656" href="http://www.tabschool.com" target="_blank"><span style="color:#565656;font-size:13px">www.tabschool.com</span></a>';
        $message .= '</p>';
        $message .= '<p style="padding:10px 0 0 0;margin:0;border-top:solid 1px #cccccc;font-size:11px;color:#565656"><a href="#">FACEBOOK</a> &nbsp; | &nbsp; <a href="#">GOOGLE+</a> &nbsp; | &nbsp; <a href="#">TWITTER</a> </p></td> </tr> </tbody>';
        $message .= '</table>';
        $message .= '</body></html>';                 
        $headers  = 'MIME-Version: 1.0'."\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
        $headers .= "Bcc: carpenter.ritesh17@gmail.com\r\n";
        $headers .= "From: info@tabschool.com"; 
        $mail_sent=mail($to,$strSubject,$message,$headers);  
        
        if($mail_sent){
           return TRUE;
        }else{
           return FALSE;
        }

    }

    function logout() 
    {
        $this->session->unset_userdata('institute_info');
        $this->session->unset_userdata('varifiedSecure');
        $this->session->sess_destroy();  
        redirect('Signup');
    }

    function check_otp(){
        $institute_info = $this->session->userdata('institute_info');
        if(!empty($institute_info)){

            if(!empty($this->session->userdata('varifiedSecure'))){
                $this->session->unset_userdata('varifiedSecure');
            }

            $this->form_validation->set_rules('otp_token', 'OTP', 'trim|required');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if ($this->form_validation->run() != FALSE)
            {
                $instituteId = $institute_info['institute_id'];
                $otp_token = $this->input->post('otp_token');
                $result = $this->user_model->get_row('users',array('role'=>2,'secret_key'=>$otp_token,'id'=>$instituteId));
                
                if(!empty($result)){

                    $varified = array('varified' =>1);
                    $this->session->set_userdata('varifiedSecure',$varified);

                  

                    $data['status'] = true;
                    $data['message'] = 'You have verified phone number successfully.';
                    $this->session->set_flashdata('message',$data);
                    redirect('/Signup/plans');
               
                } else {

                    $data['status'] = false;
                    $data['message'] = 'Please enter valid OTP.';
                }    
 
            }

            $data['template']='institute/checkotp';
            $this->load->view('templates/institute/main_layout', $data);
        }
        else
        {
            redirect('Signup');
        }    

      
    }


    function plans(){
        $institute_info = $this->session->userdata('institute_info');
        $varifiedSecure = $this->session->userdata('varifiedSecure');
        if(!empty($institute_info) && !empty($varifiedSecure)){

            $instituteId = $institute_info['institute_id'];
            $data = $this->input->post();
            if(isset($data) && !empty($data)){

                $arr = array('plan'=>$this->input->post('plan'));
                $result = $this->user_model->update('users', $arr ,array('role'=>2,'id'=>$instituteId));

                if(!empty($this->session->userdata('varifiedSecure'))){
                    $varifiedSecure = $this->session->userdata('varifiedSecure');
                    $this->session->unset_userdata('varifiedSecure');
                    $varifiedSecure['plan']= $this->input->post('plan');
                    $this->session->set_userdata('varifiedSecure',$varifiedSecure);
                }

                $varifiedSecure = $this->session->userdata('varifiedSecure');
                // $this->institute_model->update_plan($instituteId,$data);
                redirect(base_url().'Signup/bulkupload_student');
            }
            $data['template']='institute/main_plans';
            $this->load->view('templates/institute/main_layout', $data);

        }else{
             redirect('Signup');
        }
       
    }


    function bulkupload_student(){
        //$this->view('institute/bulkupload');
        $institute_info = $this->session->userdata('institute_info');
        $varifiedSecure = $this->session->userdata('varifiedSecure');
        if(!empty($institute_info) && !empty($varifiedSecure)){

            if($_FILES){
            
                if(!empty($_FILES['import_csv']['name'])){

                    //Сheck that we have a file
                    if((!empty($_FILES["import_csv"])) && ($_FILES['import_csv']['error'] == 0)) {
                        //Check if the file is JPEG image and it's size is less than 350Kb
                        $filename = basename($_FILES['import_csv']['name']);
                        $ext = substr($filename, strrpos($filename, '.') + 1);
                        if(($ext == "csv") &&  ($_FILES["import_csv"]["size"] < 350000)) {
                            
                          //Determine the path to which we want to save this file
                          $newname = './assets/uploads/students/'.$filename;
                          //Check if the file with the same name is already exists on the server
                          if (!file_exists($newname)) {
                            //Attempt to move the uploaded file to it's new place
                                if((move_uploaded_file($_FILES['import_csv']['tmp_name'],$newname))) {
                                    
                                    //echo $data['error'] = "It's done! The file has been saved as: ".$newname; die;
                                    if($this->read_csv_xls_xlsx(array('file'=>$filename,'path'=>'./assets/uploads/students/'))){                          
                                      $filename='./assets/uploads/students/'.$filename;
                                      unlink($filename);
                                        //$this->session->set_flashdata('msg_success',"Customers imported successfully.");
                                      redirect('Signup/bulkupload_teacher/');
                                    }
                                } else {

                                    $this->session->set_flashdata('msg_error','Error: A problem occurred during file upload!');
                                    redirect('backend/bulkupload_student/');
                                }
                           } else {
                                $this->session->set_flashdata('msg_error_csv','Error: A problem occurred during file upload! File is already exists');
                                redirect('backend/bulkupload_student/');
                           }
                      } else {
                         
                        $this->session->set_flashdata('msg_error','Error: Only .jpg images under 350Kb are accepted for upload');
                        redirect('backend/bulkupload_student/');
                      }
                    } else {
                        $this->session->set_flashdata('msg_error','Error: No file Selected');
                        redirect('backend/bulkupload_student/');
                    }
              
                 } else {

                        $this->session->set_flashdata('msg_error_csv','Error: No file Selected');
                        redirect('backend/bulkupload_student/');
                    }
               }
           
            $data['template']='institute/student_upload';
            $this->load->view('templates/institute/main_layout', $data);
        }else{
                redirect('Signup');
        }    
    }

    function bulkupload_teacher(){
        //$this->view('institute/bulkupload');
        $institute_info = $this->session->userdata('institute_info');
        $varifiedSecure = $this->session->userdata('varifiedSecure');
        if(!empty($institute_info) && !empty($varifiedSecure)){

            if($_FILES){
            
                if(!empty($_FILES['import_csv']['name'])){

                    //Сheck that we have a file
                    if((!empty($_FILES["import_csv"])) && ($_FILES['import_csv']['error'] == 0)) {
                        //Check if the file is JPEG image and it's size is less than 350Kb
                        $filename = basename($_FILES['import_csv']['name']);
                        $ext = substr($filename, strrpos($filename, '.') + 1);
                        if(($ext == "csv") &&  ($_FILES["import_csv"]["size"] < 350000)) {
                            
                          //Determine the path to which we want to save this file
                          $newname = './assets/uploads/teachers/'.$filename;
                          //Check if the file with the same name is already exists on the server
                          if (!file_exists($newname)) {
                            //Attempt to move the uploaded file to it's new place
                                if((move_uploaded_file($_FILES['import_csv']['tmp_name'],$newname))) {
                                    
                                    //echo $data['error'] = "It's done! The file has been saved as: ".$newname; die;
                                    if($this->read_csv_xls_xlsx_teacher(array('file'=>$filename,'path'=>'./assets/uploads/teachers/'))){                          
                                        $filename='./assets/uploads/teachers/'.$filename;
                                        unlink($filename);
                                        $this->session->set_flashdata('msg_success',"Techers imported successfully.");
                                        if(trim($varifiedSecure['plan'])=='trial'){
                                            redirect(base_url().'Signup/complete_detail');
                                        }else if(trim($varifiedSecure['plan'])=='plan') {
                                            redirect(base_url().'Signup/pay_checkout');
                                        }else{
                                            redirect(base_url().'Signup');
                                        }
                                    }
                                } else {

                                    $this->session->set_flashdata('msg_error','Error: A problem occurred during file upload!');
                                    redirect('backend/bulkupload_teacher/');
                                }
                            } else {
                                $this->session->set_flashdata('msg_error_csv','Error: A problem occurred during file upload! File is already exists');
                                redirect('backend/bulkupload_teacher/');
                            }
                          } else {
                             
                            $this->session->set_flashdata('msg_error','Error: Only .jpg images under 350Kb are accepted for upload');
                            redirect('backend/bulkupload_teacher/');
                          }
                    } else {
                        $this->session->set_flashdata('msg_error','Error: No file Selected');
                        redirect('backend/bulkupload_teacher/');
                    }
              
                    } else {

                            $this->session->set_flashdata('msg_error_csv','Error: No file Selected');
                            redirect('backend/bulkupload_teacher/');
                    }
               }
           
            $data['template']='institute/teacher_bulkupload';
            $this->load->view('templates/institute/main_layout', $data);
        }else{
                redirect('Signup');
        }    
    }
    
   
    function resendOTP(){
        $phoneVerifyInfo = $this->session->userdata('phoneVerifyInfo');
        if(isset($phoneVerifyInfo) && !empty($phoneVerifyInfo)){
            $token = random_number(6);
            $instituteId = $phoneVerifyInfo['instituteId'];
            $result = $this->institute_model->updateOTPtoken($token,$instituteId);
            $from = '+15005550006'; //'+19314139902';
            $to = '+917879147249';
            $message = 'Tabschool: Phone verification otp - '.$token;
            $response = $this->twilio->sms($from, $to, $message);
            if($response->IsError){
                    echo 'Error: ' . $response->ErrorMessage;
                    die();
            }
            
            if($result){
                $this->session->set_flashdata('message',"OTP resend on your registered phone number. $token");
            }
            else
            {
                $this->session->set_flashdata('message','Please enter valid institute id.');
            }
            
            redirect('/institute/institute/check_otp');
        }else {

            redirect('/institute');
        
        }
    }

    private function read_csv_xls_xlsx($param=array()){

        $institute_info = $this->session->userdata('institute_info');
        $varifiedSecure = $this->session->userdata('varifiedSecure');
        $instituteId = $institute_info['institute_id'];
        
        if(!isset($param['file']) && empty($param['file'])){
            $this->session->set_flashdata('msg_error','File Name can\'t be blank, Please try again.');
            return FALSE;
        }

        if(!isset($param['path']) && empty($param['path'])){
            $this->session->set_flashdata('msg_error','File Path can\'t be blank, Please try again.');
            return FALSE;
        }

        $filename = $param['path'].$param['file'];
     
        if(file_exists($filename)){
            require(APPPATH.'libraries/spreadsheet-reader/php-excel-reader/excel_reader2.php');
            require(APPPATH.'libraries/spreadsheet-reader/SpreadsheetReader.php');

            $Reader = new SpreadsheetReader($filename);
            $l=0; $u=0;$i=0; $R=0;
           // $customer_exist_data=array();
            //$password = $param['password'];
            foreach($Reader as $row):

                    if((!empty($row[1])) && $l>0):
                        $item_slug= trim($row[0]);

                        $inst_data['role'] = '4'; 
                        $inst_data['status'] = '1'; 
                        
                        $inst_data['parent_id'] = $instituteId; 
                        $inst_data['password'] = sha1('12345');  // Random Generate 
                        if(isset($row[1]))
                          $inst_data['enrollment_number']= trim($row[1]);  
                        if(isset($row[2]))
                          $inst_data['first_name']= trim($row[2]);  
                        if(isset($row[3]))
                          $inst_data['last_name'] = trim($row[3]);
                        if(isset($row[4]))
                          $inst_data['email'] = trim($row[4]);
                        if(isset($row[5]))
                          $inst_data['mobile'] = trim($row[5]);
                        if(isset($row[6]))
                          $inst_data['status'] = trim($row[6]);
                       
                        $inst_data['created_at'] = date('Y-m-d h:i:s');
                    
                        $this->user_model->insert('users',$inst_data);           
                                                
                    endif;

                    //  Email Implementation 
            
                $l++;
            endforeach;
       
            $this->session->set_flashdata('msg_success',"Student imported successfully.");
            return TRUE;

        }else{
            $this->session->set_flashdata('msg_error','teachers does not exist, Please try again.');
            return FALSE;
        }
            
    }

    private function read_csv_xls_xlsx_teacher($param=array()){

        $institute_info = $this->session->userdata('institute_info');
        $varifiedSecure = $this->session->userdata('varifiedSecure');
        $instituteId = $institute_info['institute_id'];
        
        if(!isset($param['file']) && empty($param['file'])){
            $this->session->set_flashdata('msg_error','File Name can\'t be blank, Please try again.');
            return FALSE;
        }

        if(!isset($param['path']) && empty($param['path'])){
            $this->session->set_flashdata('msg_error','File Path can\'t be blank, Please try again.');
            return FALSE;
        }

        $filename = $param['path'].$param['file'];
     
        if(file_exists($filename)){
            require(APPPATH.'libraries/spreadsheet-reader/php-excel-reader/excel_reader2.php');
            require(APPPATH.'libraries/spreadsheet-reader/SpreadsheetReader.php');

            $Reader = new SpreadsheetReader($filename);
            $l=0; $u=0;$i=0; $R=0;
           // $customer_exist_data=array();
            //$password = $param['password'];
            foreach($Reader as $row):

                    if((!empty($row[1])) && $l>0):
                        $item_slug= trim($row[0]);

                        $inst_data['role'] = '3'; 
                        $inst_data['status'] = '1'; 
                        $inst_data['parent_id'] = $instituteId; 
                        $inst_data['password'] = sha1('12345');
                        if(isset($row[1]))
                          $inst_data['enrollment_number']= trim($row[1]);  
                        if(isset($row[2]))
                          $inst_data['first_name']= trim($row[2]);  
                        if(isset($row[3]))
                          $inst_data['last_name'] = trim($row[3]);
                        if(isset($row[4]))
                          $inst_data['email'] = trim($row[4]);
                        if(isset($row[5]))
                          $inst_data['mobile'] = trim($row[5]);
                        if(isset($row[6]))
                          $inst_data['status'] = trim($row[6]);
                       
                        $inst_data['created_at'] = date('Y-m-d h:i:s');
                    
                        $this->user_model->insert('users',$inst_data);           
                                                
                    endif;
            
                $l++;
            endforeach;
       
            $this->session->set_flashdata('msg_success',"Student imported successfully.");
            return TRUE;

        }else{
            $this->session->set_flashdata('msg_error','teachers does not exist, Please try again.');
            return FALSE;
        }
            
    }

    public function download()
    {
        $this->load->helper('download');
        $data = file_get_contents(base_url()."assets/uploads/students.csv"); // Read the file's contents
        $name = 'students.csv';
        if(force_download($name, $data)){
            redirect('Signup/bulkupload_student/');
        } 
    }
    
    public function teacher_download()
    {
        $this->load->helper('download');
        $data = file_get_contents(base_url()."assets/uploads/teachers.csv"); // Read the file's contents
        $name = 'teachers.csv';
        if(force_download($name,$data)){
            redirect('Signup/bulkupload_teacher/');
        } 
    }

    
    public function add_students(){

        $institute_info = $this->session->userdata('institute_info');
        $varifiedSecure = $this->session->userdata('varifiedSecure');
        $instituteId = $institute_info['institute_id'];
        if(!empty($institute_info) && !empty($varifiedSecure)){

            $postData = $this->input->post();
            if(isset($postData) && !empty($postData)){
                $studentArr = array();
                for($i=0; $i<count($postData['enrollmentno']); $i++){

                        $student['role'] = 4;
                        $student['status'] = '1';
                        $student['password'] = sha1('12345'); 
                        $student['parent_id'] = $instituteId;
                        $student['enrollment_number'] = $postData['enrollmentno'][$i];
                        $student['first_name'] = $postData['first_name'][$i];
                        $student['last_name'] = $postData['last_name'][$i];
                        $student['email'] = $postData['email'][$i];
                        $student['mobile'] = $postData['contact'][$i];
                        $student['created_at'] = date('Y-m-d h:i:s');
                        $studentArr[] = $student;
                        $this->user_model->insert('users',$student);

                }
                redirect(base_url().'Signup/bulkupload_teacher');
            }
            
            $data['template']='institute/add_student';
            $this->load->view('templates/institute/main_layout', $data);
        }else{
            $this->session->set_flashdata('msg_error','Failed, Please try again.');
            redirect('Signup'); 
        }
    }
    
    public function add_teachers(){

        $institute_info = $this->session->userdata('institute_info');
        $varifiedSecure = $this->session->userdata('varifiedSecure');
        
        $instituteId = $institute_info['institute_id'];
        if(!empty($institute_info) && !empty($varifiedSecure)){

            $postData = $this->input->post();
            if(isset($postData) && !empty($postData)){
                $teacherArr = array();

                for($i=0; $i<count($postData['teacher_unique_id']); $i++){

                    $teacher['role'] = 3;
                    $teacher['status'] = 1;
                    
                    $teacher['password'] = sha1('12345'); 
                    $teacher['parent_id'] = $instituteId;
                    $teacher['enrollment_number'] = $postData['teacher_unique_id'][$i];
                    $teacher['first_name'] = $postData['first_name'][$i];
                    $teacher['last_name']  = $postData['last_name'][$i];
                    $teacher['email']      = $postData['email'][$i];
                    $teacher['mobile']    = $postData['contact'][$i];
                    $teacher['created_at'] = date('Y-m-d h:i:s');
                    $teacherArr[] = $teacher;
                    $this->user_model->insert('users',$teacher);

                }  

                if(trim($varifiedSecure['plan'])=='trial'){
                    redirect(base_url().'Signup/complete_detail');
                }else if(trim($varifiedSecure['plan'])=='plan'){
                    redirect(base_url().'Signup/pay_checkout');
                }else{
                    redirect(base_url().'Signup');
                }

            }
            $data['template']= 'institute/add_teachers';
            $this->load->view('templates/institute/main_layout', $data);
        }else{
            $this->session->set_flashdata('msg_error','Failed, Please try again.');
            redirect('Signup'); 
        }
      
    }
    
    public function complete_detail()
    {
        $institute_info = $this->session->userdata('institute_info');
        $varifiedSecure = $this->session->userdata('varifiedSecure');
        $instituteId = $institute_info['institute_id'];
        if(!empty($institute_info) && !empty($varifiedSecure)){

            $this->user_model->get_result('users',array('role'=>2,'parent_id'=>$instituteId));

            $arr = array('status'=>1,'secret_key'=>'');
            $this->user_model->update('users', $arr ,array('role'=>2,'id'=>$instituteId));
            $this->session->unset_userdata('institute_info');
            $this->session->unset_userdata('varifiedSecure');
            $this->session->sess_destroy();  

            $data['template']='institute/complete-detail';
            $this->load->view('templates/institute/main_layout', $data);
        } else {
            $this->session->set_flashdata('msg_error','Failed, Please try again.');
            redirect('Signup'); 
        }
    }

    // public function checkout()
    // {

    //     $data['template']='institute/checkout';
    //     $this->load->view('templates/institute/layout', $data);
    // }

    public function pay_checkout(){


        $institute_info = $this->session->userdata('institute_info');
        $varifiedSecure = $this->session->userdata('varifiedSecure');
        $instituteId = $institute_info['institute_id'];
        if(!empty($institute_info) && !empty($varifiedSecure)){

            $postData = $this->input->post();
            if(isset($postData) && !empty($postData)){
                redirect(base_url().'Signup/complete_detail');
            }
            
            $data['total_student'] = $this->user_model->get_result('users',array('role'=>4,'parent_id'=>$instituteId));
            $data['total'] =count($data['total_student']);
            $data['total_amount'] = 50 * count($data['total_student']);
            $data['template']='institute/pay_checkout';
            $this->load->view('templates/institute/main_layout', $data);
        } else {
            $this->session->set_flashdata('msg_error','Failed, Please try again.');
            redirect('Signup'); 
        }
       
    }
    
   
    function view($view,$data=""){
        $this->load->view('templates/institute/header',$data);
        $this->load->view($view,$data);
        $this->load->view('templates/institute/footer',$data);
    }
}

