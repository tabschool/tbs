  <div class="container">       
        <div class="row"> 
            <div class="col-md-8 center">
        <?php echo msg_alert_backend(); ?>          
                <div class="login-panel panel panel-default academic upload">                  
                   
                    <div class="panel-body blue-border first">

				    <h3> Congralutions!! You have bought 2000 Connects </h3>
				   
				    <p><span> TEACHER BULK UPLOAD </span></p>
				    
				    <p><a href="<?php echo base_url().'Signup/teacher_download'; ?>" class="btn btn-primary btn-block login">DOWNLOAD</a></p>
				   
				    <p>To Upload bulk users download the CSV format and fill the details of Teacher accordingly. CSV files are opened in Microsoft Excel </p>

				    <p>Once you have populated CSV with relevent information, upload it using the the button below</p>
				    <form id="uploadfile" class="form-container" method="post" action="<?php echo current_url(); ?>" enctype="multipart/form-data">
					    <div class="file-upload fb">
						    <label for="upload" class="file-upload__label">UPLOAD</label>
						    <input id="upload" name="import_csv" class="file-upload__input" type="file">
						</div>
                    </form>
				   <br/>
				   <p><span>TEACHER MANUAL UPLOAD</span></p>
				   <p>Click below for the manul upload<br/>
					You have to put information manually</p>
				    <div class="file-upload fb">
					    <!-- <label for="upload" ></label>
					    <input id="upload" class="file-upload__input" type="file" name="file-upload"> -->
					    <a href="<?php  echo base_url('Signup/add_teachers/')?>" class="btn btn-primary btn-block login" title="">MANUAL UPLOAD</a>
					</div>
				    <p><span>STILL CONFUSED???</span></p>
				    <p>We are always at your desposal to help you out. If you need any assistance contact us </p>
				    <p><a href="#" class="btn btn-primary btn-block login">CONTACT US</a></p>

                </div>
                </div>
            </div>
        </div>
    </div>