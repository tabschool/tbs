 <div class="container">       
        <div class="row">           
            <div class="col-md-5 col-md-offset-3">
                <div class="login-panel panel panel-default">                  
                   
                    <div class="panel-body">

                        <h2> Reset Password </h2>
                        <p>Please enter email address which is associate with us</p>    
                            <?php echo msg_alert_frontend(); ?>

                        <?php echo form_open(current_url(),array("role"=>"form")); ?>
                        <fieldset>
                                    <div class="form-group">
                                    <input class="form-control" placeholder="Please enter your registered email address" name="email" type="email" autofocus>
                                    <?php echo form_error('email');   ?>
                                </div>                                 
                                <!-- Change this to a button or input when using this as a form -->                                
								 <label>

                                    <button type="submit" class="btn btn-primary btn-block  forgot_pass">Re-Set Password Request</button>
                                </label>								
                                <!-- <a href="<?php //echo base_url('auth/login') ?>" class="reglink forgot_pass">Sign In</a>								   -->
                            </fieldset>
                        <?php  echo form_close(); ?>  
                    </div>
                </div>
            </div>
        </div>
    </div>

