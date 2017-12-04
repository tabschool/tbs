 <div class="container">       
        <div class="row">           
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">                  
                   
                    <div class="panel-body">
                         <form  action="" method="post" enctype="multipart/form-data">

                            <fieldset>
                            <!-- <h4>OnBord First</h4> -->
                           
							  
								<h3> Confirm few details for us!! </h3>
								<div class="form-group">
                                   <input class="form-control" type="text" name="birthday"  value="<?php  if(!empty($records->birthday))  echo $records->birthday; ?>" id="birthday" placeholder="Date Of Birth"/>
                                   <?php echo form_error('birthday'); ?>
                                </div>
								<div class="form-group">
                                    <select name="sex" class="form-control" id="sel1">
										<option  value="" >Gender</option>
										<option <?php if($records->sex == 'male') echo 'selected="selected"'; ?> value="male" >Male</option>
										<option <?php if($records->sex == 'female') echo 'selected="selected"'; ?> value="female">Female</option>
									</select>
                                      <?php echo form_error('birthday'); ?>
                                </div>

                                  <div class="form-group">
                                    <input class="form-control" placeholder="Password"   name="password" type="password" autofocus>
                                      <span class="form_error"><?php echo form_error('password'); ?></span>
                                </div>  
                                <div class="form-group">
                                    <input class="form-control" placeholder="Confirm Password"  name="cpassword" type="password" autofocus>
                                      <span class="form_error"><?php echo form_error('cpassword'); ?></span>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <!-- <a href="#" class="btn btn-primary btn-block login">Next</a> -->
                                <button type="submit" class="btn btn-primary btn-block login">Next</button>
                                <p></p>
                                <p></p>
                                <p></p>
								<p></p>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>