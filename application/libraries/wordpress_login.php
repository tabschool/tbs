<?php 

$Path=FCPATH.'wordpress/wp-load.php';

echo require_once $Path;
exit;
class  Wordpress_login{



	public function CheckLogin()
	{
	    //URL to run: http://anurag-pc/rajeshmuniji/webservices.php?action=login


	    
	    echo   $username ='ritesh';
	    echo  $password = 'ritesh@123';
	    //$remember = $_REQUEST['remember'];
	    die();
	    
	    $creds = array();
	    $creds['user_login']     = $username;
	    $creds['user_password'] = $password;
	    //$creds['remember']     = $remember;    //true or false
	    $creds['remember']         = false;        //true or false
	    
	    $user = wp_signon( $creds, false );
	    $response = "";
	    
	    if(is_wp_error($user))
	    {
	        $response['error'] = "0";
	        $response['data'] = "Invalid Login Credentials";
	    }
	    
	    else
	    {    
	        if($user->roles[0] == 'administrator')
	        {
	            $response['error'] = "1";
	            $response['data'] = "login successful as administrator";
	        }
	        else
	        {
	            $response['error'] = "0";
	            $response['data'] = "User is not administrator";
	        }
	    }
	    echo json_encode($response);
	}

}

?>