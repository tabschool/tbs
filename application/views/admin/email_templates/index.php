
<!-- Content Header (Page header) -->
<section class="content-header">
<h3>
<i class="fa fa-envelope-o"></i> Email Templates
<small><a href="<?php echo base_url('admin/email_templates/add') ?>" class="btn">Add New <i class="fa fa-plus"></i> </a></small>
</h3>
</section>

<div class="box table-responsive">
		<table class="table table-bordered table-hover">
		<thead>
		<tr>
			<th width="5%">#</th>
			<th width="35%">Template name</th>
			<th width="30%">Subject</th>
			<th width="20%">Created At </th>
			<th width="10%">Actions</th>
		</tr>
		</thead>
		<tbody>
		<?php
		if (!empty($templates)):
			$i = 0; foreach ($templates as $row) { $i++;
				?>
				<tr>
					<td><?php echo $row->id . "."; ?></td>
					<td><a href="<?php echo base_url( 'admin/email_templates/edit/' . $row->id )?>"class="btn btn-small"  rel="tooltip" data-placement="left" data-original-title=" Edit "><?php echo $row->template_name; ?></a></td>
					<td ><?php echo substr($row->template_subject, 0, 50); ?></td>
					<td><?php echo date('Y-m-d', strtotime($row->created_at)); ?></td>
					<td>
					<a href="<?php echo base_url('admin/email_templates/edit/' . $row->id ) ?>" class="btn btn-success btn-xs" rel="tooltip" data-placement="left" data-original-title=" Edit ">
							<i class="fa fa-pencil"></i>
						</a>
						<a href="<?php echo base_url('admin/email_templates/delete/' . $row->id) ?>" class="btn btn-danger btn-xs" rel="tooltip" rel="tooltip" data-placement="bottom" data-original-title="Remove" onclick="return confirm('Are you sure want to delete?');" >
							<i class="fa fa-trash "></i></a>
						</td>
					</tr>
					<?php } ?><?php else: ?>
					<tr>
						<th colspan="5">
							<center>No Email Template Found.</center>
						</th>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>
	<div class="text-right"> <?php if (!empty($pagination)) echo $pagination; ?></div>

</div>