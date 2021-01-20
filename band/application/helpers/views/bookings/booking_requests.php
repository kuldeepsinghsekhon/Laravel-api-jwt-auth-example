
	<?php
		if($fd = $this->session->flashdata('contract_sent'))
			echo '<div style="font-size:20px;" class="alert alert-success text-center">'.$fd.'</div>';

		if($fd = $this->session->flashdata('booking_request_cancel'))
			echo '<div style="font-size:20px;" class="alert alert-danger text-center">'.$fd.'</div>';
	?>

	<!-- <h2 id="table_title"><?=$title?></h2> -->
	<!-- <div class="form-group">
		<label>Type</label>
		<select name="type" id="type" class="form-control">
			<option value="all">All Data</option>
			<php foreach($types as $type) : ?>
				<option value="<=$type['type']?>"><=ucfirst($type['type'])?></option>
			<php endforeach; ?>
		</select>
	</div> -->
	<!-- <div class="form-group" id="category_container"></div> -->


	<!-- <a href="<=base_url('booking/create')?>" class="btn btn-primary mb-2 pull-right mr-3">Create New Booking</a> -->

<div class="container-fluid">
	<div class="row">
	    <div class="col-md-12">
	        <div>
	            <h1 class="theading"><?=$title?></h1>
	        </div>
	    </div>
	</div>
</div>

<div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card my-4">
                        <div class="card-body">
                            <div class="titletable  text-right">
                                <a href="<?=base_url()?>" class="Addclientbtn">
                               		 Create New Booking
                                </a>
                              
                            </div>
                            <div class="tablebox">
                                <table id="example" class="table table-striped display dt-responsive nowrap table-responsive" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
																						<th>Email</th>
																						<th>Name</th>
																						<th>Date of Event</th>
																						<th>Time</th>
																						<th>Address</th>
																						<th>Payment</th>
																						<th>Payment Left</th>
																						<th>Plan</th>
																						<th>Musicians</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?=$tbody ?? '' ?>
                                       <!--  <tr>
                                           <td>Tiger Nixon</td>
                                           <td>System Architect</td>
                                           <td>Edinburgh</td>
                                           <td>61</td>
                                           <td>2011/04/25</td>
                                            <td>
                                            	<a href="#"><i class="fas fa-edit"></i></a>
                                            	<a href="#"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                       </tr> -->
                                    </tbody>
                                   
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

<script>
		/*$(document).ready(function(){
			$('#type').change(function(){
					$.ajax({
						url: '<=base_url('data_table')?>',
						method: 'post',
						data: {type: $(this).val()},
						datatype: 'json',
						beforeSend: function()
						{
							$('tbody').html('<img src="<=base_url('assets/images/loader1.gif')?>" style="display:block;margin:0 auto;" alt="Loading...">');
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
						url: '<=base_url('data_table')?>',
						method: 'post',
						data: {category_id: $(this).val()},
						datatype: 'json',
						beforeSend: function()
						{
							$('tbody').html('<img src="<=base_url('assets/images/loader1.gif')?>" style="display:block;margin:0 auto;" alt="Loading...">');
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
			url: '<=base_url('categories/get_categories')?>',
			method: 'post',
			data: {type: type},
			beforeSend: function()
			{
				$('tbody').html('<img src="<=base_url('assets/images/loader1.gif')?>" alt="Loading...">');
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
				url: '<=base_url('posts/delete')?>',
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
	}	*/
</script>