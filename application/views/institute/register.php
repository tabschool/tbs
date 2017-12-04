    <div class="container">       
        <div class="row">           
            <div class="col-md-8 center">
                <div class="login-panel panel panel-default academic">                  
                   
                    <div class="panel-body blue-border first">
				   <h3>Register Institute</h3>
                         <form class="form-container" action="" method="post">
                            <fieldset>

                                <div class="form-group">
                                    <input class="form-control" name="username" placeholder="User Name" value="<?php echo set_value('username'); ?>" type="text" >
                                    <?php echo form_error('username'); ?>
                                </div> 
								
								<div class="form-group">
                                    <input class="form-control" name="phone" value="<?php echo set_value('phone'); ?>" placeholder="Phone" name="text" type="text" autofocus="">
                                    <?php echo form_error('phone'); ?>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" value="<?php echo set_value('password'); ?>" placeholder="Password" name="password" type="password" autofocus="">
                                    <?php echo form_error('password'); ?>
                                </div> 
    
                                <div class="form-group">
                                    <input class="form-control" placeholder="Confirm Password" name="conPassword" type="password" autofocus="">
                                    <?php echo form_error('conPassword'); ?>
                                </div>  
                                
                                <div class="form-group">
                                    <input class="form-control" name="institute_name" value="<?php echo set_value('institute_name'); ?>" placeholder="Institute Name" name="text" type="text" autofocus="">
                                    <?php echo form_error('institute_name'); ?>
                                </div>  
        
                                <div class="form-group">
                                    <input class="form-control" value="<?php echo set_value('email'); ?>"  placeholder="Email" name="email" type="text" autofocus="">
                                    <?php echo form_error('email'); ?>
                                </div>							

                              
                                <input type="submit" class="btn btn-primary btn-block login" name="submit" value="REGISTER">

                            </fieldset>
                        </form>
                </div>
                </div>
            </div>
        </div>
    </div>