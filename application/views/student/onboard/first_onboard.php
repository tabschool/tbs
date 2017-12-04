 <div class="container">       
        <div class="row">           
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">                  
                   
                    <div class="panel-body">
                                   <form  action="" method="post" enctype="multipart/form-data">

                            <fieldset>
                            <!-- <h4>OnBord First</h4> -->
                            <div class="row">
                                <div class="col-md-12 text-center">
                                <div class="img-circle">
                                <?php if (!empty($records->coverImage)){ ?>
                                    <img id="image_upload_preview" width="150px" src="<?php echo $records->coverImage; ?>" alt="..." >
                                    
                                <?php }else{ ?>
                                    <img id="image_upload_preview"  width="150px" src="<?php echo base_url('assets/mainfront/'); ?>img/user.png" alt="..." class="img-circle">
                                <?php } ?>
                                </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <div class="file-upload fb">
                                        <label for="upload" class="file-upload__label">UPLOAD</label>
                                        <input id="upload" name="userfile" class="file-upload__input" type="file">
                                    </div>
                                </div>
                            </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="First Name" value="<?php  if(!empty($records->first_name))  echo $records->first_name; ?>"  name="first_name" type="text" autofocus>
                                      <span class="form_error"><?php echo form_error('first_name'); ?></span>
                                </div>  
                                <div class="form-group">
                                    <input class="form-control" placeholder="Last Name" value="<?php  if(!empty($records->last_name))  echo $records->last_name; ?>" name="last_name" type="text" autofocus>
                                      <span class="form_error"><?php echo form_error('last_name'); ?></span>
                                </div>
                                 <div class="form-group">
                                    <input class="form-control"  value="<?php if(!empty($records->email)){ echo $records->email;  } ?>" readonly placeholder="Email" name="email" type="email" autofocus>
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