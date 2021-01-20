<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{
	public function get_row_array($tbl_name, $where = '')
	{
		return $this->db->get_where($tbl_name, $where)->row_array();
	}

	public function update_data($tbl_name, $data_array, $where)
	{
		return ($this->db->update($tbl_name, $data_array, $where)) ? TRUE : FALSE ;
	}
}



?>