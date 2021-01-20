<!DOCTYPE html>
<html>
<head>
	<title>Mariachi Tierra Azteca</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<?php if(!($view_for_admin ?? FALSE)): ?>
  	<link href="<?=base_url('assets/stripe_assets/stripe.css')?>" rel="stylesheet">
	<?php endif; ?>

  <!-- start client signature css -->
  <style>
		#client_signature_cont {
			border: 1px solid #000;
			border-radius: 7px;
			padding: 10px 17px;
			margin: 10px 0;
			width: 308px;
		}
		#client_signature_cont h1 {
			margin: 0;
			font-size: 20px;
			padding-bottom: 10px;
		}
		#client_signature_cont>#button_cont>button
		{
			color: #fff;
			padding: 5px 27px;
			border: none;
			border-radius: 5px;
			font-size: 17px;
		}
		#client_signature_cont>#button_cont>#save
		{
			background-color: green;
		}
		#client_signature_cont>#button_cont>#clear
		{
			background-color: #DC7A10;
		}
  	#client_signature_cont .wrapper {
			position: relative;
			width: 402px;
			height: 163px;
			-moz-user-select: none;
			-webkit-user-select: none;
			-ms-user-select: none;
			user-select: none;
		}
		#client_signature_cont .signature-pad {
			position: absolute;
			left: 0;
			top: 0;
			background: #fff;
			right: 0;
			bottom: 0;
			float: left;
		}
		#client_signature_cont>#button_cont {
			text-align: center;
		}
  </style>
  <!-- end client signature css -->
	
  <style>
  	.label-cls::after {
			content: ":";
			text-align: ;
			padding: 0;
			position: absolute;
			right: 0;
		}
		.time-section h4::after{
			content: ":";
			padding-left:20px; 
		}
		  	@media only screen and (max-width: 767px){
		  		body{
		  			padding:12px;
		  		}
		  		.main-div {
					width: 100% !important;
					padding: 0!important;
				}
				.logo img{
					max-width:250px;
				}
				.main-hding h1 {
					font-size: 26px;
				}
				.main-hding h2 {
					font-size: 20px;
				}
				.main-2{
					width: 100% !important;
				}
				.body-content {
					margin-top: 20px !important;
				}
				.body-content input{
					font-size:17px !important;
				}
				.label-cls {
					width: 100% !important;
				}
				.input-cls {
					width: 100% !important;
				}
				.input-cls input{
					width: 80% !important;
					font-size: 17px !important;
				}
	  	}
		  	@media only screen
				and (min-device-width:768px)
		        and (max-device-width:1024px){
		        	.main-2{
					width: 100% !important;
				}
				body{
					padding:15px;
				}
				.main-div {
					width: 100% !important;
					padding:0!important;
				}
      }
  </style>

  <!-- start popup css -->
  <style>
		#popup_main {
			display: none;
			position: fixed;
			width: 100%;
			height: 100%;
			background: rgba(0,0,0,.6);
			z-index: 1001;
			top: 0px;
			left: 0px;
		}
		#popup {
			width: 500px;
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			box-shadow: 3px 3px 10px 2px white;
			text-align: center;
			background: #dfd9d9;
		}
	</style>
  <!-- end popup css -->
</head>
<body>
	<?php if($fd = $this->session->flashdata('payment_failed')): ?>
		<div><p><?=$fd?></p></div>
	<?php endif; ?>

<div class="main-div" style="background:#fff;padding: 20px;">
	<div class="main-2" style="width: 70%; margin: auto;background:#fcfce0;padding:20px;">
		<div class="main-hding"style="text-align: center;">
		<h1 style="color:#c62a2a;margin-top:20px;">Mariachi Tierra Azteca</h1>
		<h2 style="color:#000;margin-top:10px;margin-bottom: 20px;">Performance Contract</h2>
	</div>
	<div class="logo" style="text-align:center;">
		<img src="<?=base_url('assets/images/contract_form_image.png')?>"/style="width: auto;">
	</div>
	
	<div class="time-section" style="width:50%;margin:auto;padding: 20px;border-top: 1px solid #c62a2a; border-bottom: 1px solid #c62a2a;margin-top: 2rem;">
		<div class="first" style="padding: 5px 0 27px 0;">
			<h4 style="font-size:22px;display: inline;">Name</h4>
			<input type="text"style="border:none;background:transparent;width: 250px;font-size:18px;font-weight:bold;" value="<?=$booking_data[0]['name']?>" readonly>
		</div>
		<div class="second" style="padding: 5px 0 27px 0;">
			<h4 style="font-size:22px;display: inline;">Date</h4>
			<input type="text"style="border:none;background:transparent;width: 250px;font-size:18px;font-weight:bold;"
			value="<?=date('F dS, Y', strtotime($booking_data[0]['date_of_event']))?>" readonly>
		</div>
	</div>
	<div class="body-content" style="margin-top:40px;">
		<p style="font-size:20px;color:#000;padding-top:0px;text-align: center; line-height: 30px;margin-bottom: 20px;">This contract Agreement is made on this day of
           <input type="text" style="border: none;background: transparent;border-bottom:1px solid #000;width: 35%;font-size:18px; font-weight: bold; text-align: center;" value="Mariachi Tierra Azteca" readonly>
           between 
           <input type="text" style="border: none;background: transparent;border-bottom:1px solid #000;width: 35%;font-size:18px;font-weight: bold;text-align: center;" value="<?=$booking_data[0]['name']?>" readonly>
           and Sancho Panza for the hiring of Mariachi Tierra Azteca.</p><hr style="margin:16px 0px;color: #c62a2a;">
           <h3 style="font-size:24px;color:#c62a2a;padding-left: 20px;font-weight:600;">It is agreed as follows:</h3>
			<ol style="color:#000;line-height: 35px;font-size:20px;">
				<!--///////////////////1-list////////////-->
			  <li>
			  	<div class="label-cls" style="width:33%;display: inline-block;position: relative;">
			  	<label style="">Date of Performance</label>
			  </div>
			  	<div class="input-cls"style="width:66%;display: inline-block;">
			  	<input type="text" placeholder="" style="border: none;background: transparent;font-size:16px;font-weight: bold; width:50%;" value="<?=date('F dS, Y', strtotime($booking_data[0]['date_of_event']))?>" readonly>
			  </div>
			  </li>
			  <!--///////////////////2-list////////////-->
			  <li>
			  	<div class="label-cls"style="width:33%;display: inline-block;position: relative;">
			  	<label>Performance Time</label>
			  </div>
			  	<div class="input-cls"style="width:66%;display: inline-block;">
			  	<input type="text" style="border: none;background: transparent;font-size:16px;font-weight: bold; width:50%;" value="<?=$booking_data[0]['time']?>" readonly>
			  </div>
			  </li>
			  <!--///////////////////3-list////////////-->
			  <li>
			  	<div class="label-cls"style="width:33%;display: inline-block;position: relative;">
			  	<label>Performance Location</label>
			  </div>
			  	<div class="input-cls"style="width:66%;display: inline-block;">
			  	<input type="text" style="border: none;background: transparent;font-size:16px;font-weight: bold; width:50%;" value="<?=$booking_data[0]['address']?>" title="<?=$booking_data[0]['address']?>" readonly>
			  </div>
			  </li>
			  <!--///////////////////4-list////////////-->
			  <li>
			  	<div class="label-cls"style="width:33%;display: inline-block;position: relative;">
			  	<label>Number of Mariachi's</label>
			  </div>
			  <div class="input-cls"style="width:66%;display: inline-block;">
			  	<input type="text" style="border: none;background: transparent;font-size:16px;font-weight: bold; width:50%;" value="<?=$booking_data[0]['number_of_musicians']?> Musicians" readonly>
			  </div>
			  </li>
			  <!--///////////////////5-list////////////-->
			  <li>
			  	<div class="label-cls"style="width:33%;display:inline-block;position: relative;
			  	">
			  	<label>Deposit Amount (50%)</label>
			  </div>
			  <div class="input-cls"style="width:66%;display: inline-block;">
			  	<input type="text" style="border: none;background: transparent;font-size:16px;font-weight: bold; width:50%;" value="$<?=$booking_data[0]['payment_before_event']?>" readonly>
			  </div>
			  </li>
			  <!--///////////////////6-list////////////-->
			  <li>
			  	<div class="label-cls"style="width:33%;display: inline-block;position: relative;">
			  	<label>Total Amount</label>
			  </div>
			  <div class="input-cls"style="width:66%;display: inline-block;">
			  	<input type="text" style="border: none;background: transparent;font-size:16px;font-weight: bold; width:50%;" value="$<?=$booking_data[0]['payment_before_event']+$booking_data[0]['payment_after_event']?>" readonly>
			  </div>
			  </li>
			</ol>
	</div><hr style="margin:16px 0px; color: #c62a2a">
	<div class="terms" style="color:#000;">
		<h4 style="margin-bottom: 20px;color:#c62a2a;font-size: 24px;">Terms and Conditions</h4>
		<p style="font-size: 18px;text-align: justify;">Payment.. A 50% deposit of Fee is due on the signing of this contract. The remaining 50% of Fee is due immediately prior to Mariachi Tierra Azteca's performance.<br>

		Cancellation. If full payment is not made by the time immediately prior to Mariachi Tierra Azteca's performance the band may cancel and <?=$booking_data[0]['name']?> may not seek any damages. Cancellation may be made by <?=$booking_data[0]['name']?> prior to the time of Show, in which case <?=$booking_data[0]['name']?> 50% deposit of Fee is non-refundable. Mariachi Tierra Azteca may cancel at any time prior, in which case Band must refund Fee in its entirety.
        <br>
		Force Majeure. In the event Show cannot reasonably be put on because of unpredictable occurrences such as an act of nature, government, or illness/disability, the parties may negotiate a substitute Show on the same terms as this Agreement save for the time of Show, with no further deposit of Fee due, in which case a new Agreement reflecting this will be signed by the parties. No further damages may be sought for failure to perform because of force majeure.<br>

		The below-signed Mariachi Tierra Azteca Representative warrants he has authority to enforceably sign this agreement for Mariachi Tierra Azteca in its entirety. The below signed Operator's Representative warrants s/he has authority to bind Operator and Venue (above).</p>
	</div><hr style="margin:16px 0px; color: #c62a2a">
	<!--//////////////////////end section/////////-->
	<div class="sign-sec">
		<div class="sign-1">
			<h4 style="font-size: 20px;">Signature of Band Representative :_____________</h4>
			<input type="text" value="Hector Amador" style="width: 250px;display: block;padding:5px;margin-bottom: 10px;border:none;background: transparent;border-bottom: 1px solid #000;
			font-size:20px;">
			<input type="text" value="Mariachi Tierra Azteca" style="width: 250px;display: block;padding:5px;margin-bottom: 10px;border:none;background: transparent;border-bottom: 1px solid #000;
			font-size:20px;">
		</div>
		<div class="sign-2" style="margin-top: 50px;">
			<h4 style="font-size: 20px;">Client Signature:
				<div id="client_signature_cont">
					<h1>
					  Draw signature:
					</h1>
					<div class="wrapper">
					  <canvas id="signature-pad" class="signature-pad"></canvas>
					</div>
					<div id="button_cont">
					  <button id="save">Save</button>
					  <button id="clear">Clear</button>
					</div>
				</div>
			</h4>
			<input type="text" value="<?=$booking_data[0]['name']?>" style="width: 250px;display: block;padding:5px;margin-bottom: 10px;border:none;background: transparent;border-bottom: 1px solid #000;
			font-size:20px;">
		</div>
		<div class="accept" style="margin-top:50px;margin-bottom:20px; text-align: center;">
			<?php if(!($view_for_admin ?? FALSE)): ?>
				<button id="accept_agreement" class="btn" style="background:#2a9ac6;color:#fcfce0;padding:10px 50px;border: none;font-size:18px;cursor: pointer;" title="Save Signature First.">I Accept Agreement</button>
			<?php else: ?>
				<a href="<?=base_url('send_contract/'.$email_id.'/'.$booking_id)?>" id="v_send_contract" class="btn" style="background:#2a9ac6;color:#fcfce0;padding:10px 50px;border: none;font-size:18px;cursor: pointer;text-decoration: none;">Send Contract</a>
				<a href="<?=base_url('cancel_booking_request/'.$booking_id)?>" id="v_cancel_booking" class="btn" style="background:#d32f2f;color:#fff;padding:10px 50px;border: none;font-size:18px;cursor: pointer;text-decoration: none;">Cancel Booking</a>
			<?php endif; ?>
		</div>
	</div>
</div>
</div>

<?php if(!($view_for_admin ?? FALSE)): ?>
	<div id="popup_main">
		<div id="popup">
			 <form>
			 	<div class="payment_form_close"><span>X</span></div>
			 	<div id="payment_header_cont">
				 	<p class="payment_header">Total Amount: <span>$<?=$booking_data[0]['payment_before_event']?></span></p>
				 	<p class="payment_header">Due Amount: <span>$<?=$booking_data[0]['payment_after_event']?></span></p>
			 	</div>
		    <label>
		      <span>Card:</span>
		      <div id="card-element" class="field"></div>
		    </label>
		    <button type="submit">Pay $<?=$booking_data[0]['payment_before_event']?></button>
		    <div class="outcome">
		      <div class="error"></div>
		    </div>
	  </form>
		</div>
	</div>
<?php endif; ?>

<!-- jquery js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- bootstrap js -->
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->

<script>
	var signature64 = {};

	$(document).ready(function(){	
		signature64 = null;

			$('#accept_agreement').click(function(){
				if(signature64 !== null)
					$('#popup_main').fadeIn('slow');
				else
	 				alert('Save Signature First.');
			});
	 
			$('.payment_form_close').click(function(){
				$('#popup_main').fadeOut('slow');
			});
			
	});

</script>

<?php if(!($view_for_admin ?? FALSE)): ?>
	<!-- stripe js -->
	<script src="https://js.stripe.com/v3/"></script>
	<script src="<?=base_url('assets/stripe_assets/stripe.js')?>"></script>
<?php endif; ?>


<!-- start client signature script -->
<script src="<?=base_url('assets/digital_signature/jsdelivr2.3.2.js')?>"></script>
<script>
	var signaturePad = new SignaturePad(document.querySelector('#client_signature_cont #signature-pad'), {
	  backgroundColor: 'rgba(255, 255, 255, 0)',
	  penColor: 'rgb(0, 0, 0)'
	});
	var saveButton = document.querySelector('#client_signature_cont #save');
	var cancelButton = document.querySelector('#client_signature_cont #clear');

	saveButton.addEventListener('click', function(event) {
	  if(signaturePad.isEmpty())
	  	alert('Draw Valid Signature.');
	  else
	  {
	  	signature64 = signaturePad.toDataURL('image/png');
		  // alert(signature64.length);

		  $.ajax({
		  	url:'<?=base_url('save_client_signature')?>',
		  	method:'post',
		  	data:{signature64: signature64},
		  	datatype: 'json',
		  	beforeSend:function()
		  	{
		  		saveButton.disabled = true;
		  		cancelButton.disabled = true;
		  	},

		  	success: function(res)
		  	{
		  		// console.log(res);
		  		var data = JSON.parse(res);
		  		if(data.status === true)
		  		{
	 				  $('#client_signature_cont').hide().html('<img src="'+signature64+'" />').css('height','147px').fadeIn(500)
						$('#accept_agreement').removeAttr('title');	  
		  		}
		  		else
		  		{
		  			alert('Error Occur..! Please Try Again.');
		  			window.location.reload();
		  		}
		  	}
		  });

		  // Send data to server instead...
		  // window.open(data);
		}
	});

	cancelButton.addEventListener('click', function(event) {
	  signaturePad.clear();
	});

</script>
<!-- end client signature script -->



</body>
</html>