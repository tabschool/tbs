  <div class="wrap"> 

    <!-- START CONTENT -->	

    <div class="onboard">

    	<div class="row">

        <div class="col s12 m12">

          <div class="card-bg-login">

          	<div class="onboard-wrap">

            <div class="progress-bar-wrap">

          	<div class="progress">

      		<div class="determinate" style="width:86%"></div>

  			</div>

            </div>

            <div class="steps">

            	<ul>

                	<li class="equal"><div class="cir-seps-brand"></div></li>

                    <li class="equal"><div class="cir-seps-brand"></div></li>

                    <li class="equal"><div class="cir-seps-brand"></div></li>

                    <li class="equal"><div class="cir-seps-brand"></div></li>

                    <li><div class="cir-seps-grey"></div></li>

                </ul>

            </div>

            <h5 style="margin-top:-28px !important;">Follow your faculty</h5>

            <div id="message" class="alert alert-success"></div>

            <?php if(isset($teacherList) && !empty($teacherList)){

                $count=1;

                foreach($teacherList as $row){

                    if ($count%3 == 1)

                    {  

                         echo "<div class='row'>";

                    }

            ?>

                <div class="col s4 m4 l4">

            	  <div class="follow">

                    <div class="follow-pic"></div>

                    <div class="follow-name">

                        <?php echo $row->first_name.''.$row->last_name; ?>

                        <br><br>
                        <?php $follower = get_foller_teacher($user_info->id,$row->id);   ?>

                        <a href="javascript:;" class="followBtn" data-followid="<?php echo $user_info->id; ?>" id="<?php echo $row->id; ?>"><?php echo empty($follower) ? '+Follow':'Unfollow'; ?></a>

                    </div>

                  </div>

                </div>

            <?php

                    if ($count%3 == 0)

                    {

                        echo "</div>";

                    }

                    $count++;

                }

                if ($count%3 != 1) echo "</div>";

            }

            else

            {

                echo "Teachers not available for selected institue.";

            }

            ?>

            <div style="clear: both"></div>

            

            <a class="waves-effect waves-light btn blue darken-4" href="<?php  echo  base_url('market/onboard_student_third/') ;   ?>">Back</a>

            

             <a class="waves-effect waves-light btn blue darken-4" style="float:right" href="<?php  echo  base_url('market/onboard_student_fifth/') ;   ?>">NEXT</a>

            </div>

          </div>

        </div>

      </div>

  		

      </div>

    

  </div>



<script>

    $(document).ready(function (){

        $(".followBtn").on("click",function (){

            var id = $(this).attr('id');

            var follow_id = $(this).data('followid');

            var text = $(this).text();

            if(text == 'Unfollow'){

                var url = '<?php echo base_url().'market/delete_follow_to_teacher'; ?>';

                $.post(url,{follow_id:follow_id},function (){

                    $("#"+id).text('+follow');

                    $("#message").text("You have Unfollowed successfully.");

                });

            }

            else

            {

                var url = '<?php echo base_url().'market/follow_to_teacher'; ?>';

                $.post(url,{follow_to:id},function (){

                    $("#"+id).text('Unfollow');

                    $("#message").text("You have followed successfully.");

                });

            }

        });

    });

    </script>