<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stripe_model extends CI_Model
{
	public function insert_data($data)
	{ 
		$this->db->insert('stripe_payments', $data);
		return $this->db->insert_id();
	}

 
}