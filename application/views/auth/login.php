
    <div class="container">       
        <div class="row">           
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">                  
                   
                    <div class="panel-body">

			<?php echo msg_alert_frontend(); ?>
		
			<?php echo form_open(current_url(),array("role"=>"form")); ?>
		
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Email address" name="email" type="email" autofocus>
			        <?php echo form_error('email');   ?>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
			        <?php echo form_error('password');   ?>
                                </div>								
                                
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-primary btn-block login">Sign In</button>
								  
								 <label>
                                       <a class="reglink forgot_pass" href="<?php echo base_url('forgot-password') ?>">Forgot Password?</a>
                                    </label>
								
                            </fieldset>
		      <?php  echo form_close(); ?>  
                    </div>
                </div>
            </div>
        </div>
    </div>


