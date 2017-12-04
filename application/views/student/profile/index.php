          <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header"></h1>
                </div>
                <!--End Page Header -->
            </div>

            <div class="row"> 
			<div id="main_profile" class="col-lg-12 banner">
			<div class="profile">
			<p>
				<?php if(!empty(get_user_Image_info())){ ?>
            <img  src="<?php echo get_user_Image_info(); ?>" alt="">
        <?php }else{ ?>
            <img  src="<?php echo base_url('assets/frontend/'); ?>img/default-profile-pic.png" alt="">
        <?php } ?>
			</p>
			<p>
			<i class="material-icons btn fix"><a data-toggle="modal" data-target=".bs-example-modal-sm">camera_alt</a></i>
			<b><?php echo ucfirst(get_student_name()); ?></b>
			<span><?php echo get_course_name($user_info->course_id); ?><br/> <?php echo get_institute_name($user_info->parent_id); ?></span>
			 <?php if(!empty($user_info->qoute)){ echo $user_info->qoute; }else{ echo 'Hey!! Welcome to Tabschool, Tell something about yourself to your friends, colleagues or teachers. If not, write a motto to inspire others..'; } ?></p>
      
			</div>
			<i class="material-icons"><a data-toggle="modal" data-target=".bs-example-modal-lg">edit</a></i>
			</div>
			
			<div class="col-lg-12 banner-bottom">
			<ul>
			<li><h5>Settings</h5></li>
			
			</ul>
			</div>
			
			<div class="col-lg-12 settings-intro">
                <div class="row">
                <form role="form">
                <div class="col-lg-4">
                   <div class="form-group">
                        <label for="textarea">Your Bio</label>
                        <textarea id="your_qoute" rows="3" ></textarea>
                        <span class="error" id="qoute_error" maxlength="140"></span>
                    </div>
                    <button type="button" id="save_qoute" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-lg-4">
                    <div class="form-group row">
                        <label for="change_password">Change Password</label>
                        <p><input class="form-control" type="password" id="old_password"  placeholder="Current Password"></p>
                    	<span class="error" id="old_password_error"></span>
                    </div> 
                    <div class="form-group">
                        <p><input class="form-control" type="password" id="new_password" placeholder="Password"></p>*Your Password must be of six characters
                    	<span class="error" id="new_password_error"></span>
                    </div>
                    <div class="form-group">
                        <p><input class="form-control" type="password" id="confirm_password" placeholder="Retype Password"></p>
                    	<span class="error" id="confirm_password_error"></span>
                    </div>
                    <button type="button" id="change_password"  class="btn btn-primary">Submit</button>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                    <label for="change_email">Change Email</label>
                       <p><input class="form-control" id="old_email" readonly class="form-control-plaintext" id="staticEmail" value="<?php if(!empty($user_info->email)) echo $user_info->email; ?>"></p>
                       <span class="error" id="old_email_error"></span>
                    </div> 
                    <div class="form-group">
                        <p><input class="form-control" id="new_email" type="email" placeholder="New Email"></p>
                        <span class="error" id="user_email_error"></span>
                    </div>
                    <div class="form-group">
                        <p><input class="form-control" id="confirm_email" type="email" placeholder="Retype Email"></p>
                    	 <span class="error" id="confirm_email_error"></span>
                    </div>
                    <button type="button" id="change_email" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
            <div class="row">
            <hr>
            
            <div class="col-lg-6"> 
            <h4>Privacy Settings</h4>
            <div class="row"> 
            <div class="col-lg-8"><p><i class="material-icons">school</i> <?php echo get_course_name($user_info->course_id); ?> <br/><?php echo get_institute_name($user_info->parent_id); ?></p></div>
            <div class="col-lg-4 text-right">
                <form>
                <div class="form-group svdf">
                <input type="checkbox" id="course_view"  class="btn btn-success"  <?php if(!empty($user_info->course_view)):  ?>  checked <?php endif; ?>  data-toggle="toggle" data-style="ios"/>
                </div>
                </form>                
            </div> 			
            </div>
            <div class="row">
                <div class="col-lg-8"><p><i class="material-icons">cake</i><?php if(!empty($user_info->birthday)) echo  date('d M Y',strtotime($user_info->birthday)); ?></p></div>
                <div class="col-lg-4 text-right"><form>
                <div class="form-group svdf">
                <input type="checkbox" id="birthday_view" class="btn btn-success" <?php if(!empty($user_info->birthday_view)):  ?>  checked <?php endif; ?> data-toggle="toggle" data-style="ios"/>
                </div>
                </form></div>
            </div>
            <div class="row">
                <div class="col-lg-8"><p><i class="material-icons">person_outline</i><?php if(!empty($user_info->sex)) echo ucfirst($user_info->sex); ?></p></div>
                <div class="col-lg-4 text-right"><form>
                <div class="form-group svdf">
                <input type="checkbox" id="gender_view" class="btn btn-success" <?php if(!empty($user_info->gender_view)):  ?>  checked <?php endif; ?> data-toggle="toggle" data-style="ios"/>
                </div>
                </form></div>
            </div>
            <div class="row">
                <div class="col-lg-8"><p><i class="material-icons">place</i> Chandigarh, Chandigarh</p></div>
                <div class="col-lg-4 text-right"><form>
                <div class="form-group svdf">
                <input type="checkbox" id="city_view" class="btn btn-success" <?php if(!empty($user_info->city_view)):  ?>  checked <?php endif; ?> data-toggle="toggle" data-style="ios"/>
                </div>
                </form></div>
            </div>
            <div class="row">
                <div class="col-lg-8"><p><i class="material-icons">location_city</i><?php if(!empty($user_info->address)) echo ucfirst($user_info->address); ?><br/><?php if(!empty($user_info->city)) echo ucfirst($user_info->city); ?></p></div>
                <div class="col-lg-4 text-right"><form>
                <div class="form-group svdf">
                <input type="checkbox" id="address_view" class="btn btn-success" <?php if(!empty($user_info->address_view)):  ?>  checked <?php endif; ?>  data-toggle="toggle" data-style="ios"/>
                </div>
                </form></div>
            </div>
            <div class="row">
                <div class="col-lg-8"><p><i class="material-icons">child_care</i> Father's Name : <?php if(!empty($user_info->fatherName)) echo ucfirst($user_info->fatherName); ?> <br/>Mother's Name : <?php if(!empty($user_info->motherName)) echo ucfirst($user_info->motherName); ?></p></div>
                <div class="col-lg-4 text-right"><form>
                <div class="form-group svdf">
                <input type="checkbox" id="parents_view" class="btn btn-success" <?php if(!empty($user_info->parents_view)):  ?>  checked <?php endif; ?> data-toggle="toggle" data-style="ios"/>
                </div>
                </form></div>
            </div>

			
			
			</div>
			
				<div class="col-lg-6"> 
        	<!--
			<h4>Payment</h4>
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Collapsible Group Item #1
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <table class="table">
		<thead>
			<tr>
			<td>Sr.No</td>
			<td>Course Name</td>
			<td>Amount</td>	
			</tr>
		</thead>
		<tbody>
			<tr>
			<td>1</td>
			<td>Learning Web Development Using PHP</td>
			<td>4400.00</td>	
			</tr>
		</tbody>
 
		</table>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Collapsible Group Item #2
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Collapsible Group Item #3
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
</div>	
        </div>

        </div>
        </div>
                       
        <!-- end page-wrapper -->


    <!-- end wrapper -->
    <!--Profile Pic Modal -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Change Personality</h4>
      </div>
       <div class="modal-body center-align">
        <div class="dropzone"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Change Cover Photo</h4>
      </div>
      <div class="modal-body center-align">
        <div class="dropzone2"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
