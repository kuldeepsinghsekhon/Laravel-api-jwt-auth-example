<div class="container">
	<?php
		if($fd = $this->session->flashdata('category_updated'))
			echo '<div class="alert alert-success text-center">'.$fd.'</div>';
	?>
	<h2 id="category_title"><?=$title?></h2>
	<div class="form-group">
		<select name="type" id="type" class="form-control">
			<option value="all">All Categories</option>
			<option value="post">Post</option>
			<option value="project">Project</option>
			<option value="event">Event</option>
		</select>
	</div>
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Type</th>
					<th>Category Name</th>
					<th>Category Description</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody id="table_body">
				<?=$table_body?>
			</tbody>
		</table>
	</div>
</div>

<script>
		$(document).ready(function(){
			//category_by_type('$type ?? 'post' ?>');
			//$('#type').val('$type ?? 'post' ?>');
			$('#type').change(function(){
				//alert($(this).val());
				$.ajax({
					url: '<?=base_url('categories')?>',
					method: 'get',
					data: {type: $(this).val()},
					datatype: 'json',
					beforeSend: function()
					{
						$('tbody').html('<img id="loader1" src="<?=base_url('assets/images/loader1.gif')?>" alt="Loading...">');
					},

					success: function(res)
					{ 
						var data = JSON.parse(res);
						$('#category_title').html(data.title);
						$('#table_body').html(data.table_body);
					}
				});
			});
		});

	function edit_category(id, name =  '', type = '')
	{
    $.redirect('<?=base_url('category/edit/')?>'+name, {'id': id, 'type':type});
	}

	function delete_category(category_id)
	{
		if(confirm('Are you really want to deleted this category..?'))
		{
			$.ajax({
				url: '<?=base_url('categories/delete')?>',
				method: 'post',
				data: {id: category_id},
				datatype: 'json',

				success: function(res)
				{
					var data = JSON.parse(res);

					if(data.status === true)
						$('#tr'+category_id).fadeOut(500);
					else
						alert(data.status);

				}
			});
		}
		else
			return false;
	}	
</script>