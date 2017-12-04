	
    <div class="container">       
        <div class="row">           
            <div class="col-md-8 center">
                <div class="login-panel panel panel-default academic">                  
                   
                    <div class="panel-body blue-border">
				   <h3>Register Institute</h3>
                   <?php $msg = $this->session->flashdata('message'); 

                    if(isset($msg) && !empty($msg)){

                        echo '<div class="alert-success">'.$msg.'</div>';

                    }

                ?>
                 <div class="alert-success"><?php echo empty($message) ? "":$message; ?></div>
				   <div class="col-md-4 col-md-offset-4 otp">
				   <p>Enter OTP</p>
                   
                        <form class="form-container" action="" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="------"  id="otp_token" name="otp_token" type="text" autofocus="">
                                    <?php echo form_error('otp_token'); ?>
                                </div> 		
                                <p><a href="#">RESEND OTP</a></p>								
                                
                                <!-- Change this to a button or input when using this as a form -->
                                <!-- <a href="#" class="btn btn-primary btn-block login">SUBMIT</a> -->
								<button class="btn btn-primary btn-block login">Submit</button>
                            </fieldset>
                        </form>
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>