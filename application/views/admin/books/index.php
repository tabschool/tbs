
<!-- Content Header (Page header) -->
<section class="content-header">
<h3>
<i class="fa fa-book"></i> Uploaded Books
<small><a href="<?php echo base_url('admin/books/add') ?>" class="btn btn-success">Add New <i class="fa fa-plus"></i> </a></small>
</h3>
</section>

<div class="box table-responsive">
		<table class="table table-bordered table-hover">
		<thead>
		<tr>
			<th width="5%">#</th>
			<th width="30%">Book Name</th>
			<th width="30%">Auther</th>
			<th width="10%">Pages</th>
			<th width="10%">Created At </th>
			<th width="15%">Actions</th>
		</tr>
		</thead>
		<tbody>
		<?php
		if (!empty($templates)):
			$i = 0; foreach ($templates as $row) { $i++;
				?>
				<tr>
					<td><?php echo $i . "."; ?></td>
					<td><a href="<?php echo base_url( 'admin/books/edit/' . $row->id )?>"class="btn btn-small"  rel="tooltip" data-placement="left" data-original-title=" Edit "><?php echo $row->book_name; ?></a></td>
					<td ><?php echo substr($row->author_name, 0, 50); ?></td>
					<td><?php echo $row->pages; ?></td>
					<td><?php echo date('Y-m-d', strtotime($row->created_at)); ?></td>
					<td>
					<a href="<?php echo base_url('admin/books/edit/' . $row->id ) ?>" class="btn btn-success btn-xs" rel="tooltip" data-placement="left" data-original-title=" Edit ">
							<i class="fa fa-pencil"></i>
						</a>
						<a href="<?php echo base_url('admin/books/delete/' . $row->id) ?>" class="btn btn-danger btn-xs" rel="tooltip" rel="tooltip" data-placement="bottom" data-original-title="Remove" onclick="return confirm('Are you sure want to delete?');" >
							<i class="fa fa-trash "></i></a>
						</td>
					</tr>
					<?php } ?><?php else: ?>
					<tr>
						<th colspan="5">
							<center>No Books Found.</center>
						</th>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>
	<div class="text-right"> <?php if (!empty($pagination)) echo $pagination; ?></div>

</div>