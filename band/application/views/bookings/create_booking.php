
	<h3 id="booking_title"></h3>
	<form method="post" id="booking_form">
		<div class="form-group">
			<label for="name">Name:</label>
			<input type="text" name="name" id="name" placeholder="Enter Name" class="form-control">
			<div id="name_error" class="text-danger"></div>
		</div>
		<div class="form-group">
			<label for="email">Email:</label>
			<input type="email" name="email" id="email" readonly class="form-control">
		</div>
		<div class="form-group">
			<label for="address">Adress:</label>
			<textarea name="address" id="address" cols="30" rows="10"   class="form-control"></textarea>
			<div id="address_error" class="text-danger"></div>
		</div>
		<div class="form-group">
			<input type="submit" value="Send Booking Request" class="btn btn-success" id="submit">
		</div>
	</form>

<script>
	/*$(document).ready(function(){
		

		// form on submit
		$('#booking_form').on('submit', function(e){
			e.preventDefault();

			$.ajax({
				url: '<=base_url('create_booking/')?>',
				method: 'post',
				data: $(this).serialize(),
				datatype: 'json',

				beforeSend: function()
				{
					$('#end_time').val(parseFloat($('#time_of_event').val())+parseFloat('<?=$total_time?>'));
					//alert($('<div id="time_of_event"></div>').val());
					$('#submit').removeClass('btn-success').addClass('btn-warning').val('Send Booking Request...').attr('disabled',true);
				},
				success: function(res)
				{
					//console.log(res);
					var data = JSON.parse(res);
					if(data.status)
						window.location.href = '<=base_url()?>';
					else
					{
						$('#name_error').html(data.name_error);
						$('#date_error').html(data.date_error);
						$('#time_error').html(data.time_error);
						$('#address_error').html(data.address_error);
					}
				},
				complete: function()
				{
					$('#submit').removeClass('btn-warning').addClass('btn-success').val('Send Booking Request').attr('disabled',false);
				}
			});
		})
	});*/
</script>