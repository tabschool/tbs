<!-- Content Header (Page header) -->
<section class="content-header">
<h3>
<i class="fa fa-book"></i> Add Book   

</h3>
</section>


<div class="portlet-body form">   
 <?php echo form_open_multipart(current_url(),array('class'=>'form-horizontal')); ?> 
    <div class="form-body">
      <div class="form-group"> 
        <div class="col-md-12">   
          <label class="control-label">Book Name</label>
          <input type="text" class="form-control" name="book_name" value="<?php echo set_value('book_name'); ?>">
          <?php echo form_error('book_name'); ?>
        </div>
      </div>                
      <div class="form-group">  
          <div class="col-md-12">  
          <label class="control-label">Author Name</label>  
          <input type="text" class="form-control" name="author_name" value="<?php echo set_value('author_name'); ?>">
          <?php echo form_error('author_name'); ?>                    </div> 
      </div>             
      <div class="form-group">
        <div class="col-md-12">                   
          <label class="control-label">Book Description</label>
            <textarea  class="tinymce_edittor form-control" cols="100" rows="12" name="description"><?php echo set_value('description'); ?></textarea>
            <?php echo form_error('description'); ?>                    
        </div>                
        </div>         
      <div class="form-group">
          <div class="col-md-6">  
              <label class="control-label">Pages</label>      
              <input type="text" class="form-control" name="pages" value="<?php echo set_value('pages'); ?>"><?php echo form_error('pages'); ?>                  
          </div> 
          <div class="col-md-6">  
              <label class="control-label">Price</label>      
              <input type="text" class="form-control" name="price" value="<?php echo set_value('price'); ?>"><?php echo form_error('price'); ?>                  
          </div>
      </div>  
        <div class="form-group">
          <div class="col-md-6">   
            <label class="control-label">Category</label>
            <select class="form-control" name="category">
                  <option value="">-Select Category-</option>
                  <?php if (!empty($category)){  foreach($category as $row) { ?>
                      <option value="<?php echo $row->id; ?>"><?php echo $row->category_name; ?></option>
                  <?php }  } ?>
            </select>
            <?php echo form_error('category'); ?>         
          </div> 
          <div class="col-md-6"> 

                                        <label class="control-label"><strong>Upload Book</strong></label>                                     

                  <input type="file" name="userfile">

                  <?php echo form_error('userfile'); ?>

            </div> 
        </div>        

        <div class="form-group">
          <div class="col-md-6">   
            <label class="control-label">Publisher Name</label>      
            <input type="text" class="form-control" name="publisher_name" value="<?php echo set_value('publisher_name'); ?>"><?php echo form_error('publisher_name'); ?>                  
               
          </div>           

          <div class="col-md-6">   
             <label class="control-label">Published Year</label>      
            <input type="text" class="form-control" name="pub_year" value="<?php echo set_value('pub_year'); ?>"><?php echo form_error('pub_year'); ?>                  
                   
          </div>          
        </div>
        <div class="form-group">
              <div class="col-md-6"> 
                  <label class="control-label"><strong>Status</strong></label>                                     
                <select class="form-control" name="status" id="remote" style="width:100%">
                  <option value="1">Active</option>
                          <option value="0">Deactive</option>
                </select>                                 
                <?php echo form_error('status'); ?>
              </div>
            </div>       
    </div> 
    <div class="form-actions">       
      <button type="submit" class="btn btn-primary">Submit</button> 
      <a href="<?php echo base_url('admin/email_templates'); ?>" ><button class="btn btn-danger" type="button">Cancel</button></a>
    </div>  

</form>    
</div>