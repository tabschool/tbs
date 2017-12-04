

      <div class="row">
      <div class="col-md-12">

	  <?php  echo msg_alert_backend(); ?>
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-user"></i>Setting
                        </div>
                        <div class="tools">
                            <a href="" class="collapse">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
            <?php echo form_open(current_url(),array('id'=>'form_traditional_validation')); ?>
                   <div class="form-body">          
               <?php echo $this->session->flashdata('msg_error');?>
                 
                <?php foreach ($option as $value) { ?>
					<div class="form-group">
						<label class="form-label"><?php echo $value->option_name;?></label> 
						<div class="input-with-icon right">
							<input type="text" placeholder="<?php echo $value->option_name ?>" class="form-control" name="<?php echo $value->option_name ?>" value="<?php echo $value->option_value;?>">
							<?php echo form_error($value->option_name); ?>
						</div>
					</div> 
                <?php } ?>

                <div class="form-actions"> 
                    <div class=" col-md-9">
                        <button class="btn blue" type="submit">Update</button>
                       	<a href="<?php echo base_url()?>backend/dashboard">
                       		<button class="btn default" type="button">Cancel</button>  
                       	</a>                            
                    </div>
                </div>
                </div>
			<?php echo form_close(); ?>
            </div>
                 </div>
                </div>    
        </div>
