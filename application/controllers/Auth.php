<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		clear_cache();
		$this->load->model('user_model');
	}
	
	private function check_login(){
		if(trainer_logged_in()===FALSE)
		redirect(base_url('auth/login'));
	}

	public function index()
	{
		$this->login();
	}
	
	 public function login(){
	 
		if(user_logged_in()===TRUE){
			roleBasedRedirect();
		}

		$data['title_top']='Login';
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_error_delimiters('<div class="error text-danger">', '</div>');

		if($this->form_validation->run() == TRUE){

		    $data = array('email'=>$this->input->post('email'),'password' => sha1($this->input->post('password')),'status'=>1);      
			if($this->user_model->login($data)){
				roleBasedRedirect();				
			}else{
				redirect('auth/login');
			}

		}

		$data['template']='auth/login';
		$this->load->view('templates/frontend/layout', $data);
	}

	public function logout(){
		_check_user_login();  //check  login authentication
		$this->session->unset_userdata('user_info');
		$this->session->sess_destroy();
		redirect('auth/login');
	}

	public function forgot_password()
	{
		$data['title_top']='Forgot Password';
		
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_error_delimiters('<div class="error text-danger">', '</div>');

		if ($this->form_validation->run() == TRUE){

		$data  = array('email'=>$this->input->post('email'),'password' => sha1($this->input->post('password')),'status'=>1);      
			// if($this->user_model->login($data)){
			// 	roleBasedRedirect();				
			// }else{
			// 	redirect('auth/login');
			// }
		}

		$data['template']='auth/forgot_password';
		$this->load->view('templates/frontend/layout', $data);

	}
	
	public function signup()
	{
		_check_user_login();  //check  login authentication
	
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[con_password]');
		$this->form_validation->set_rules('con_password', 'Confirm Password','required');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required|numeric');
		$this->form_validation->set_rules('zip_code', 'Zip Code', 'required|numeric|max_length[5]');
		$this->form_validation->set_rules('trainer_status', 'Trainer Status', 'required');
		$this->form_validation->set_error_delimiters('<div class="error text-danger">', '</div>');
		if($this->form_validation->run() == TRUE){
			
			$user_data['role'] = 1;				
			$user_data['status'] = 1;
			$user_data['fullName'] = $this->input->post('fullName');				
			$user_data['userName'] = $this->input->post('userName');				
			$user_data['email']   = $this->input->post('email');
			$user_data['password'] = sha1($this->input->post('password'));
			//$user_data['gender'] = $this->input->post('gender');				
			$user_data['created_at'] = date('Y-m-d H:i:s');

			if($user_info_id = $this->user_model->insert('users', $user_data)) {
			
			$user_info = $this->user_model->get_row('users',array('id'=>$user_info_id));
			$secret_key=trim(md5($user_info->email));
			$user_info->email;
			$this->user_model->update('users',array('secret_key'=>$secret_key),array('id'=>$user_info->id));
			
			$this->load->library('developer_email');
			$email_template=$this->developer_email->get_email_template(1);
			$param=array(
				'template'  =>  array(
					'temp'  =>  $email_template->template_body,
					'var_name'  =>  array(
							'fullName'  => $user_info->fullName,
							'site_name'   => SITE_NAME,
							'site_url'    => base_url(),
							'email_address'  => $user_info->email,
							'activation_key'=>base_url('auth/activation/'.$user_info->role.'/'.$secret_key)
							),
							),
					'email' =>  array(
					'to'    =>   $user_info->email,
					'from'  =>   NO_REPLY_EMAIL,
					'from_name' => SITE_NAME,
					'subject' =>   $email_template->template_subject,
					)
				);

				$status=$this->developer_email->send_mail($param);
				if(!empty($status)){
					$this->session->set_flashdata('msg_success', ' Thank you for registering on Tabschool. To activate your account , please check your email.');
					redirect('auth/login');
				} else {
					$this->session->set_flashdata('msg_error', 'Failed, Please try again.');
					redirect('auth/signup');
				}
			}
			  
		}
		$data['template'] = 'auth/signup';
		$this->load->view('templates/frontend/layout', $data);
	
	}

}
