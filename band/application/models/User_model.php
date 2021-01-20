<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
	public function insert_data($data_array)
	{
		$this->db->insert('users', $data_array);
		return ($this->db->affected_rows()) ? TRUE : FALSE ;
	}

	public function get_user_data($where = null)
	{
		return $this->db->get_where('users', $where)->row_array();
	}

	public function update_data($data_array, $where)
	{
		return ($this->db->update('users', $data_array, $where)) ? TRUE : FALSE ;
	}
}



?>