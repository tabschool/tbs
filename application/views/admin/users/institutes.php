
<!-- Content Header (Page header) -->
<section class="content-header">
<h3>
<i class="fa fa-users"></i> Institutes

</h3>


          
</section>
  <?php
        if(!empty($_SERVER['QUERY_STRING']))
            $QUERY_STRING = "0?".$_SERVER['QUERY_STRING'];
        else
            $QUERY_STRING ='';
      ?>

<div class="box table-responsive0">
 <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">  Institute List </h3>
    </div><!-- /.box-header -->
    <div class="box-body">
		<div class="pull-right">
		    <form class="form-inline" action="<?php echo base_url('admin/users/institutes/id/desc') ?>">
		      <div class="box-body">
		        <div class="form-group">
		          <!-- <label for="exampleInputEmail1">Email address</label> -->
		          <input type="text" class="form-control" id="institute_name" name="institute_name"  placeholder="Institute Name" value="<?php if(!empty($_GET['institute_name'])) echo $_GET['institute_name'] ?>">
		        </div>
		        <div class="form-group">
		          <!-- <label for="exampleInputEmail1">Email address</label> -->
		          <input type="text" class="form-control" id="first_name" name="first_name"  placeholder="First Name" value="<?php if(!empty($_GET['first_name'])) echo $_GET['first_name'] ?>">
		        </div> 
		        <div class="form-group">
		          <!-- <label for="exampleInputEmail1">Email address</label> -->
		          <input type="email" class="form-control" id="email" name="email"  placeholder="Email" value="<?php if(!empty($_GET['email'])) echo $_GET['email'] ?>">
		        </div>
		        <div class="form-group">
		          <!-- <label for="exampleInputPassword1">Password</label> -->
		          <input type="text" class="form-control" id="phone"  name="phone" placeholder="Phone" value="<?php if(!empty($_GET['phone'])) echo $_GET['phone'] ?>">
		        </div>
		        <button type="submit" class="btn btn-primary">Search</button>
		        <a style="margin-top:0px;" href="<?php echo base_url('admin/users/institutes/id/desc');  ?>"  style="margin-top:3px;"class="btn btn-warning">Reset</a>
		      </div><!-- /.box-body -->   
		    </form>
		</div>

        <table class="table table-bordered">
	    <thead>
			<tr>
				<th width="5%">#</th>
				<th width="20%">Institute name</th>
				<th width="15%">Owner name</th>
				<th width="10%">Phone </th>
							
				<th width="15%">Email</th>
				<th width="15%">Status </th>
				<th width="10%">Actions</th>
			</tr>
		</thead>
        <tbody>
		<?php if(!empty($institutes)): $i = 0; foreach ($institutes as $row) { $i++;
				?>
				<tr>
					<td><?php if(!empty($row->id)) echo $row->id."."; ?></td>
					<td><?php if(!empty($row->fullName)) echo $row->fullName; ?></td>
					<td><?php if(!empty($row->first_name)) echo $row->first_name; ?> <?php  if(!empty($row->last_name)) echo $row->last_name; ?></td>					
					<td><?php if(!empty($row->phone))  echo $row->phone; ?></td>
					<td><?php if(!empty($row->email)) echo $row->email; ?></td>
					<!-- <td><?php //echo date('Y-m-d', strtotime($row->created_at)); ?></td> -->
					<td>
						<div class="btn-group ">
							<button type="button" class="btn <?php if($row->status==1): ?> btn-success <?php elseif($row->status==2): ?> btn-danger <?php else: ?>  btn-warning  <?php endif; ?> dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<?php if($row->status==1): ?> Active <?php elseif($row->status==2): ?> Deactive <?php else: ?> Pending <?php endif; ?> <span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
							<li><a href="<?php echo base_url('admin/users/updateStatus/' . $row->id ) ?>/1/institutes">Active</a></li>
							<li><a href="<?php echo base_url('admin/users/updateStatus/' . $row->id ) ?>/2/institutes">Deactive</a></li>		
							</ul>
						</div>
					</td>
          
					<td>
					    <a href="<?php echo base_url('admin/users/institutes/edit/' . $row->id ) ?>" class="btn btn-success btn-xs" rel="tooltip" data-placement="left" data-original-title=" Edit ">
							<i class="fa fa-pencil"></i>
						</a> 
						<a href="<?php echo base_url('admin/users/teachers/id/desc') ?>?institute_name=<?php echo $row->id; ?>" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Teachers">
							<i class="fa fa-user"></i>
						</a>
						<a href="<?php echo base_url('admin/users/students/id/desc') ?>?institute_name=<?php echo $row->id; ?>" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Students">
							<i class="fa fa-user"></i>
						</a>
						<a href="<?php echo base_url('admin/users/institutes/delete/' . $row->id) ?>" class="btn btn-danger btn-xs" rel="tooltip" rel="tooltip" data-placement="bottom" data-original-title="Remove" onclick="return confirm('Are you sure want to delete?');" >
							<i class="fa fa-trash "></i>
						</a>
					</td>
					</tr>
					<?php } ?><?php else: ?>
					<tr>
						<th colspan="7">
							<center>No institutes Found.</center>
						</th>
					</tr>
				<?php endif; ?>
			</tbody>
        </table>
    </div><!-- /.box-body -->
    <div class="box-footer clearfix">
     <?php if (!empty($pagination)) echo $pagination; ?>
    </div>
  </div><!-- /.box -->

</div>