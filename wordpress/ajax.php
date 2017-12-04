<?php 

    require_once('wp-load.php');

    if(isset($_POST)){

        $username =$_POST['username'];
        $password = $_POST ['password'];
       
        
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


?>