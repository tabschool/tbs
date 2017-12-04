<!-- Content Header (Page header) -->
<section class="content-header">
<h3>
<i class="fa fa-envelope-o"></i> Edit Email Template       

</h3>
</section>

    <div class="portlet-body form">
            <form role="form" method="post" action="<?php echo current_url() ?>" class="form-horizontal">  
<div class="form-body">     

   
<div class="form-group">      
<div class="col-md-12">     
<label class="control-label">Template Name</label>   
<input type="text" class="form-control" name="name" value="<?php if (!empty($email_template->template_name)) echo $email_template->template_name; ?>"><?php echo form_error('name'); ?>    
</div>    
</div>        
<div class="form-group">      
<div class="col-md-12">           
<label class="control-label">Template Subject</label>
<input type="text" class="form-control" name="subject" value="<?php if (!empty($email_template->template_subject)) echo $email_template->template_subject; ?>"><?php echo form_error('subject'); ?>  
</div>        
</div>    
<div class="form-group">     
<div class="col-md-12">     
<label class="control-label">Template Body</label>   
<textarea  class="tinymce_edittor form-control" cols="100" rows="12" name="body"><?php if (!empty($email_template->template_body)) echo $email_template->template_body; ?></textarea><?php echo form_error('body'); ?>  
</div>

</div>   
  <div class="form-group">       
                   <div class="col-md-12">          
                                 <label class="control-label">Template Subject Admin</label>     
<input type="text" class="form-control" name="template_subject_admin" value="<?php if (!empty($email_template->template_subject_admin)) echo $email_template->template_subject_admin;                            else echo set_value('template_subject_admin');                            ?>">

<?php echo form_error('template_subject_admin'); ?>

                </div>                    
</div>                 
<div class="form-group">
                   <div class="col-md-12">

<label class="control-label">Template Body Admin</label>                           
 <textarea  class="tinymce_edittor form-control" cols="100" rows="12" name="template_body_admin"><?php if (!empty($email_template->template_body_admin)) echo $email_template->template_body_admin; else echo set_value('template_body_admin');                                ?></textarea>
 <?php echo form_error('template_body_admin'); ?>                    
     </div>     
                    </div>     
                               </div>  
<div class="form-actions">                
<button type="submit" class="btn btn-primary">Submit</button>   
<a href="<?php echo base_url('admin/email_templates'); ?>" >
<button class="btn btn-danger" type="button">Cancel</button>
</a>                </div>     
</form>  
</div>