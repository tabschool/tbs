<main>

<div class="custom-container">

	   	<div class="card white">

        <div class="card-content black-text">

        	<span class="card-title">Register Institute</span>

                <?php $msg = $this->session->flashdata('message'); 

                    if(isset($msg) && !empty($msg)){

                        echo '<div class="alert-success">'.$msg.'</div>';

                    }

                ?>

                <div class="alert-success"><?php echo empty($message) ? "":$message; ?></div>

                <form class="form-container" action="" method="post">

            

            	<div class="otp center-align">

            	<p class="center">ENTER OTP</p>

            	<div class="input-field col center-align">

                    <input id="otp_token" name="otp_token" type="text" class="validate center">

                    <!-- <label for="otp_token">6 DIGIT OTP</label> -->

                    <div class="error"><?php echo form_error('otp_token'); ?></div>

                </div>

                <a class="waves-effect waves-teal btn-flat" href="<?php echo base_url().'resendOTP'; ?>">RESEND OTP</a> 

                           

            </div> 

            <div class="center-align margins">        

<!--                <button class="waves-effect waves-light btn blue darken-4" href="plans.html">Submit</buttoon>  -->

            <button class="waves-effect waves-light btn blue darken-4">Submit</button>  

            </div>

        </form>

        </div>

    </div>

</div>

</main>