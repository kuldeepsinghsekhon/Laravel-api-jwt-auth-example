<div class="container">
	<?php
		if($fd = $this->session->flashdata('post_table'))
			echo '<div class="alert alert-success text-center">'.$fd.'</div>';
	?>
	<h2 id="table_title"><?=$title?></h2>
	<div class="form-group">
		<label>Type</label>
		<select name="type" id="type" class="form-control">
			<option value="all">All Data</option>
			<?php foreach($types as $type) : ?>
				<option value="<?=$type['type']?>"><?=ucfirst($type['type'])?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<div class="form-group" id="category_container"></div>
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Type</th>
					<th>Thumbnail</th>
					<th>Title</th>
					<th>Body</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?=$tbody ?? '' ?>
			</tbody>
		</table>
	</div>
</div>

<script>
		$(document).ready(function(){
			$('#type').change(function(){
					$.ajax({
						url: '<?=base_url('data_table')?>',
						method: 'post',
						data: {type: $(this).val()},
						datatype: 'json',
						beforeSend: function()
						{
							$('tbody').html('<img src="<?=base_url('assets/images/loader1.gif')?>" style="display:block;margin:0 auto;" alt="Loading...">');
						},

						success: function(res)
						{
							var data = JSON.parse(res);

							$('#table_title').html(data.title);
							$('tbody').html(data.tbody);

							if(typeof data.categories === 'undefined')
								$('#category_container').html('');
							else
								$('#category_container').hide().html(data.categories).fadeIn('slow');
						}
					});
				});

				$(document).on('change','#category', function(){ 
					$.ajax({
						url: '<?=base_url('data_table')?>',
						method: 'post',
						data: {category_id: $(this).val()},
						datatype: 'json',
						beforeSend: function()
						{
							$('tbody').html('<img src="<?=base_url('assets/images/loader1.gif')?>" style="display:block;margin:0 auto;" alt="Loading...">');
						},

						success: function(res)
						{
							var data = JSON.parse(res);
							$('tbody').html(data.tbody);					
						}
					});
				});
		});

	function category_by_type(type)
	{
		$.ajax({
			url: '<?=base_url('categories/get_categories')?>',
			method: 'post',
			data: {type: type},
			beforeSend: function()
			{
				$('tbody').html('<img src="<?=base_url('assets/images/loader1.gif')?>" alt="Loading...">');
			},

			success: function(res)
			{
				$('tbody').html(res);
			}
		});
	}

	function delete_post(id)
	{
		if(confirm('Are you really want to deleted this..?'))
		{
			$.ajax({
				url: '<?=base_url('posts/delete')?>',
				method: 'post',
				data: {id: id},
				datatype: 'json',

				success: function(res)
				{
					var data = JSON.parse(res);

					if(data.status === true)
						$('#tr'+id).fadeOut(500);
					else
						alert(data.status);
				}
			});
		}
		else
			return false;
	}	
</script>