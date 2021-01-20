<div class="container col-lg-8">
	<?php
		if($fd = $this->session->flashdata('category_created'))
			echo '<div class="alert alert-success">'.$fd.'</div>';

		if($fd = $this->session->flashdata('make_changes'))
			echo '<div class="alert alert-success">'.$fd.'</div>';
	?>
	<h2><?=$title?></h2>
	<form method="post" id="create_edit_form">
		<div class="form-group">
			<select name="category_type" id="category_type" class="form-control" value="<?=set_value('category_type')?>">
				<option value="">Select Category Type</option>
				<option value="post">Post</option>
				<option value="project">Project</option>
				<option value="event">Event</option>
			</select>
			<div class="text-danger"><?=form_error('category_type')?></div>
		</div>
		<div class="form-group">
			<label>Category Name</label>
			<input type="text" name="category_name" id="category_name" value="<?=set_value('category_name')?>" class="form-control" placeholder="Enter Category Name" autofocus>
			<div class="text-danger"><?=form_error('category_name')?></div>
		</div>
		<div class="form-group">
			<label>Category Description</label>
			<input type="text" name="category_desc" id="category_desc" value="<?=set_value('category_desc')?>" class="form-control" placeholder="Enter Category Description">
			<div class="text-danger"><?=form_error('category_desc')?></div>
		</div>
		<input type="hidden" id="for" name="for" value="<?=$for?>">
		<input type="submit" id="create" value="Create" class="btn btn-success">
	</form>
</div>

<script>
	$(document).ready(function(){
		if('<?=$for?>' === 'edit')
		{
			$('#create').val('Update');
			$('#category_type').remove();
			$('#category_name').val('<?=$category['category_name'] ?? '' ?>');
			$('#category_desc').val('<?=$category['category_desc'] ?? '' ?>');
			$('#for').val('<?=$category['id'] ?? 'create' ?>');
			$('#create_edit_form').attr('action', '<?=base_url("create_category")?>');
		}

	});
</script>