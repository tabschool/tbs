<main>

<div class="custom-container">

	   	<div class="card white">

        <div class="card-content black-text">

        	<span class="card-title">Great!!</span>

            <h6>Now that you have brought all your students onboard now its time to bring<br> teachers online in a similiar manner</h6>

            <section>

            <h6 class="margins">TEACHER BULK UPLOAD</h6>

            <a class="waves-effect waves-light btn blue darken-4 margin-bottom">DOWNLOAD</a>

            <p>To Upload bulk users download the CSV format and fill the details of students accordingly. <br>CSV files are opened in Microsoft Excel</p><p>Once you have populated CSV with relevent information, upload it using the the button below</p>

            <div class="file-field input-field">

      			<form id="uploadfile" class="form-container" method="post" action="<?php echo current_url(); ?>" enctype="multipart/form-data">

                            <div class="btn blue darken-4">

                                <span>Upload</span>

                                <input id="input-id" type="file" name="import_csv" multiple>

                                <input type="hidden" name="upload_type" value="1">

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

	<a class="waves-effect waves-light btn blue darken-4 margin-bottom" href="<?php  echo base_url('Signup/add_teachers/')?>">MANUAL UPLOAD</a>

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

