<div class="container">

	<?php
		if($flash_msg = $this->session->flashdata('post_updated'))
	   	echo '<h5 class="alert alert-success text-center">'.$flash_msg.'</h5>';

		$post['media_paths'] = explode(',', $post['media_paths']);
	?>

	<h2><?=htmlspecialchars_decode($post['title'])?></h2>

	<ul class="bo-slider">
		<?php foreach($post['media_paths'] as $path) : 
				if(($file_path = substr($path, strrpos($path, '.') +1 )) === 'mp4' || $file_path === 'webm' || $file_path === 'ogg')
					$type = 'video';
				else
					$type = 'image';
			?>
		  <li data-url="<?=base_url('assets/'.$path)?>" data-type="<?=$type?>"></li>
		<?php endforeach; ?>
	</ul>


	<div><?=htmlspecialchars_decode($post['body'])?></div>

	<?php if($this->session->userdata('user_id')){ ?>
		<a class="btn btn-primary" href="<?=base_url('edit/'.$post['id'])?>">Edit</a>&nbsp
		<button class="btn btn-danger" onclick=delete_post('<?=$post["id"]?>','<?=$post["type"]?>');>Delete</button>
	<?php } ?>

</div>



<script>

	$(document).ready(function(){
	  	$('.bo-slider').boSlider({
	  		slildeShow: true,
	  		interval: 5000
	  	});
	});

	function delete_post(id, type)
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
						window.location.href = '<?=base_url()?>'+type+'s';
					else
						alert(data.status);
				}
			});
		}
		else
			return false;
	}	

</script>