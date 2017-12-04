
<!-- Content Header (Page header) -->
<section class="content-header">
  <h3>
    <i class="fa fa-users"></i> Category
    <small><a href="<?php echo base_url('admin/category/add') ?>" class="btn btn-success">Add New <i class="fa fa-plus"></i> </a></small>
  </h3>
</section>

<div class="box table-responsive0">
    <table class="table table-bordered table-hover">
   <thead>
                <tr>
                  <th>#</th>
                  <th>Category Name</th>
                  <th>Slug</th>
                  <th class="hidden-phone">Created</th>
                  <th class="hidden-phone">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php if(!empty($categories)):
                   $i=$offset;
                foreach($categories as $value){ $i++; ?>
                <tr class="gradeX">
                    <td><?php echo $i."." ;?></td>
                    <td class=""><?php echo $value->category_name; ?></td>
                    <td class="to_hide_phone"><?php echo $value->slug; ?></td> 
                    <td class="to_hide_phone"><?php if($value->status){ echo 'Active'; }else{  echo 'Inactive'; } ?></td> 

                    <td><?php echo date('d-m-Y',strtotime($value->created_at)); ?></td>
                    <td class="ms">
                      <div class="btn-group"> 
                        <a href="<?php echo base_url().'admin/category/edit/'.$value->id ?>" class="btn btn-success btn-xs" ><i class="fa fa-pencil-square-o"></i></a> 
                        <i></i>
                        <a href="<?php echo base_url().'admin/category/delete/'.$value->id ?>" class="btn btn-danger btn-xs"  onclick="if(confirm('Are you sure you want to delete?')){return true;} else {return false;}" > <i class="fa fa-trash-o"></i></a> 
                      </div>
                    </td>
                </tr>
                 <?php } ?>
                <?php else: ?>
                  <tr>
                    <th colspan="5"> <center>No Categories found.</center></th>
                  </tr>
                <?php endif; ?>
                </tbody>
          </table>          
    </table>
  <div class="text-right"> <?php if (!empty($pagination)) echo $pagination; ?></div>

</div>


