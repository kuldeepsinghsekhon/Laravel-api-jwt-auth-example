<?php

	class Bookings extends MY_Controller
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function index()
		{
			
		}
		
		public function get_timings()
		{
			date_default_timezone_set("Asia/Calcutta");
			$service_id = $this->input->post('service_id');
			$selected_date = $this->input->post('selected_date');
			$selected_day = date('w', strtotime($selected_date));
			$google_start_date = date('c', strtotime($selected_date));
			$google_end_date = date('c', strtotime('+1 days', strtotime($google_start_date)));

			$events = $this->google_calendar($google_start_date, $google_end_date);
			
			$service_data = $this->service_model->get_services(array('id'=>$service_id));
			$db_timings1 = $this->booking_model->get_timings(array('date_of_event'=>$selected_date ?? '', 'status !='=>'canceled'));

			$db_timings = [];
			$db_tmg_key = 0;
			if(count($db_timings1))
			{
				foreach ($db_timings1 as $timing) 
				{
					$db_timing2[] = explode(' - ', $timing['time']);
				}
				foreach ($db_timing2 as $key=>$val) 
				{
					$db_timings[$db_tmg_key][0] = strtotime(date('H:i', strtotime($val[0])));
					$db_timings[$db_tmg_key][1] = strtotime(date('H:i', strtotime($val[1])));
					$db_tmg_key++;
				}
			}
			if($events)
			{
				foreach($events as $event)
				{
					$db_timings[$db_tmg_key][0] = strtotime(date('H:i', strtotime($event['start'])));
					$db_timings[$db_tmg_key][1] = strtotime(date('H:i', strtotime($event['end'])));
					$db_tmg_key++;
				}
			}
			
			$interval_in_minutes = 30;

			$hours = floor($interval_in_minutes/60);
			$minutes = $interval_in_minutes%60;						//minutes;

			if(date('d-m-Y') === $selected_date)
				$start_time = strtotime('+'.$hours.' hour', strtotime(date('H').':00'));
			else
				$start_time = strtotime("12:00");

			$end_time = strtotime("24:00");

			$timing_key = 0;
			for($i = $start_time; ($cond = strtotime('+'.$service_data[0]['hour'].' hour +00 minutes', $i)) <= $end_time ; $i = strtotime('+'.$hours.' hour +'.$minutes.' minutes', $i) )
			{ 
				if(count($db_timings))
				{
					$status = FALSE;
					foreach($db_timings as $db_timing)
					{	
						unset($skip_time_array);
						for($k = $db_timing[0]; $k <= $db_timing[1]; $k = strtotime('+'.$hours.' hour +'.$minutes.' minutes', $k ) )
						{
							$skip_time_array[] = $k;
						}
	
						if(!($cond > $skip_time_array[0]))
							continue;
						
						for($j = $i; $j <= $cond; $j = strtotime('+'.$hours.' hour +'.$minutes.' minutes', $j) )
						{
							if( in_array($j, $skip_time_array) && $cond != $skip_time_array[0] && $j != end($skip_time_array) )		//"end" function = fetch last value of an array.
							{	
								$status = TRUE;
								break 2;
							}
						}
					}
	
					if($status)	continue;
				}

				$fri_sat_st = ( 
					($selected_day == 5 || $selected_day == 6)
					 && 
					 $service_data[0]['hour'] <= 1
					  && 
					  ( 
					  	($i >= strtotime("16:00") && $i < strtotime("18:00"))
					  	 || 
					  	 ($cond > strtotime("16:00") && $cond <= strtotime("18:00"))
					  	  ) 
					) ? true : false ;
				// $fri_sat_st = ( ($cond > strtotime("16:00") && $cond < strtotime("18:00")) && $i >=  ) ? true : false ;

				$timings['fri_sat_st'][$timing_key] = $fri_sat_st;
				$timings['timings'][$timing_key] = date('h:i a', $i ).' - '.date('h:i a', strtotime('+'.$service_data[0]['hour'].' hour + 00 minutes', $i) );

				$timing_key++;
			}
			
			echo json_encode($timings);
		}

		public function check_timing()
		{ 

			date_default_timezone_set("Asia/Calcutta");
			$service_data = $this->service_model->get_services(array('id'=>3));
			$db_timings1 = $this->booking_model->get_timings(array('date_of_event'=>'19-02-2020', 'status !='=>'disapproved'));
			// echo '<pre>';print_r($db_timings1);die;
			$db_timings = [];
			foreach ($db_timings1 as $timing) 
			{
				$db_timing2[] = explode(' - ', $timing['time']);
				
			}
			foreach ($db_timing2 as $key=>$val) 
			{
				$db_timings[$key][0] = strtotime(date('H:i', strtotime($val[0])));
				$db_timings[$key][1] = strtotime(date('H:i', strtotime($val[1])));
				// echo 'start_time '.$val[0].'<br>';
				// echo 'end_time '.$val[1].'<br><br>';
			}
			// echo '<pre>';print_r($db_timings);die;
			/*foreach($db_timings as $timing)
			{
				echo date('H:i',$timing[0]).'<br>';
				echo date('H:i',$timing[1]).'<br><br>';				
			}die;*/
			
			$skip_start_time = strtotime('13:00');/*echo strlen($skip_start_time);die;*/
			$skip_end_time = strtotime('15:00');

			$start_time = strtotime("12:00");
			$end_time = strtotime("23:00");
			$interval_in_minutes = 60;

			$hours = floor($interval_in_minutes/60);
			$minutes = $interval_in_minutes%60;						//minutes;
	
			for($i = $start_time; $end_time >= ($cond = strtotime('+ '.$service_data[0]['hour'].' hour + 00 minutes',$i)); $i = strtotime('+ '.$hours.' hour + 00 minutes', $i) )
			{ 	
				$status = FALSE;
				foreach($db_timings as $db_timing)
				{	
					// echo 'start_time '.date('h:i a',$db_timing[0]).'<br>';
					// echo 'end_time '.date('h:i a',strtotime($db_timing[1])).'<br><br>';
					unset($skip_time_array);
					for($k = $db_timing[0]; $k <= $db_timing[1]; $k = strtotime('+'.$hours.' hour +'.$minutes.' minutes', $k ) )
					{
						$skip_time_array[] = $k;
					}
					 // echo '<pre>';print_r($skip_time_array);die;

					if(!($cond > $skip_time_array[0]))
						continue;
					
					for($j = $i; $j <= $cond; $j = strtotime('+'.$hours.' hour +'.$minutes.' minutes', $j) )
					{
						if( in_array($j, $skip_time_array) && $cond != $skip_time_array[0] && $j != end($skip_time_array) )		//if you want to get last value of an array use "end" function
						{	
							$status = TRUE;
							break 2;
						}
					}
				}

				if($status)	continue;

				// $timings[] = date('h:i a', $i ).' - '.date('h:i a', strtotime('+'.$service_data[0]['hour'].' hour + 00 minutes',  $i ) );
				echo date('h:i a', $i ).' - '.date('h:i a', strtotime('+'.$service_data[0]['hour'].' hour + 00 minutes',  $i ) ).'<br>';

				// ($i = date('H:i', strtotime('+'.$hours.' hour +'.$minutes.' minutes', strtotime($i))));

			}

			// array_pop($timings);				// to delete last index and value of an array
			// echo '<pre>';
			// print_r($timings);
		}

		public function hoursRange( $lower = 0, $upper = 86400, $step = 3600, $format = 'h:i a' ) {
		    $times = array();
		    if ( empty( $format ) ) 
		    {
		        $format = 'g:i a';
		    }
		    foreach ( range( $lower, $upper, $step ) as $increment ) 
		    {
		        $increment = gmdate( 'H:i', $increment );
		        list( $hour, $minutes ) = explode( ':', $increment );
		        $date = new DateTime( $hour . ':' . $minutes );
		        $times[] = $date->format( $format );
		    }
		    return $times;
		}

		public function create_booking($email = null, $service_id = null)
		{
			if($pd = $this->input->post())
			{
				  // echo json_encode($user_data);die;
				$user_data = $this->user_model->get_user_data(array('email'=>$pd['email']));
				$service_data = $this->service_model->get_services(array('id'=>$pd['selected_service_id']));
				$plan_data = $this->plan_model->get_plans(array('id'=>$service_data[0]['plan_id']));
				$date_time_array = explode(',', $pd['date_time']);
				//set an date and time to work with
				$time = $date_time_array[0];

				$vld = array(
					array(
						'field' => 'mobile_number',
						'label' => 'Mobile Number',
						'rules' => 'required|min_length[10]|max_length[10]'
					),
					array(
						'field' => 'address',
						'label' => 'Address',
						'rules' => 'required|min_length[8]|max_length[500]'
					),
					array(
						'field' => 'latitude',
						'label' => 'Map',
						'rules' => 'required',
						'errors'=> array(
							'required' => 'Please provide map location.'
						)
					)
				);

				$this->form_validation->set_rules($vld);
				if($this->form_validation->run())
				{
					if($pd['status'] === 'complete')
					{
						$ins_data = array(
							'plan_id' => $service_data[0]['plan_id'],
							'service_id' => $service_data[0]['id'],
							'email'  => $pd['email'],
							'name' => $user_data['name'],
							'mobile_number'=>$pd['mobile_number'],
							'date_of_event' => $date_time_array[1],
							'time' => $time,
							'address' => htmlspecialchars($pd['address']),
							'latitude' => $pd['latitude'],
							'longitude' => $pd['longitude'],
							'number_of_musicians' => $plan_data[0]['mariachis'],
							'payment_before_event' => $service_data[0]['price']/2,
							'payment_after_event' => $service_data[0]['price']/2,
							'status' => 'pending'
						);

						if($this->booking_model->create_booking($ins_data))
						{
						    $this->session->unset_userdata('email_id');
						    
							if($this->session->userdata('user_id') == 1)
								$res['status'] = 'admin';
							else
								$res['status'] = true;
						}
					}
					else
					{
						$res['status'] = 'continue';
						$res['event'] = $user_data['event_type'];
						$res['time'] = $time;
						$res['date'] = $date_time_array[1];
						$res['address'] = $pd['address'];
						$res['musicians'] = $plan_data[0]['mariachis'];
						$res['total_price'] = $service_data[0]['price'];
					}	
				}
				else
				{
					$res = array(
						'status' => FALSE,
						'mn_error' => form_error('mobile_number') ?? '',
						'address_error' => form_error('address') ?? '',
						'map_error' => form_error('latitude') ?? ''
					);

				}

				echo json_encode($res);
			}
			else
			{
				if(!$this->session->userdata('email_id'))
				{
					show_404();
					die;
				}

				// $data['service_data'] = $this->service_model->get_services(array('id'=>$service_id));
				// $data['plan_data'] = $this->plan_model->get_plans(array('id'=>$data['service_data'][0]['plan_id']));
				// // print_r($plan_data);
				$data['email'] = urldecode($email);
				$data['service_id'] = $service_id;
				$data['service_hour'] = $this->db->select('hour')->get_where('services', array('id'=>$service_id))->row()->hour;
				// echo $data['service_hour'];die; 

				$data['plans'] = $this->plan_model->get_plans();
				$data['services'] = $this->service_model->get_services();
				// echo '<pre>';print_r($data['services']);die;

				$data['title'] = 'Select Desired Musicians and Hours';
				$data['create_booking']	= true;
				$this->load->view('templates/header');
				$this->load->view('services/view', $data);
				$this->load->view('templates/footer');
			}
		}

		public function load_booking_form()
		{
			//echo strtotime("2020-01-23 11:54:00");
			 //echo date("d-m-Y H:i:s", 1579780440);die;
			$pd = $this->input->post();
			$date_time = explode(',',$pd['date_time']);

			$service_data = $this->service_model->get_services(array('id'=>$pd['service_id']));
			$plan_data = $this->plan_model->get_plans(array('id'=>$service_data[0]['plan_id']));
			$data['musicians'] = $plan_data[0]['mariachis'] ?? '';
			$data['hours'] = $service_data[0]['hour'] ?? '';
			$data['price'] = $service_data[0]['price'] ?? '';
			$data['date'] = $date_time[1] ?? '';
			$data['start_time'] = $date_time[0] ?? '';
			//set timezone
			date_default_timezone_set('GMT');

			//set an date and time to work with
			$start = $date_time[0];

			//display the converted time
			$end_time = date('h:i a',strtotime('+'.$service_data[0]['hour'].' hour +00 minutes',strtotime($start)));

			$data['end_time'] = $end_time ?? '';
			 // echo json_encode($data);die;

			$data['booking_form'] = '
			 <div class="main-div">
			 <div id="back_button"><i class="fa fa-arrow-left" aria-hidden="true"></i></div>
	 			<div class="image">
          <img src="'.base_url('assets/root_folder/images/webiste_logo.png').'" />
        </div>

        <div class="booking_form_header">
	        <h4 id="band_name">Mariachi Tierra Azteca</h4>
	        <h1 class="" id="musicians_hour_price"></h1>
	        <div class="booking_date">
						<i class="fa fa-calendar-o" aria-hidden="true"></i>
						<span id="date_time_from_to"></span>
	        </div>
	        <div class="time_locaiton">
	        	<i class="fa fa-globe" aria-hidden="true"></i>
						<span>India, Sri Lanka Time</span>
	        </div>
        </div>

        <h4 id="enter_details">Enter Details</h4>
				<form method="post" class="form">
					
						<label for="mobile_number" class="label">Mobile Number:</label>
						<input type="number" name="mobile_number" id="mobile_number" class="booking_form_input" onKeyPress="if(this.value.length==10) return false;">
						<div id="bf_mn_error" class="text-danger bf_errors"></div>

						<input type="hidden" name="email" id="bf_email">
										
						<label for="address" class="label">Address:</label>
						<textarea name="address" id="address" cols="30" rows="3" class="form-control" ></textarea>
						<div id="bf_address_error" class="text-danger bf_errors"></div>
						<br>
						
						<div class="check">
						    <input type="checkbox" id="chooseOnMap">
						    <label for="chooseOnMap" class="noselect">
						        <div class="box"><i class="fa fa-check" aria-hidden="true"></i></div>
						        Choose On Map
						    </label>
						    <input id="searchInput" class="controls" type="text" placeholder="Enter a location, landmark, pin code">
                        </div>
						<div id="map"></div>
						<div id="bf_map_error" class="text-danger bf_errors"></div>
						<br><button id="confirmPosition" class="btn" style="display:none">Confirm Position</button><br>
						<ul class="geo-data">
						    <div class="chooseonmap_false">
    						    <li>Full Address: <span id="location"></span></li>
    						    <li>Postal Code: <span id="postal_code"></span></li>
    						    <li>Country: <span id="country"></span></li>
						    </div>
						    <div class="chooseonmap_true" style="display:none;">
    						    <li>The idle location is: <span id="onIdlePositionView"></span></li>
    						    <li>The chosen location is: <span id="onClickPositionView"></span></li>
						    </div>
						</ul>

						<input type="hidden" name="latitude" id="latitude">
						<input type="hidden" name="longitude" id="longitude">
						<input type="hidden" name="status" id="status" value="incomplete">
						<input type="hidden" name="date_time" id="date_time" >
						<input type="hidden" name="selected_service_id" id="selected_service_id" >
			
						<div class="form-btn">
              <button type="submit" class="btn " id="submit_booking_form">Continue</button>
              <button type="button" data-dismiss="modal" class="btn">Close</button>
            </div>
					
				</form>
				</div>
			';
			echo json_encode($data);
		}

		public function booking_requests()
		{
			if(!$this->session->userdata('user_id'))
				redirect(base_url('admin'));
			$body = '';

			$booking_requests = $this->booking_model->get_bookings(array('status'=>'pending'));
			// echo '<pre>';print_r($booking_requests);die;

			if($booking_requests ?? FALSE) :
				foreach($booking_requests as $booking_request) : 
					$plan_name = $this->db->select('plan_name')->get_where('plans', array('id'=>$booking_request['plan_id']))->row()->plan_name;

					$body .=
						'<tr id="tr'.$booking_request['id'].'">
							<td class="text-nowrap">
								<a href="'.base_url('booking/'.urlencode($booking_request['email']).'/'.$booking_request['id']).'" class="btn-sm btn-info">view</a>
								<a href="'.base_url('send_contract/'.urlencode($booking_request['email']).'/'.$booking_request['id']).'" class="btn-sm btn-success">Send Contract</a>
								<a href="'.base_url('cancel_booking_request/'.$booking_request['id']).'" class="btn-sm btn-danger">Cancel</a>
							</td>
							<td>'.$booking_request['email'].'</td>
							<td>'.$booking_request['name'].'</td>
							<td>'.$booking_request['date_of_event'].'</td>
							<td class="text-nowrap">'.$booking_request['time'].'</td>
							<td>'.substr(htmlspecialchars_decode($booking_request['address']),0,20).'</td>
							<td>'.$booking_request['payment_before_event'].'</td>
							<td>'.$booking_request['payment_after_event'].'</td>
							<td>'.$plan_name.'</td>
							<td>'.$booking_request['number_of_musicians'].'</td>
						</tr>';
			 endforeach; 
		 endif;

		 $data['tbody'] = $body;

			if($pd = $this->input->post())
			{

			}
			else
			{
				$data['title'] = 'Booking Requests';
				$this->load->view('admin/header');
				$this->load->view('bookings/booking_requests', $data);
				$this->load->view('admin/footer');
			}
		}

		public function view($email_id, $booking_id)
		{
				$data['booking_data'] = $this->booking_model->get_bookings(array('id'=>$booking_id));
				$data['booking_id'] = $booking_id;
				$data['email_id'] = $email_id;
				$data['view_for_admin'] = true;
				$this->load->view('bookings/view', $data);
		}

		public function save_client_signature()
		{
			// echo 'response okkkkkk<br>';
			$booking_id = $this->session->userdata('booking_id');
			$client_signature = $this->input->post('signature64');

			if($this->booking_model->save_client_signature(array('client_signature'=>$client_signature), array('id'=>$booking_id)))
				echo json_encode(array('status'=>true));
			else
				echo json_encode(array('status'=>false));
		}

		public function google_calendar($min_date = null, $max_date = null)
		{
			require './vendor/google_calendar/google/autoload.php';

			$client = new Google_Client();
	    $client->setApplicationName('Google Calendar API PHP Quickstart');
	    $client->setScopes(Google_Service_Calendar::CALENDAR);
	    $client->setAuthConfig('./vendor/google_calendar/credentials.json');
	    $client->setPrompt('select_account consent');

	    // Load previously authorized token from a file, if it exists.
	    // The file token.json stores the user's access and refresh tokens, and is
	    // created automatically when the authorization flow completes for the first
	    // time.
	    $tokenPath = './vendor/google_calendar/token.json';
	    if (file_exists($tokenPath)) {
	        $accessToken = json_decode(file_get_contents($tokenPath), true);
	        $client->setAccessToken($accessToken);
	    }

	    // If there is no previous token or it's expired.
	    if ($client->isAccessTokenExpired()) {
	        // Refresh the token if possible, else fetch a new one.
	        if ($client->getRefreshToken()) {
	            $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
	        } 
	        else 
	        {
	            // Request authorization from the user.
	            $authUrl = $client->createAuthUrl();
	            printf("Open the following link in your browser:\n%s\n", $authUrl);
	            print 'Enter verification code: ';
	            $authCode = trim(fgets(STDIN));

	            // Exchange authorization code for an access token.
	            $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
	            $client->setAccessToken($accessToken);

	            // Check to see if there was an error.
	            if (array_key_exists('error', $accessToken)) {
	                throw new Exception(join(', ', $accessToken));
	            }
	        }
	        
	        file_put_contents($tokenPath, json_encode($client->getAccessToken()));
	    }

	    $service = new Google_Service_Calendar($client);

			// Print the next 10 events on the user's calendar.
			$calendarId = 'primary';
			$optParams = array(
			  'orderBy' => 'startTime',
			  'singleEvents' => true,
			  'timeMin' => $min_date,
			  'timeMax' => $max_date
			);
			$results = $service->events->listEvents($calendarId, $optParams);
			$events = $results->getItems();

			if (empty($events)) 
			{
			    return false;
			} 
			else 
			{
		    // print "Upcoming events:\n";
		    $inc = 0;
		    foreach ($events as $event) 
		    {
		        $start = $event->start->dateTime;
		        $end = $event->end->dateTime;
		        if (empty($start)) 
		        {
		            $start = $event->start->date; 
		        }
		        
		        $event_data[$inc]['name'] = $event->getSummary();
		        $event_data[$inc]['start'] = $start;
		        $event_data[$inc]['end'] = $end;

		        $inc++;
		    }

		    return $event_data;
			}
		}


	}

?>