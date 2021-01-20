<?php
	 if($flash_msg = $this->session->flashdata('booking_created'))
     echo '<h5 class="alert alert-success text-center">'.$flash_msg.'</h5>';
?>
<div class="container col-lg-7">
	<h2><?=$title?></h2>
	<form method="post" id="booking_form">
		<div class="form-group">
			<label for="name">Name:</label>
			<input type="text" name="name" id="name" placeholder="Enter Name" class="form-control">
			<div id="name_error" class="text-danger"></div>
		</div>
		<div class="form-group">
			<label for="email">Email:</label>
			<input type="email" name="email" id="email" readonly class="form-control" value="<?=$email?>">
		</div>
		<div class="form-group">
			<label for="date_of_event">Date of the Event:</label>
			<input type="text" name="date_of_event" id="date_of_event" class="form-control datepicker">
			<div id="date_error" class="text-danger"></div>
		</div>
		<div class="form-group">
			<label for="time_of_event">Time of the Event</label>
			<input type="text" name="time_of_event" id="time_of_event" class="form-control timepicker">
			<input type="hidden" name="end_time" id="end_time">
			<div id="time_error" class="text-danger"></div>
		</div>
		<div class="form-group">
			<label for="address">Adress:</label>
			<textarea name="address" id="address" cols="30" rows="10"   class="form-control"></textarea>
			<div id="address_error" class="text-danger"></div>
		</div>
		<div class="form-group">
			<label for="musicians">Number of Musicians:</label>
			<input type="number" name="musicians" id="musicians" class="form-control" readonly value="<?=$musicians?>">
		</div>
		<div class="form-group">
			<label for="payment_before_event">Payment before Event:</label>
			<input type="number" name="payment_before_event" id="payment_before_event" class="form-control" readonly value="<?=$payment_before_event?>">
		</div>
		<div class="form-group">
			<label for="payment_after_event">Payment After Event:</label>
			<input type="number" name="payment_after_event" id="payment_after_event" class="form-control" readonly value="<?=$payment_after_event?>">
		</div>
		<div class="form-group">
			<input type="submit" value="Send Booking Request" class="btn btn-success" id="submit">
		</div>
	</form>
</div>

<script>
	$(document).ready(function(){
		$('.timepicker').timepicker({
		    timeFormat: 'h:mm p',
		    interval: 60,
		    minTime: '08:00am',
		    maxTime: '12:00pm',
		    defaultTime: '11:00am',
		    startTime: '08:00am',
		    dynamic: true,
		    dropdown: true,
		    scrollbar: true
		});

		// https://bootstrap-datepicker.readthedocs.io/en/latest/
		$('.datepicker').datepicker({
	    format: 'dd/mm/yyyy',
	    startDate: '-3d'
		});

		// form on submit
		$('#booking_form').on('submit', function(e){
			e.preventDefault();

			$.ajax({
				url: '<?=base_url('create_booking/')?>',
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
						window.location.href = '<?=base_url()?>';
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
	});
</script>