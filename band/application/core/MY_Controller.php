<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Controller extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
	}

	public function user_authentication($email = FALSE)
	{
		if($this->db->select('status')->get_where('users',array('email'=>$email))->row()->status ?? 0 === 1)
			return TRUE;
		else
		{
			echo '<script>alert("Access Denied..!")</script>';
			die;
		}
	}
	
}