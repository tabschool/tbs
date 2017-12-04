<!-- Content Header (Page header) -->
<section class="content-header">
	<h3>
	    <i class="fa fa-envelope-o"></i> Edit Category
	</h3>
</section>

<div class="portlet-body form">   
       <?php echo form_open_multipart(current_url(),array('class'=>'form-horizontal')); ?>	
<div class="form-body">
		<div class="form-group">
							<div class="col-md-12"> 
			                <label class="control-label"><strong>Category Name</strong></label>                                     
							<input type="text" placeholder="Category Name" class="form-control" name="category_name" value="<?php if(!empty($category->category_name)) echo $category->category_name;?>">
							<?php echo form_error('category_name'); ?>
			            	</div> 
			            </div> 
			          
        			    <div class="form-group">
							<div class="col-md-12"> 
				                <label class="control-label"><strong>Category Description</strong></label>                                     
								<textarea class="form-control" name="category_description" ><?php if(!empty($category->category_description)) echo $category->category_description; ?></textarea>
								<?php echo form_error('category_description'); ?>
			            	</div> 
			            </div> 
          			
            
			            <div class="form-group">
							<div class="col-md-12">
			                <label class="control-label"><strong>Status</strong></label>							                                     
							<select class="form-control" name="status" id="remote" style="width:100%">
								<option value="1" <?php if($category->status==1) echo 'selected="selected"'; ?>>Active</option>
		              			<option value="0" <?php if($category->status==0) echo 'selected="selected"'; ?>>Deactive</option>
							</select>                                 
							<?php echo form_error('status'); ?>
			            </div>
		</div> 
		<div class="form-actions">       
			<button type="submit" class="btn blue">Submit</button> 
			<a href="<?php echo base_url('backend/categories/'); ?>" ><button class="btn btn-danger" type="button">Cancel</button></a>
		</div>  
	<?php echo form_close(); ?>
</div>