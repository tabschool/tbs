
        <div class="row">
            <div class="col-md-12">
                <h3 class="page-title">
                    Admin Profile <small>Update Controls</small>
                </h3>
            
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-user"></i>My Profile
                    </div>
                    <div class="tools">
                        <a href="" class="collapse">
                        </a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form role="form" method="post" action="<?php echo current_url() ?>">

                        <div class="form-body">
                     	<div class="row">
                     		   <div class="col-md-6">

                        	 <div class="form-group">
                                <label class="control-label">First Name</label>
                                <input type="text" placeholder="First Name" class="form-control" name="first_name" value="<?php if (!empty($user->first_name)) echo $user->first_name; ?>"><?php echo form_error('first_name'); ?>
                            </div>

                             <div class="form-group">
                                <label class="control-label">Last Name</label>
                                <input type="text" placeholder="Last Name" class="form-control" name="last_name" value="<?php if (!empty($user->last_name)) echo $user->last_name; ?>"><?php echo form_error('last_name'); ?>
                            </div>
                        	
                        </div>

                         <div class="col-md-6">
            	              <div class="form-group">
            	                    <label class="control-label">Email Address</label>
            	                    <input type="email" placeholder="Email Address" class="form-control" name="email" value="<?php if (!empty($user->email)) echo $user->email; ?>"><?php echo form_error('email'); ?>

            	                </div>
                        	
                        </div> 
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


