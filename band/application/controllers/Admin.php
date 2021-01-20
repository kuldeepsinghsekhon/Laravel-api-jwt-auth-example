<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		if($this->session->userdata('user_id'))
			redirect(base_url('booking_requests'));
		else
			redirect(base_url('admin/login'));
	}

	public function login_load_view()
	{
		$this->load->view('templates/header');
		$this->load->view('admin/login');
		$this->load->view('templates/footer');
	}

	public function login()
	{ 
		if($this->session->userdata('user_id'))
			redirect(base_url('booking_requests'));
	 	elseif($pd = $this->input->post())
	 	{ 
	 		$vld = array(
	 			array(
	 				'field' => 'user_name',
	 				'label' => 'user_name',
	 				'rules' => 'required'
	 			),
	 			array(
	 				'field' => 'user_password',
	 				'label' => 'Password',
	 				'rules' => 'required|min_length[8]|max_length[20]',
	 				'errors' => array(
	 					'min_length' => 'Wrong %s....!',
	 					'max_length' => 'Wrong %s....!'
	 				)
	 			)
	 		);
	 		$this->form_validation->set_rules($vld);
			if($this->form_validation->run())
			{
				if($user_db_data = $this->admin_model->get_row_array('admin',array('user_name' => $pd['user_name'])))
				{ 
					if(password_verify($pd['user_password'], $user_db_data['user_password']))
					{ 
						$ud = array(
							'user_id' => $user_db_data['id'],
							'name' 		=> $user_db_data['name'],
							'user_name' => $user_db_data['user_name']
						);
						$this->session->set_userdata($ud);
						redirect(base_url('booking_requests'));
					}
					else
					{
						$this->session->set_flashdata('loginfailed','Login Failed...!');
						$this->login_load_view();
					}
				}
				else
				{
					$this->session->set_flashdata('loginfailed','Login Failed...!');
					$this->login_load_view();
				}
			}
			else
				$this->login_load_view();
	 	}
	 	else
	 		$this->login_load_view();
	}

	public function logout()
	{
		echo 'logout function okk';die;
		$this->session->sess_destroy();
		redirect(base_url('admin'));
	}

	public function cp_load_view()
	{
		if(!$this->session->userdata('user_id'))
			redirect(base_url('admin'));

		$this->load->view('templates/header');
		$this->load->view('admin/change_password');
		$this->load->view('templates/footer');
	}

	public function change_password()
	{
		if(!$this->session->userdata('user_id'))
			redirect(base_url('admin'));

		if($pd = $this->input->post())
		{
			$vld = array(
				array(
					'field' => 'old_password',
					'label' => 'Old Password',
					'rules' => 'required|min_length[8]|max_length[20]',
					'errors' => array(
						'min_length' => 'Wrong %s....!',
						'max_length' => 'Wrong %s....!'
					)
				),
				array(
					'field' => 'new_password',
					'label' => 'New Password',
					'rules' => 'required|min_length[8]|max_length[20]',
					'errors' => array(
						'min_length' => 'Minimum %s length should be 8 Characters.',
						'max_length' => 'Maximum %s length should be 20 Characters.'
					)
				),
				array(
					'field' => 'confirm_password',
					'label' => 'Confirm Password',
					'rules' => 'required|matches[new_password]'
				)
			);
			$this->form_validation->set_rules($vld);
			if($this->form_validation->run())
			{
				$db_user_data = $this->admin_model->get_row_array('admin',array('id' => $this->session->userdata('user_id')));
				if(password_verify($pd['old_password'], $db_user_data['user_password']))
				{
					$new_password['user_password'] = password_hash($pd['new_password'], PASSWORD_BCRYPT);
					if($this->admin_model->update_data('admin', $new_password, array('id' => $this->session->userdata('user_id'))))
					{
						$this->session->unset_userdata('user_id','name','user_name');
						$this->session->set_flashdata('password_changed','Password has been successfully changed. Please LogIn to Continue.');
						redirect(base_url('admin/login'));
					}
					else
					{
						$this->session->set_flashdata('password_updation_failed','Password Updation failed...! Try Again.');
						$this->cp_load_view();
					}
				}
				else
				{
					$this->session->set_flashdata('wrong_old_password','Wrong Old Password...!');
					$this->cp_load_view();
				}
			}
			else
				$this->cp_load_view();
		}
		else
			$this->cp_load_view();
	}

	public function cancel_booking_request($booking_id)
	{
		if($this->booking_model->update_booking(array('status'=>'canceled'), array('id'=>$booking_id)))
		{
			$email_id = $this->db->select('email')->get_where('bookings', array('id'=>$booking_id))->row()->email;
			$this->session->set_flashdata('booking_request_cancel', 'Booking Cancel of this Email_id "'.$email_id.'"');
			redirect(base_url('booking_requests'));
		}
	}


}