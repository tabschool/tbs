<div class="wrap"> 

    <!-- START CONTENT -->	

    <div class="onboard">

    	<div class="row">

        <div class="col s12 m12">

          <div class="card-bg-login">

          	<div class="onboard-wrap">

            <div class="progress-bar-wrap">

          	<div class="progress">

      		<div class="determinate" style="width:37%"></div>

  			</div>

            </div>

            <div class="steps">

            	  <ul>

                

                    <li class="equal"><div class="cir-seps-brand"></div></li>

                    <li class="equal"><div class="cir-seps-brand"></div></li>

                    <li class="equal"><div class="cir-seps-grey"></div></li>

                    <li class="equal"><div class="cir-seps-grey"></div></li>

                    <li><div class="cir-seps-grey"></div></li> 



                </ul>

            </div>

            <h5 style="margin-top:-28px !important;">Tell us more about yourself!</h5>

            <form class="col s12 m12 l12" action="" method="post">

            <div class="col s6 m6 l6">

            	

                <div class="input-field col s12">

                    <input type="text" name="birthday"   value="<?php  if(!empty($records->birthday))  echo $records->birthday; ?>"  class="datepicker" required>

                    <label for="birthdate"  <?php  if(!empty($records->birthday))  echo 'class="active"'; ?> >Birthdate</label>

                    <span class="form_error"><?php echo form_error('birthday'); ?></span>

                </div>

                 <div class="col s3 m3 l3"><p style="margin-top:64%">Gender</p></div>

                 <div class="col s3 m3 l3"><p style="margin-top:64%">

                 	<input name="sex" type="radio" id="test1" value="male" <?php if($records->sex == 'male') echo 'checked'; ?>/>

      				<label for="test1">Male</label></p>

                     

                 </div>

                 <div class="col s3 m3 l3"><p style="margin-top:64%">

                 	<input name="sex" type="radio" id="test2" value="female" <?php if($records->sex == 'female') echo 'checked'; ?>/>

      				<label for="test2">Female</label></p>

                 </div>

                 <span class="form_error"><?php echo form_error('sex'); ?></span>

                

                <a class="waves-effect waves-light btn blue darken-4" style="margin-top: 15px" href="<?php  echo  base_url('market/onboard_student_first/') ;   ?>">Back</a>

                

            </div>

            <div class="col s6 m6 l6" style="float:right !important;">

            	

                <div class="input-field col s12">

          			<input id="password" type="password" name="password" class="validate">

          			<label for="password">Password</label>

                                <span class="form_error"><?php echo form_error('password'); ?></span>

        		</div>

                <div class="input-field col s12">

          			<input id="cpassword" type="password" name="cpassword" class="validate">

          			<label for="cpassword">Confirm Password</label>

                                <span class="form_error"><?php echo form_error('cpassword'); ?></span>

        		</div>

                

                <button type="submit" class="waves-effect waves-light btn blue darken-4" style="float:right;width: 30%; margin-top: 0px">NEXT</button>

                

            </div>

                </form>

            </div>

          </div>

        </div>

      </div>

  		

      </div>

    

  </div>