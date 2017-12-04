    <div class="container">       
        <div class="row">           
            <div class="col-md-5 center">
                <div class="login-panel panel panel-default">                  
                   
                    <div class="panel-body ">
                    <form action="" method="post" role="form" >
					<h3>Start Following Teachers</h3>
					<p>For better studies start following your teachers  </p>
                        
					<div class="students">



                        <?php if(!empty($teachers)){  foreach ($teachers as  $value) { ?>  
                            <ul>
                                <li>
                                <?php if (!empty($value->coverImage)){ ?>
                                    <img width="55px" src="<?php echo $value->coverImage; ?>"/>
                                <?php }else{ ?>   
                                    <img width="55px" src="<?php echo base_url('assets/teacher/'); ?>img/grundy.png"/>
                                <?php } ?>
                                </li>
                                <li><h4><?php if (!empty($value->first_name)){  echo ucfirst($value->first_name.''.$value->last_name);  } ?></h4></li>
                                <li class="searchable-container">
                                    <div data-toggle="buttons" class="btn-group bizmoduleselect">
                                        <label class="btn btn-default">
                                            <div class="bizcontent">
                                                <input type="checkbox" name="teacher_id[]" autocomplete="off" value="<?php if (!empty($value->id)){ echo $value->id;  } ?>">
                                                <p><i class="material-icons">add_circle_outline</i></p>
                                                <p><i class="material-icons">check_circle</i></p>
                                            </div>
                                        </label>
                                    </div>
                                </li>
                            </ul>                       
                        <?php } } ?>
					
						
					
					</div>
								 
                                <!-- Change this to a button or input when using this as a form -->
                             
								
                          <button type="submit" class="btn btn-primary btn-block login">Next</button>   
                          </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>