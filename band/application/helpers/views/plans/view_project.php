<div class="container">

	<?php
		if($flash_msg = $this->session->flashdata('project_updated'))
	   	echo '<h5 class="alert alert-success text-center">'.$flash_msg.'</h5>';

		$project['media_paths'] = explode(',', $project['media_paths']);
	?>

	<h2><?=htmlspecialchars_decode($project['title'])?></h2>

	<ul class="bo-slider">
		<?php foreach($project['media_paths'] as $path) : 
				if(($file_path = substr($path, strrpos($path, '.') +1 )) === 'mp4' || $file_path === 'webm' || $file_path === 'ogg')
					$type = 'video';
				else
					$type = 'image';
			?>
		  <li data-url="<?=base_url('assets/'.$path)?>" data-type="<?=$type?>"></li>
		<?php endforeach; ?>
	</ul>

	<small id="post_date">Created_at <?=$project['created_at']?></small>

	<div><?=htmlspecialchars_decode($project['body'])?></div>

	<?php if($this->session->userdata('user_id')){ ?>
		<a class="btn btn-primary" href="<?=base_url('posts/edit/'.$project['slug'])?>">Edit</a>&nbsp
		<button class="btn btn-danger" onclick=delete_post();>Delete</button>
	<?php } ?>

</div>



<script>

	$(document).ready(function(){
	  	$('.bo-slider').boSlider({
	  		slildeShow: true,
	  		interval: 5000
	  	});
	});

	function delete_post()
	{
		if(confirm('Are you really want to delete this project.'))
		{
			$.ajax({
				url: '<?=base_url('posts/delete')?>',
				method: 'post',
				data: {id: '<?=$project['id']?>', title: '<?=$project['title']?>', type: 'pr'},
				datatype: 'json',

				success: function(res)
				{
					var data = JSON.parse(res);
					alert(data.for);
					if(data.for == 'pr')
						window.location.href = '<?=base_url()?>';
					else
						alert('Database Error...! Try Again.');
				}
			});
		}
		else
			return false;
	}

</script>