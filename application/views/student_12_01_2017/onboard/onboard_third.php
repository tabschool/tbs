<div class="wrap"> 

    <!-- START CONTENT -->	

    <div class="onboard">

    	<div class="row">

        <div class="col s12 m12">

          <div class="card-bg-login">

          	<div class="onboard-wrap">

            <div class="progress-bar-wrap">

          	<div class="progress">

      		<div class="determinate" style="width:62%"></div>

  			</div>

            </div>

            <div class="steps">

            	<ul>

                	  <li class="equal"><div class="cir-seps-brand"></div></li>

                    <li class="equal"><div class="cir-seps-brand"></div></li>

                    <li class="equal"><div class="cir-seps-brand"></div></li>

                    <li class="equal"><div class="cir-seps-grey"></div></li>

                    <li><div class="cir-seps-grey"></div></li>

                </ul>

            </div>

            <h5 style="margin-top:-28px !important;">Tell us your academic details</h5>

            <div class="col s12 m12 l12">

            <?php echo  form_open(current_url(),array('role'=>'form')); ?>

                	<div class="input-field col s12">

                            <?php if(!empty($institueList)) { ?>

    				<select name="institute" id="instituteId">

                                    <option value=""  selected >Institute Name</option>

                                    <?php foreach($institueList as $row){ ?>

                                    <option <?php if($records->parent_id==$row->id){   echo'selected="selected"';  } ?> value="<?php echo $row->id; ?>"><?php echo $row->institute_name; ?></option>

                                    <?php } ?>    

    				</select>

                            <?php } ?>
                            <?php echo form_error('institute') ?>

    				</div>

                    <div class="input-field col s12" id="courceSelectBox">

                        <select name='course' id='courseId'>

                            <option value="" disabled selected>Select Your Course</option>

                              <?php foreach($courceData as $row){ ?>

                                    <option value="<?php echo $row->id; ?>"><?php echo $row->course_name; ?></option>

                                    <?php } ?>

                        </select>

                        <?php echo form_error('course') ?>

    		            </div>

                    <div class="input-field col s12" id="branchSelectBox">

                          <select name='branch'  id='branchId'>

                                  <option value="" disabled selected>Select Your Branch</option>

                          </select>

                          <?php echo form_error('branch') ?>

                    </div>  

                    <div class="input-field col s12" id="semterSelectBox">

                				  <select name='semester' id='semterId'>

                        					<option value="" disabled selected>Select Your Semester</option>

                					</select>
                          
                          <?php echo form_error('semester') ?>

            				</div>

                    <br><br>

                     <a class="waves-effect waves-light btn blue darken-4" href="<?php  echo  base_url('market/onboard_student_second/') ;   ?>">Back</a>

            

                    <button type="submit" class="waves-effect waves-light btn blue darken-4" style="float:right;width: 30%; margin-top: 0px">NEXT</button>

                <?php echo form_close(); ?>

            </div>

            

            </div>

          </div>

        </div>

      </div>

      </div>

  </div>

<script>

    $(document).ready(function (){

        $("#instituteId").on("change",function (){
            var id = $('#instituteId').val();
            var url = base_url+'teacher/onboard/getCourceList';
            $.post(url,{id:id},function (resp,d){ 
                
                var resp = $.parseJSON(resp);

                $("#courceSelectBox").find("#courseId").html('');
                //$("#courceSelectBox").find(".dropdown-content").html('');
                $("#courceSelectBox").find("#courseId").html(resp.main);
                //$("#courceSelectBox").find(".dropdown-content").html(resp.test);          
                $('select').material_select();
            });

        }); 


        $("#courceSelectBox").find('#courseId').on("change",function (){

            var id = $('#instituteId').val();
            var coid = $('#courseId').val();
           


            var url = base_url+'teacher/onboard/getCourceBrachList';

            $.post(url,{id:id,coid:coid},function (resp,d){

                var resp = $.parseJSON(resp);

                $("#branchSelectBox").find("#branchId").html('');
                
                $("#branchSelectBox").find("#branchId").html(resp.main);
               
                $('select').not('.disabled').material_select();

            });

        });

        $("#branchSelectBox").find('#branchId').on("change",function (){

            var id   = $('#instituteId').val();
            
            var coid = $('#courseId').val();
            
            var brid = $('#branchId').val();

            var url = base_url+'teacher/onboard/getCourceBrachSemesterList';

            $.post(url,{id:id,coid:coid,brid:brid},function (resp,d){

                var resp = $.parseJSON(resp);

                $("#semterSelectBox").find("#semterId").html('');
                
                $("#semterSelectBox").find("#semterId").html(resp.main);
               
                $('select').not('.disabled').material_select();

            });

        });

        //$("#courceSelectBox").html("hi");

    });

</script>    