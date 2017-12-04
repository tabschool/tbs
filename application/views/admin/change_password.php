        <div class="row">
            <div class="col-md-12">
               <h3 class="page-title">
                   Update Admin Password  <small>Update Controls</small>
                    </h3>
            <?php  echo msg_alert_backend(); ?>
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-user"></i>Change Password
                        </div>
                        <div class="tools">
                            <a href="" class="collapse">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form role="form" method="post" action="<?php echo current_url() ?>">

                            <div class="form-body">

                                <div class="form-group">
                                    <label class="control-label">Old Password</label>
                                    <input type="password" placeholder="Old Password" class="form-control" name="oldpassword" value=""><?php echo form_error('oldpassword'); ?>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">New Password</label>
                                    <input type="password" placeholder="New Password" class="form-control" name="newpassword" value=""><?php echo form_error('newpassword'); ?>
                                </div>


                                <div class="form-group">
                                    <label class="control-label">Confirm Password</label>

                                    <input type="password" placeholder="Confirm Password" class="form-control" name="confpassword" value=""><?php echo form_error('confpassword'); ?>

                                </div>

                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn blue">Submit</button>
                                <a href="<?php echo base_url() ?>backend/dashboard" class="btn btn-danger">Cancel </a>
                            </div>
                        </form>
                    </div>
                </div>    
        </div>
    </div>     
    <!-- END CONTENT