<div class="wrap"> 

    <!-- START CONTENT -->	

    <div class="onboard">

    	<div class="row">

        <div class="col s12 m12">

          <div class="card-bg-login">

          	<div class="onboard-wrap">

            <div class="progress-bar-wrap">

          	<div class="progress">

      		<div class="determinate" style="width: 12%"></div>

  			</div>

            </div>

            <div class="steps">

            	<ul>

                	<li class="equal"><div class="cir-seps-brand"></div></li>

                    <li class="equal"><div class="cir-seps-grey"></div></li>

                    <li class="equal"><div class="cir-seps-grey"></div></li>

                    <li class="equal"><div class="cir-seps-grey"></div></li>

                    <li><div class="cir-seps-grey"></div></li>

                </ul>

            </div>

            <h5 style="margin-top:-28px !important;">Getting Started!</h5>

            <form class="col s12 m12 l12" action="" method="post" enctype="multipart/form-data">

            <div class="col s4 m4 l4">

                <div><img class="prof-pic" id="previewHolder" src="<?php echo empty($records->coverImage) ? "": $records->coverImage; ?>"/></div>



                <button type="button" class="uploadImage"> Upload Photo</button>

                <input type="file" style="display:none" name="userfile" value="" id="filePhoto" class="required borrowerImageFile" data-errormsg="PhotoUploadErrorMsg">



            </div>

            <div class="col s8 m8 l8" style="float:right !important;">

                

                <div class="input-field col s12">

          			<input id="first_name" type="text" name="first_name" value="<?php  if(!empty($records->first_name))  echo $records->first_name; ?>" class="validate">

          			<label for="first_name"  <?php  if(!empty($records->first_name))  echo 'class="active"'; ?>>First Name</label>

                                <span class="form_error"><?php echo form_error('first_name'); ?></span>

        		    </div>

                <div class="input-field col s12">

          			<input id="last_name" type="text" name="last_name" value="<?php  if(!empty($records->last_name))  echo $records->last_name; ?>" class="validate">

          			<label for="last_name" <?php  if(!empty($records->last_name))  echo 'class="active"'; ?>>Last Name</label>

                                <span class="form_error"><?php echo form_error('last_name'); ?></span>

        		    </div>

                <div class="input-field col s12">

          			<input id="email" type="email" readonly value="<?php  if(!empty($records->email))  echo $records->email; ?>" class="validate">

          			<label for="email" <?php  if(!empty($records->email))  echo 'class="active"'; ?>>Email</label>

        		     </div>

                

                    <button type="submit" class="waves-effect waves-light btn blue darken-4" style="float:right; width: 23%">Next</button>

                

            </div>

            </form>

            </div>

          </div>

        </div>

      </div>

  		

      </div>

    

  </div>



<script type="text/javascript">

	

function readURL(input) {

  if (input.files && input.files[0]) {

    var reader = new FileReader();

    reader.onload = function(e) {

      $('#previewHolder').attr('src', e.target.result);

    }



    reader.readAsDataURL(input.files[0]);

  }

}



$("#filePhoto").change(function() {

  readURL(this);

});



$(".uploadImage").click(function(){

    $("#filePhoto").trigger("click");

});

</script>    