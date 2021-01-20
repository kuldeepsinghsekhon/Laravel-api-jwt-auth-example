<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

	}

	public function submit_email($plan_id = null, $service_id = null)
	{ //echo json_encode($this->input->post());die;
		if($pd = $this->input->post())
		{
			$vld = array(
				array(
					'field' => 'event',
					'label' => 'Event',
					'rules' => 'required'
				),
				array(
					'field' => 'email',
					'label' => 'Email',
					'rules' => 'required|valid_email'
				),
				array(
					'field' => 'name',
					'label' => 'Name',
					'rules' => 'trim|required|min_length[2]|max_length[50]'
				)
			);

			$this->form_validation->set_rules($vld);

			if($this->form_validation->run())
			{
				$config = array(
			    //'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
			    'smtp_host' => 'in-v3.mailjet.com', 
			    'smtp_port' => 587,
			    'smtp_user' => 'a63f9f06d525f9ec6270729a89704cfe',
			    'smtp_pass' => '34a8564fc34463f7563679c4efc34bee',
			    'smtp_crypto' => 'tls', //can be 'ssl' or 'tls' for example
			    'mailtype' => 'text', //plaintext 'text' mails or 'html'
			    'smtp_timeout' => '4', //in seconds
			    'charset' => 'iso-8859-1',
			    'wordwrap' => TRUE
			);
				$this->load->library('email',$config);

				$user_password = uniqid();
				// $config['protocol'] = 'ssmtp';
				// $config['smtp_host'] = 'ssl://ssmtp.gmail.com';
				// $this->email->initialize($config);

				$this->email->from('admin@turquoiseinnovative.com', 'AQUATECINNOVATIVE');
				$this->email->to($pd['email']);
				$this->email->cc('');
				$this->email->bcc('');
				
				$this->email->subject('Email Verification link');
				$this->email->message('Hello '.$pd['name'].','.PHP_EOL.PHP_EOL.'click on the below link for email verification:-'.PHP_EOL.base_url('sign_up/'.urlencode($pd['email']).'/'.$user_password));

				$verification_link = base_url('sign_up/'.urlencode($pd['email']).'/'.$user_password);
				
				$ins_data = array(
						'event_type'=> $pd['event'],
						'name' => $pd['name'],
						'password'=>password_hash($user_password, PASSWORD_BCRYPT),
						'status'=> 0
					);

				if($check_email = $this->db->select('id')->get_where('users',array('email'=>$pd['email']))->row_array())
				{
					if($this->user_model->update_data($ins_data, array('email'=>$pd['email'])))
					{
						if($this->session->userdata('user_id') == 1)
						{	
							$res = array(
								'status' => 'redirect_link',
								'redirect_link' => $verification_link
							);
						}
						elseif($this->email->send())
						{
							
							$res = array(
									'status' => true
								);
						}
						else
							$res = array(
									'status' => 'Error...! Try Again.'
								);
					}
					else
						$res = array(
									'status' => 'Error...! Try Again.'
								);
				}
				else
				{
					$ins_data['email'] = $pd['email'];

					if($this->user_model->insert_data($ins_data))
					{
						if($this->email->send())
						{
							$res = array(
									'status' => true
								);
						}
						else
							$res = array(
									'status' => 'Error...! Try Again.'
								);
					}
					else
						$res = array(
									'status' => 'Error...! Try Again.'
								);
				}

			}
			else
			{
				$res = array(
					'status' => false,
					'event_error'=>form_error('event'),
					'email_error'=>form_error('email'),
					'name_error'=>form_error('name'),
				);
			}

			echo json_encode($res);
		}

	}

	public function verify_email($email, $password, $plan_id = null, $service_id = null)
	{
		$email = urldecode($email);
		if(password_verify($password, $this->db->select('password')->get_where('users',array('email'=>$email))->row()->password))
		{
			if($this->db->select('status')->get_where('users',array('email'=>$email))->row()->status ?? 0 === 1)
			{
				/*if($this->db->select('status')->get_where('bookings',array('email'=>$email))->row()->status ?? 0 === 'pending'
				  &&
				  $this->db->select('payment_status')->get_where('bookings',array('email'=>$email))->row()->payment_status ?? 0 === 'pending')*/

				  //echo '<script>alert("Already Verified")</script>';
				$this->session->set_userdata(array(
					'email_id' => $email
				));
				// redirect(base_url('create_booking/'.urlencode($email).'/'.$service_id));
				redirect(base_url());
				die;
			}
			elseif($this->db->update('users', array('status'=> 1), array('email'=>$email)))
			{
				$this->session->set_userdata(array(
					'email_id' => $email,
					'email_verification_status' => true
				));
				// redirect(base_url('create_booking/'.urlencode($email).'/'.$service_id));
				redirect(base_url());
				die;
			}
			else
				echo '<script>alert("Error Occur..! Try Again.")</script>';
		}
		else
		{
			// echo 'password not verified';
			echo '<script>alert("Link Expired")</script>';
			redirect(base_url());
			// echo '<a href="'.base_url().'" class="btn btn-primary">Home</a>';
		}
	}

	public function send_contract($email_id, $booking_id)
	{
		$email_id = urldecode($email_id);
				$config = array(
			    //'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
			    'smtp_host' => 'in-v3.mailjet.com', 
			    'smtp_port' => 587,
			    'smtp_user' => 'a63f9f06d525f9ec6270729a89704cfe',
			    'smtp_pass' => '34a8564fc34463f7563679c4efc34bee',
			    'smtp_crypto' => 'tls', //can be 'ssl' or 'tls' for example
			    'mailtype' => 'text', //plaintext 'text' mails or 'html'
			    'smtp_timeout' => '4', //in seconds
			    'charset' => 'iso-8859-1',
			    'wordwrap' => TRUE
			);
				$this->load->library('email',$config);

				$contract_id = uniqid();
				
				$this->email->from('admin@turquoiseinnovative.com', 'AQUATECINNOVATIVE');
				$this->email->to($email_id);
				$this->email->cc('');
				$this->email->bcc('');

				$this->email->subject('Contract');
				$this->email->message('click on the link to open contract'.PHP_EOL.base_url('contract/'.urlencode($email_id).'/'.$booking_id.'/'.$contract_id));
				
				if($this->booking_model->update_booking(array('status'=>'approved', 'contract_id'=>$contract_id), array('id'=>$booking_id)))
				{
					if($this->email->send())
					{
						$this->session->set_flashdata('contract_sent', 'Contract Sent to "'.$email_id.'"');
						redirect(base_url('booking_requests'));
					}
				}
							
	}

	public function verify_contract($email_id, $booking_id, $contract_id)
	{
		$email_id = urldecode($email_id);
		
		$db_contract_id = $this->db->select('contract_id')->get_where('bookings', array('id'=>$booking_id))->row()->contract_id;

		if($db_contract_id === $contract_id)
		{
			$this->session->set_userdata(array('email_id'=>$email_id,'booking_id'=>$booking_id));

			$data['booking_data'] = $this->booking_model->get_bookings(array('id'=>$booking_id));
			$this->load->view('bookings/view', $data);
		}
		else
		{
			echo '<script>alert("Access Denied..!");</script>';
			die;
		}

	}

	public function log_out()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}

}

?>