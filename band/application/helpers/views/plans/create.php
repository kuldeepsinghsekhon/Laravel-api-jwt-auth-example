<?php
	 if($flash_msg = $this->session->flashdata('event_created'))
     echo '<h5 class="alert alert-success text-center">'.$flash_msg.'</h5>';
?>
<div class="container">
 
<h1><?=$title?></h1>

<form method="post" enctype="multipart/form-data" id="post_image_form">
	<div class="form-group">
		<input type="file" name="image_file[]" id="image_file" multiple style="display: none;">
		<label for="image_file"><span class="btn-sm btn-info">Add Image File</span></label>
		<img style="display: none" src="<?=base_url()?>assets/images/loader.gif" alt="Loading..." width="120" height="60" id="image_loader">
	</div>
</form>
<div id="display_image_error"></div>
<div class="container mb-3" id="display_images"></div>

<form method="post" enctype="multipart/form-data" id="post_video_form">
	<div class="form-group">
		<input type="file" name="video_file[]" id="video_file" multiple style="display: none;">
		<label for="video_file"><span class="btn-sm btn-info">Add Video File</span></label>
		<img style="display: none" src="<?=base_url()?>assets/images/loader.gif" alt="Loading..." width="120" height="60" id="video_loader">
	</div>
</form>

<div id="display_video_error"></div>
<div class="container mb-3" id="display_videos"></div>

<form method="post" id="post_data">

	<!-- <div class="form-group">
		<select name="category" id="category" class="form-control">
			<option value="0">Select Category</option>
			< foreach($categories as $category) { 
					$sel = ($category['id'] === $post['category_id']) ? 'selected' : '';
				?>
				<option <?=$sel?> value="<=$category['id']?>"><=htmlspecialchars_decode($category['category_name'])?></option>
			<php } ?>
		</select>
	</div> -->
	<div class="form-group">
		<label for="title">Price</label>
		<input type="number" name="price" id="price" placeholder="Enter Price" class="form-control" value="<?=set_value('price')?>">
		<div id="price_error" class="text-danger"></div>
	</div>
	<div class="form-group">
		<label for="title">Title</label>
		<input type="text" name="title" id="title" placeholder="Enter Title" class="form-control" value="<?=set_value('title')?>">
		<div id="title_error" class="text-danger"></div>
	</div>
	<div class="form-group">
		<label>Body</label>
		<textarea name="" id="editor1" cols="30" rows="10" placeholder="Enter Body Content"></textarea>
		<div id="body_error" class="text-danger"></div>
	</div>
	<input type="hidden" name="type" id="type" value="<?=$type?>">
	<input type="hidden" name="for" id="for" value="<?=$for?>">
	<div class="form-group">
		<input type="submit" id="submit" value="Create" class="btn btn-success">
	</div>
</form>

</div>
		 
<script>
	var post_body = CKEDITOR.replace( 'editor1', {
		enterMode: CKEDITOR.ENTER_BR
	});

	var images_path = [];
	var videos_path = [];
	var delete_images_path = [];
	var delete_videos_path = [];

	$(document).ready(function(){
		 $('#loading').hide();

		 if('<?=$for?>' !== 'create')
		 {
		 		$('#submit').val('Update');

		 		var img_path_str = '<?php 
		 						if(isset($post["images_path"]))
		 							echo implode("," , $post["images_path"]);
		 						else
		 						  false; ?>';
		 		
		 		if(img_path_str)
		 		{
		 			images_path = img_path_str.split(',');
		 			view_images(images_path);
		 		}

		 		var vid_path_str = '<?php 
		 						if(isset($post["videos_path"]))
		 							echo implode("," , $post["videos_path"]);
		 						else
		 						  false; ?>';
		 		
		 		if(vid_path_str)
		 		{
		 			videos_path = vid_path_str.split(',');
		 			view_videos(videos_path);
		 		}

		 		$('#title').val('<?=htmlspecialchars_decode($post['title'] ?? '')?>');
		 		$('#editor1').html('<?=preg_replace("/\n*/m", "", $post["body"] ?? "")?>');
		 		
		 }
		 
		/*$(window).on('beforeunload', function(){
			if(images_path.length || videos_path.length)
			{
				$.ajax({
					url: 'posts/delete_multiple_media',
					method: 'post',
					data: {images_path: images_path, videos_path: videos_path},
					success: function(res){}
				});
			}
		});*/


		$('#image_file').change(function(){
			var formData = new FormData($("#post_image_form")[0]);
			$.ajax({
				url: '<?=base_url()?>events/upload_images',
				method: 'post',
				data: formData,
				contentType: false,
				cache:false,
				processData: false,
				datatype: 'json',

				beforeSend: function()
				{
					$('#image_loader').show();
					$('#create').attr('disabled', true);
				},

				success: function(response)
				{
					var res = JSON.parse(response);
					$('#display_image_error').html('');

					if(res['paths'] != null && res['paths'].length > 0)
					{
						images_path = $.merge(images_path, res['paths']);
						view_images(res['paths']);
					}

					if(res['errors'] != null && res['errors'].length > 0)
					{
						var display_errors = '';

						res['errors'].forEach(function(item, index){
							display_errors += '<div class="well well-sm"><div>File Name:- '+res['file_name'][index]+'</div><div class="text-danger">Error:- '+item+'</div></div>';
						});

						$('#display_image_error').html(display_errors);
					}
				},

				complete: function()
				{
					$('#image_loader').hide();
					$('#create').attr('disabled', false);
				}

			});

		});



		$('#video_file').change(function(){
			var formData = new FormData($("#post_video_form")[0]);
			$.ajax({
				url: '<?=base_url()?>events/upload_videos',
				method: 'post',
				data: formData,
				contentType: false,
				cache:false,
				processData: false,
				datatype: 'json',

				beforeSend: function()
				{
					$('#video_loader').show();
					$('#create').attr('disabled', true);
				},

				success: function(response)
				{
					var res = JSON.parse(response);

					if(res['paths'] != null && res['paths'].length > 0)
					{
						videos_path = $.merge(videos_path, res['paths']);;
						view_videos(res['paths']);
					}
					if(res['errors'] != null && res['errors'].length > 0)
					{
						var display_errors = '';

						res['errors'].forEach(function(item, index){
							display_errors += '<div class="well well-sm"><div>File Name:- '+res['file_name'][index]+'</div><div class="text-danger">Error:- '+item+'</div></div>';
						});

						$('#display_video_error').html(display_errors);
					}

				},

				complete: function()
				{
					$('#video_loader').hide();
					$('#create').attr('disabled', false);
				}

			});

		});





		$('#post_data').on('submit', function(event){
			event.preventDefault();
			if(images_path.length)
			{ 		
					$.ajax({
					url: '<?=base_url()?>events/create_ajax',
					method: 'post',
					data: $('#post_data').serialize()+'&'+$.param({images_path: images_path, videos_path: videos_path, body: post_body.getData()}),
					datatype: 'json',
					beforeSend: function()
					{
						$('#submit').attr('disabled', 'disabled');
						$('#loading-image').show();
					},
				
					success: function(response)
					{
						var data = JSON.parse(response);
						if(data.status === 'create' || data.status === 'edit')
						{
							if(delete_images_path.length > 0 || delete_videos_path.length > 0)
							{
								$.ajax({
									url: 'posts/delete_media',
									method: 'post',
									data: {images_path: delete_images_path, videos_path: delete_videos_path},

									success: function(res)
									{
										console.log(res);
									}
								});
							}
						}

						if(data.status === 'create')
						{
							window.location.href = '<?=base_url('create_'.$type)?>';
						}
						else if(data.status === 'edit')
						{
							 alert(data.db_data);
							// window.location.href = '=base_url('data_table')?>';
							//console.log(data.type_category_id);
						}
						else if(data.status === false)
						{
							$('#title_error').text(data.title_error);
							$('#body_error').text(data.body_error);
							$('#price_error').text(data.price_error);
						}
						else
						{
							//$('#post_data, #post_image_form, #post_video_form').trigger('reset');
							alert(data.status);
						}
					},
					complete: function()
					{
						$('#submit').attr('disabled', false);
						$('#loading-image').hide();
					}
				});
			}
			else
				alert('Select image for thumbnail..!');
		});
	});

	function view_images(arr)
	{
		var	display_images = '';
		arr.forEach(function(item){
			display_images += ' <img style="position:relative;" onMouseOver=show_img_button("'+item.replace(/[/.]/g,'')+'"); onMouseOut=hide_img_button("'+item.replace(/[/.]/g,'')+'"); src="<?=base_url()?>/assets/'+item+'" class="m-3 remove_img_'+item.replace(/[/.]/g,'')+'" alt="Post Image" height="200" width="300"><button onMouseOver="this.style.opacity=1" onMouseOut="this.style.opacity=0" class="pc_img_button btn btn-danger remove_img_'+item.replace(/[/.]/g,'')+'" onclick=delete_media("remove_img_'+item.replace(/[/.]/g,'')+'","'+item+'","image")>X</button> ';
			});

		$('#display_images').hide().append(display_images).fadeIn('slow');
	}
	function show_img_button(cl)
	{
		$('button.remove_img_'+cl).css('opacity', .7);
	}
	function hide_img_button(cl)
	{
		$('button.remove_img_'+cl).css('opacity', 0);
	}
	
	function view_videos(arr)
	{
		var	display_videos = '';
		arr.forEach(function(item){
			display_videos += ' <video style="position:relative;" onMouseOver=show_vid_button("'+item.replace(/[/.]/g,'')+'"); onMouseOut=hide_vid_button("'+item.replace(/[/.]/g,'')+'"); src="<?=base_url()?>assets/'+item+'" height="200" width="300" controls class="m-3 remove_vid_'+item.replace(/[/.]/g,'')+'" ></video><button onMouseOver="this.style.opacity=1" onMouseOut="this.style.opacity=0" class="pc_vid_button btn btn-danger remove_vid_'+item.replace(/[/.]/g,'')+'" onclick=delete_media("remove_vid_'+item.replace(/[/.]/g,'')+'","'+item+'","video")>X</button> ';
			});

		$('#display_videos').hide().append(display_videos).fadeIn('slow');
	}
	function show_vid_button(cl)
	{
		$('button.remove_vid_'+cl).css('opacity', .7);
	}
	function hide_vid_button(cl)
	{
		$('button.remove_vid_'+cl).css('opacity', 0);
	}

	function delete_media(element_class, path, check_media)
	{ 
		if(check_media === 'image')
		{
			images_path.splice(images_path.indexOf(path), 1);
			delete_images_path.push(path);
			$('.'+element_class).fadeOut(500);
		}
		else
		{
			videos_path.splice(videos_path.indexOf(path), 1);
			delete_videos_path.push(path);
			$('.'+element_class).fadeOut(500);
		}
	}

</script>
