<link rel="stylesheet" href="<?=base_url('assets/service_assets/service.css')?>">

    <?php if( $this->session->userdata('email_id') ): ?>
      <div class="container">
         <div class="Desired">
            <h1>Select Desired Musicians and Hours</h1>
            <span>Click Box To Schedule</span>
         </div>
         <div class="price_sec">
            <ul class="lowest">
              
               <li>
                  <p><?=$plans[0]['plan_name']?></p>
                  <span style="color: #333333;"><?=$plans[0]['mariachis']?> Mariachis</span>
               </li>
              
             <?php foreach($services as $service) : 
								if($plans[0]['id'] === $service['plan_id']) { 	
										if($service['hour'] == 1){	?>
													<li class="open_modal"  plan_id="<?=$service['plan_id']?>" service_id="<?=$service['id']?>">
					                  <p>$<?=$service['price']?>/<?=$service['hour']?>hour</p>
					                </li>
							<?php }else{ ?>
										 <li class="open_modal" plan_id="<?=$service['plan_id']?>" service_id="<?=$service['id']?>" >
			                  <p>$<?=$service['price']?>/<?=$service['hour']?>hour</p>
			                  <span class="yellow">$<?=$service['price']/2?>/hour</span>
			               </li>	
								<?php }	?>
							<?php }	?>
						<?php endforeach; 	?>
            </ul>

            <ul class="Popular">
							 <li>
                  <p><?=$plans[1]['plan_name']?></p>
                  <span style="color: rgb(255, 255, 0);"><?=$plans[1]['mariachis']?> Mariachis</span>
               </li>
             <?php foreach($services as $service) : 
								if($plans[1]['id'] === $service['plan_id']) { 	
										if($service['hour'] == 1){	?>
												<li class="open_modal" plan_id="<?=$service['plan_id']?>" service_id="<?=$service['id']?>" >
				                  <p>$<?=$service['price']?>/<?=$service['hour']?>hour</p>
				                </li>
							<?php }else{ ?>
										 <li class="open_modal" plan_id="<?=$service['plan_id']?>" service_id="<?=$service['id']?>" >
			                  <p>$<?=$service['price']?>/<?=$service['hour']?>hour</p>
			                  <span class="green">$<?=$service['price']/2?>/hour</span>
			               </li>
								<?php }	?>
							<?php }	?>
						<?php endforeach; 	?>
            </ul>

            <ul class="Premium">
							<li>
                  <p><?=$plans[2]['plan_name']?></p>
                  <span style="color: rgb(255, 255, 0);"><?=$plans[2]['mariachis']?> Mariachis</span>
               </li>
             <?php foreach($services as $service) : 
								if($plans[2]['id'] === $service['plan_id']) { 	
										if($service['hour'] == 1){	?>
												<li class="open_modal" plan_id="<?=$service['plan_id']?>" service_id="<?=$service['id']?>">
				                  <p>$<?=$service['price']?>/<?=$service['hour']?>hour</p>
				                </li>
							<?php }else{ ?>
												 <li class="open_modal"  plan_id="<?=$service['plan_id']?>" service_id="<?=$service['id']?>">
				                  <p>$<?=$service['price']?>/<?=$service['hour']?>hour</p>
				                  <span class="orange">$<?=$service['price']/2?>/hour</span>
				               	</li>	
								<?php }	?>
							<?php }	?>
						<?php endforeach; 	?>
            </ul>
			
			
					<div class="left_right_imges">
					  <img class="content-over-img img-1" src="<?=base_url()?>assets/root_folder/images/jasmine_2.png">
						<img  class="content-over-img img-2"src="<?=base_url()?>assets/root_folder/images/jasmine_1.png">
					</div>
      </div>
      </div>
	<?php else: ?>
	  <div class="container">
	      <div class="onlineBookingBtnCont">
	        <button class="onlineBookingBtn btn">Online Booking</button>
	      </div>
	  </div>
	<?php endif; ?>
	  <div class="container">
		  <div class="social_icon si">
		  <a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a>
		  <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
		  <a href=""><i class="fa fa-linkedin" aria-hidden="true"></i></a>
		  </div>
	  </div>

<!-- start enter_email modal -->
	 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog booking_steps_contMD">

	  <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
          <div class="booking_steps_cont">
              <h2>We make Booking <span>EASY</span>!</h2>
              <ol>
                  <li><span>1</span>Verify Email.</li>
                  <li><span>2</span>Select Pricing & Hours.</li>
                  <li><span>3</span>Schedule Event Details.</li>
                  <li><span>4</span>Sign Contract and<br> pay 50% Deposit.</li>
              </ol>
              <button class="ok_btn">OK</button>
          </div>
          <div class="main-div" style="display:none">
            <!--<div class="image">
              <img src="<=base_url('assets/root_folder/images/webiste_logo.png')?>"/>
            </div>-->
            <form class="form" method="post" id="email_form">
              <!--<label class="label text-center" for="name">Please Verify Your Email.</label>-->
              <h3 class="email_form_heading">"Welcome! To begin please enter your <span>email</span>, and <span>type of event.</span>"</h3>
              <label class="label" for="name">Event*</label>
              <select name="event" id="event">
                <option value="">Select Event</option>
                <option value="Birthday Party">Birthday Party</option>
                <option value="Anniversary">Anniversary</option>
                <option value="Quinncenera or Sweet 16">Quinncenera or Sweet 16</option>
                <option value="Wedding">Wedding</option>
                <option value="Graduation">Graduation</option>
                <option value="Funeral">Funeral</option>
                <option value="Celebration">Celebration</option>
                <option value="Other">Other</option>
              </select>
              <div class="text-danger ef_errors" id="event_error"></div>
              <label class="label" for="name">Name*</label>
              <input type="text" id="name" name="name" autofocus>
              <div class="text-danger ef_errors" id="name_error"></div>
              <label class="label" for="email">Email*</label>
              <input type="text" id="email" name="email">
              <div class="text-danger ef_errors" id="email_error"></div>
              <div class="form-btn">
                <button class="btn " id="email_submit_button">Submit</button>
                <button type="button" data-dismiss="modal" class="btn">Close</button>
              </div>
            </form>
          </div>
          <div class="email_sent_popup">
              <h2>Thank You!<br>An email has been sent to</h2>
              <p class="email_field"></p>
              <button>Close</button>
          </div>

        </div>
      </div>
    </div>
  </div>
<!-- end enter_email modal -->

<!-- start email verification status success message modal -->
<?php if($this->session->userdata('email_verification_status')): ?>
  <div class="modal fade" id="email_veri_success_modal" role="dialog">
    <div class="modal-dialog">

      <div class="modal-content">
        <div class="modal-body">
            <div id="evssmm">
                <div class="image">
                  <img src="<?=base_url('assets/root_folder/images/webiste_logo.png')?>"/>
                </div>
                <h2>Thank You for Verifying Your<br>Email!</h2>
                <button>Continue Booking</button>
            </div>
        </div>
      </div>
      
    </div>
  </div>
 <?php $this->session->unset_userdata('email_verification_status');
    endif; ?>
<!-- end email verification status success message modal -->

<!-- start contract sent success message modal -->
  <div class="modal fade" id="cont_sent_thank_msg" role="dialog">
    <div class="modal-dialog">

      <div class="modal-content">
        <div class="modal-body">
            <div id="cstm">
                <h3>
                    <span>Thank You Scheduling your Event!</span>
                    <span>We are double checking our availability and creating your booking contract.</span>
                    <span>We will email you soon!</span>
                </h3>
                <button>Close</button>
            </div>
        </div>
      </div>
      
    </div>
  </div>
<!-- end contract sent success message modal -->

<!-- start booking modal -->

<!-- Modal -->
<div id="booking_modal" class="modal fade" role="dialog">
  <div class="modal-dialog" id="booking_modal_dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <div class="middle_box">
        
	        <div class="width94 booking_sec" id="date_time_sec">
	            <div class="row">
	                <div class="col-md-6">
	                    <h3 class="select_sec">Select a day </h3>
	                    <div id="datepicker" class="date_view">
	                    </div>
	                </div>
	                <div class="col-md-6">
	                    <h3 class="select_sec time" >Select a time </h3>
	                    <div class="full_sec">
	                        <form role="form">
	                            <div class="container-fluid">
	                                <div class="row">
	                                    <!-- <h1>Select Time</h1> -->
	                                    <div class="col-xs-12" id="all_timings">
	                                    </div>
	                                </div>
	                            </div>
	                        </form>
	                    </div>
	                </div>
	            </div>
	        </div>

          <div id="booking_form"></div>
          <div id="confirm_booking_form"></div>
      
    		</div>
      </div>
    </div>

  </div>
</div>
<!-- end booking modal -->

<!-- <input id="searchInput" class="controls" type="text" placeholder="Enter a location">
  <div id="map" style="height: 500px;"></div>
  <ul class="geo-data">
      <li>Full Address: <span id="location"></span></li>
      <li>Postal Code: <span id="postal_code"></span></li>
      <li>Country: <span id="country"></span></li>
      <li>Latitude: <span id="lat"></span></li>
      <li>Longitude: <span id="lon"></span></li>
  </ul> -->

<script>
$(document).ready(function(){
    $('.onlineBookingBtn').click(function(){
        $("#myModal").modal();
    });
    $('.booking_steps_cont .ok_btn').click(function(){
        $('.booking_steps_cont').fadeOut().closest('.modal-dialog').removeClass('booking_steps_contMD');
        setTimeout(function(){
            $('.booking_steps_cont').next('.main-div').fadeIn().closest('.modal-dialog').addClass('main-divMD');
        },500);
    });
    
    $('#email_veri_success_modal').modal('show');
    $('#email_veri_success_modal #evssmm button').click(function(){
        $('#email_veri_success_modal').modal('hide');
    });
    
  $(".open_modal").click(function(){
    if('<?=$this->session->userdata('email_id') && $this->session->userdata('user_id') != 1?>')
    {
      window.location = '<?=base_url('create_booking/'.urlencode($this->session->userdata('email_id')))?>/'+$(this).attr('service_id');
    }
  });

  if('<?=$create_booking ?? false?>')
  {
  	$("#booking_modal").modal('show');
  }

  $('#datepicker').datepicker({
    startDate: '+1d',
    endDate: '+91d'
  })
    .on('changeDate', function() {

     var service_hour = '<?=$service_hour ?? ''?>';
     // alert(service_hour);
  		//$('#all_timings').text(convert_date($('#datepicker').datepicker('getDate')));
      var selected_date = convert_date($('#datepicker').datepicker('getDate'));
       // selected_date = selected_date.toString();
       var sel_day = $('#datepicker').datepicker('getDate');
       sel_day = sel_day.toString().substring(0, 3);
       // alert(sel_day.substring(0, 3));
  		$.ajax({
  			url:'<?=base_url('bookings/get_timings')?>',
  			method: 'post',
        data:{service_id: '<?=$service_id ?? ''?>', selected_date: selected_date},
  			datatype: 'json',
        beforeSend:function()
        {
          $('#all_timings').html('<span style="color:rgb(255, 191, 77);font-size:16px;padding-right:80px; ">loading...</span>');
        },
  			success: function(res)
  			{
  				// console.log(res);
  				var data = JSON.parse(res);
  				var data1 = '';//+'"'+,+'"'+date+"


  				data.timings.forEach(function(item, index){
             
          if(data.fri_sat_st[index])
              data1 += '<div><p id=change_plan_confirmation class="timings disabled_timings btn btn-default m-2">'+item+'</p></div>';
            else            
  						data1 += '<div><p onclick=confirm_date_time("'+encodeURIComponent(item)+','+selected_date+'") class="timings btn btn-default m-2">'+item+'</p></div>';
  					});

  				$('#all_timings').hide().fadeIn('slow').html(data1);
  			}
  		});
    });

      $(document).on('change click','#back_button', function(){ 
        //alert('aa gya');
         $('#booking_form').fadeOut(500);
         $('#date_time_sec').fadeIn(500);
      });

       $(document).on('change click','#confirm_back_button', function(){ 
        //alert('aa gya');
         $('#booking_form').fadeIn(500);
         $('#confirm_page').fadeOut(500);
      });

      $(document).on('change click','#send_contract_request', function(){ 
        $('#status').val('complete');
        $('#booking_form').submit();
      });

      $(document).on('change click','#restart_event_booking', function(){ 
        window.location = '<?=base_url()?>';
      });

      $(document).on('change click','#change_plan_confirmation', function(){ 
        if(confirm('"Bookings that start anytime from 4:00-7:00pm on Fridays and Saturdays require a 2-hour minimum booking. \nPress ok to change plan.'))
          window.location = '<?=base_url()?>';
        else
          return false;
      });
      
      /*$(document).on('change click','#booking_cancel', function(){ 
        window.location = '<=base_url('log_out')?>';
      });*/

    $('#booking_form').on('submit', function(e){
      e.preventDefault();
      // alert('okk');
      $(window).keydown(function(event){
        if(event.keyCode == 13) {
          event.preventDefault();
          return false;
        }
      });
      
      $.ajax({
        url:'<?=base_url('create_booking')?>',
        method:'post',
        data: $('#booking_form input,textarea').serialize(),
        datatype:'json',
        beforeSend:function()
        {
          $('#booking_form #submit_booking_form').attr('disabled',true);
          $('#confirm_booking_form #send_contract_request').attr('disabled',true);
        },
        success: function(res)
        {
          //console.log(res);
          var data = JSON.parse(res);
          if(data.status === 'continue')
          {
            $('#booking_form').fadeOut(500);
            $('#confirm_booking_form').html(''+
              '<div id="confirm_page">'+
                '<div id="confirm_back_button"><i class="fa fa-arrow-left" aria-hidden="true"></i></div>'+
                '<div id="confirm_page_body">'+
                  '<p><span id="title">Event:- </span><span id="content">'+data.event+'.</span></p>'+
                  '<p><span id="title">Date:- </span><span id="content">'+data.date+'</span></p>'+
                  '<p><span id="title">Time Slot:- </span><span id="content">'+data.time+'</span></p>'+
                  '<p><span id="title">Address:- </span><span id="content">'+data.address+'.</span></p>'+
                  '<p><span id="title">Musicians:- </span><span id="content">'+data.musicians+' mariachis.</span></p>'+
                  '<p><span id="title">Total Price:- </span><span id="content">$'+data.total_price+'</span></p>'+
                '</div>'+
                '<div id = "confirm_page_button">'+
                  '<button class="btn confirm_booking_request" id="send_contract_request">Send Contract Request</button>'+
                  '<button class="btn confirm_booking_request" id="restart_event_booking">Restart Event Booking</button>'+
                '</div>'+
                '<div id="payment_note" style="color:rgb(178, 225, 8);text-align:center;font-size:13px;"><p>You must pay 50% of the total fee at the signing of the contract.</p></div>'+
              '</div>');
          }
          else if(data.status === 'admin')
             window.location.href = "<?=base_url('admin')?>";
          else if(data.status === true)
          {
             $('#booking_modal').modal('hide');
            $('#cont_sent_thank_msg').modal('show');
            $('#cont_sent_thank_msg #cstm button').click(function(){
                window.location.href = "<?=base_url()?>";
            });
          }
          else if(data.status === false)
          {
            $('#bf_mn_error').html(data.mn_error);
            $('#bf_address_error').html(data.address_error);
            $('#bf_map_error').html(data.map_error);
          }
        },
        complete: function()
        {
          $('#booking_form #submit_booking_form').attr('disabled',false);
          $('#confirm_booking_form #send_contract_request').attr('disabled',false);
        }
      });
    });


    $('#email_form').on('submit', function(e){
      e.preventDefault();

      $.ajax({
        url: "<?=base_url('submit_email/')?>",
        method: 'post',
        data: $('#email_form').serialize(),
        datatype:'json',
        beforeSend:function()
        {
          $('#email_submit_button').attr('disabled',true).text('Submitting..');
        },
        success: function(res)
        {
          var data = JSON.parse(res);
          if(data.status === 'redirect_link')
            window.location.href = data.redirect_link;
          else if(data.status === true)
          {
            //console.log(data.Password);
             $('.booking_steps_cont').next('.main-div').fadeOut().closest('.modal-dialog').removeClass('main-divMD');
             setTimeout(function(){
                $('.booking_steps_cont').next('.main-div').find('#email_form').trigger('reset');
                $('.booking_steps_cont').next('.main-div').next('.email_sent_popup').find('.email_field').text($('#email_form>#email').val());
                $('.booking_steps_cont').next('.main-div').next('.email_sent_popup').fadeIn().closest('.modal-dialog').addClass('email_sent_popupMD');
                $('.booking_steps_cont').next('.main-div').next('.email_sent_popup').find('button').click(function(){
                    $('#myModal').modal('hide');
                    $('.booking_steps_cont').next('.main-div').next('.email_sent_popup').hide();
                    $('.booking_steps_cont').fadeIn();
                    $('.booking_steps_cont').next('.main-div').next('.email_sent_popup').closest('.modal-dialog').removeClass('email_sent_popupMD').addClass('booking_steps_contMD');
                });
             },500);
          }
          else if(data.status === false)
          {
            $('#event_error').html(data.event_error);
            $('#name_error').html(data.name_error);
            $('#email_error').html(data.email_error);
          }
          else
          {
            $("#myModal").modal('hide');
            $('#email_form').trigger('reset');
            alert(data.status);
          }
        },
        complete:function()
        {
          $('#email_submit_button').attr('disabled',false).text('Submit');
        }
      });
    });

});

function confirm_date_time(dt)
{
  $.ajax({
    url: '<?=base_url('load_booking_form')?>',
    method: 'post',
    data: {date_time: decodeURIComponent(dt) , service_id:'<?=$service_id ?? ''?>'},
    datatype: 'json',
    success: function(res)
    {
      // console.log(res);
      var data = JSON.parse(res);
       $('#date_time_sec').hide();
      $('#booking_form').html(data.booking_form).fadeIn(500);
       $('#date_time').val(decodeURIComponent(dt));
       $('#bf_email').val('<?=$email ?? ''?>');
       $('#selected_service_id').val('<?=$service_id ?? ''?>');

       $('#musicians_hour_price').html(data.musicians+' Mariachis - </*i*/ class="fa fa-clock-o" aria-hidden="true"></i>'+data.hours+' Hour - $'+data.price);

       $('#date_time_from_to').html(data.start_time+' to '+data.end_time+', Date:- '+data.date);
      // console.log(res);

      if(window.google)
      {
        initMap();
      }
      else
      {
        var scriptt   = document.createElement("script");
        scriptt.type  = "text/javascript";
        scriptt.src   = "https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBXrrmJoy5KP_GlZLL496_EtatL6walIUg&callback=initMap";    // use this for linked script
        scriptt.async = true;
        scriptt.defer = true;
        $('head').append(scriptt);
      }
      
      $('#booking_form #chooseOnMap').change(function(){
       if($('#booking_form #chooseOnMap').is(':checked'))
       {
          locationPickerFun();
          $('#booking_form form .geo-data .chooseonmap_false').hide();
          $('#booking_form form .geo-data .chooseonmap_true').fadeIn();
          $('#booking_form form #confirmPosition').fadeIn();
           
       }
       else if($('#booking_form #chooseOnMap').is(":not(:checked)"))
       {
           $('#booking_form #map').removeClass('location-picker');
           $('#booking_form form #confirmPosition').hide();
           $('#booking_form form .geo-data .chooseonmap_false').fadeIn();
          $('#booking_form form .geo-data .chooseonmap_true').hide();
          
          initMap();
          
        }
    });

      
    }
  });
}

function convert_date(str) {
  var date = new Date(str),
    mnth = ("0" + (date.getMonth() + 1)).slice(-2),
    day = ("0" + date.getDate()).slice(-2);
  return [day, mnth, date.getFullYear()].join("-");
}

</script>

<!-- <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBXrrmJoy5KP_GlZLL496_EtatL6walIUg&callback=initMap" async="" defer=""></script> -->
<!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXrrmJoy5KP_GlZLL496_EtatL6walIUg"></script>-->
<script src="<?=base_url('assets/location_picker/location_picker.js')?>"></script>

<script>
    var gMapLat = 39.0561219;
    var gMapLng = -98.53645589999999;
    var gMapZoom = 4;
    var marker;

  $(function(){
    
});

  function initMap() 
  {
    var map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: gMapLat, lng: gMapLng},
      zoom: gMapZoom
    });
    
    var input = document.getElementById('searchInput');
    // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
    google.maps.event.addDomListener(input, 'keydown', function(event) { 
        if (event.keyCode === 13) { 
            event.preventDefault(); 
        }
      });     
    if( $('#booking_form #latitude').val() != '' )
    {
        marker = new google.maps.Marker({
          position: {lat: gMapLat, lng: gMapLng},
          map: map,
          animation: google.maps.Animation.DROP
        });
        marker.addListener('mouseover', toggleBounce);
        
        marker.setIcon(({
            url: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png',
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(45, 45)
        }));
    }
    
    var autocomplete = new google.maps.places.Autocomplete(input, {
       types: ['geocode'],
        componentRestrictions: {
            country: "USA"
        }
    });
    autocomplete.bindTo('bounds', map);

    autocomplete.addListener('place_changed', function() {
        if(marker != undefined)
            marker.setMap(null);        //to remove old marker
        // input.value = '';
        var infowindow = new google.maps.InfoWindow();
        marker = new google.maps.Marker({
            map: map,
            animation: google.maps.Animation.DROP,
            anchorPoint: new google.maps.Point(0, -29)
        });
        marker.addListener('mouseover', toggleBounce);
        
        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
        }
        
        gMapZoom = 10;
        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(gMapZoom);
        }
        marker.setIcon(({
            url: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png',
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(45, 45)
        }));
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);
        map.setZoom(gMapZoom);
        map.setCenter(place.geometry.location);
        
        var address = '';
        if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
        }
    
        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
        infowindow.open(map, marker);
      
        // Location details
        for (var i = 0; i < place.address_components.length; i++) {
            if(place.address_components[i].types[0] == 'postal_code'){
                document.querySelector('#booking_form #postal_code').innerHTML = place.address_components[i].long_name;
            }
            if(place.address_components[i].types[0] == 'country'){
                document.querySelector('#booking_form #country').innerHTML = place.address_components[i].long_name;
            }
        }
        document.querySelector('#booking_form #location').innerHTML = place.formatted_address;
        /*document.getElementById('lat').innerHTML = place.geometry.location.lat();
        document.getElementById('lon').innerHTML = place.geometry.location.lng();*/
        $('#booking_form #latitude').val(place.geometry.location.lat());
        $('#booking_form #longitude').val(place.geometry.location.lng());
        
        gMapLat = place.geometry.location.lat();
        gMapLng = place.geometry.location.lng();
        
        if($('#booking_form #chooseOnMap').is(':checked'))
           locationPickerFun(); 
    });
    
}

function toggleBounce() {
  if (marker.getAnimation() !== null) {
    marker.setAnimation(null);
  } else {
    marker.setAnimation(google.maps.Animation.BOUNCE);
  }
}

function locationPickerFun()
{
    var lp = new locationPicker(document.getElementById('map'), {
            setCurrentPosition: true, // You can omit this, defaults to true
            lat: gMapLat,
            lng: gMapLng
          },{
              zoom: gMapZoom // You can set any google map options here, zoom defaults to 15
          });
          
      // Listen to map idle event, listening to idle event more accurate than listening to ondrag event
      google.maps.event.addListener(lp.map, 'idle', function (event) {
        // Get current location and show it in HTML
        var location = lp.getMarkerPosition();
        document.getElementById('onIdlePositionView').innerHTML = 'Latitude > ' + location.lat + ', Longitude > ' + location.lng;
      });
      
        // Listen to button onclick event
      document.getElementById('confirmPosition').onclick = function (e) {
          e.preventDefault();
        // Get current location and show it in HTML
        var location = lp.getMarkerPosition();
        // document.getElementById('onClickPositionView').innerHTML = 'Latitude = ' + location.lat + ', Longitude = ' + location.lng;
        $('#booking_form form .geo-data #onClickPositionView').html('Latitude > ' + location.lat + ', Longitude > ' + location.lng).promise().then(function(){
            $(this).closest('li').hide().fadeIn();
        });
        
        $('#booking_form #latitude').val(location.lat);
        $('#booking_form #longitude').val(location.lng);
        
        gMapLat = location.lat;
        gMapLng = location.lng;
      };
    
}

</script>
<!-- end google autocomplete address api-->