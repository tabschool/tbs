<main>

<div class="custom-container">

	   	<div class="card white">
     
     <?php echo msg_alert_backend(); ?>

        <div class="card-content black-text">

            <span class="card-title">Yay!!</span>

            <h6>Thanks for choosing the plan that fits your needs. Now Start Adding Students!!</h6>


            <section>

            <h6 class="margins">STUDENT BULK UPLOAD</h6>

            <a class="waves-effect waves-light btn blue darken-4 margin-bottom" href="<?php echo base_url().'Signup/download'; ?>">DOWNLOAD</a>

            <p>To Upload bulk users download the CSV format and fill the details of students accordingly. <br>CSV files are opened in Microsoft Excel</p><p>Once you have populated CSV with relevent information, upload it using the the button below</p>

            

            <div class="file-field input-field">

                <form id="uploadfile" class="form-container" method="post" action="<?php echo current_url(); ?>" enctype="multipart/form-data">

                    <div class="btn blue darken-4">

                        <span>Upload</span>

                        <input id="input-id" type="file" name="import_csv" >

                        <input type="hidden" name="upload_type" value="0">

                    </div>

                </form>

             <div class="file-path-wrapper">

        <input class="file-path validate" type="text">

      </div>

      </div></section>

      <section class="margins">

      <h6>MANUAL UPLOAD</h6>

      <p>Click below for the manul upload. <br>You have to put information manually

</p>

	<a class="waves-effect waves-light btn blue darken-4 margin-bottom" href="<?php echo base_url('Signup/add_students')   ?>">MANUAL UPLOAD</a>

      </section>

      <section class="margins">

      <h6>STILL CONFUSED???</h6>

      <p>We are always at your desposal to help you out. If you need any assistance contact us </p>

      </section>

      <a class="waves-effect waves-light btn blue darken-4 margin-bottom" href="http://www.tabschool.in/welcome/requestademo">Contact Us</a>

            

        </div>

    </div>

</div>

</main>

<script>

    $(document).ready(function (){

        $("#input-id").on("change",function (){

            $("#uploadfile").submit();

        });

    });

</script>