<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model
{
	public function create($data)
	{
		$this->db->insert('categories', $data);
		if($this->db->affected_rows() > 0)
			return true;
	}

	public function get_categories($type = 'all')
	{
		if($type === 'all')
			return $this->db->get('categories')->result_array();
		else
			return $this->db->get_where('categories', array('type' => $type))->result_array();
	}

	public function get_category($id)
	{
		return $this->db->get_where('categories', array('id' => $id))->row_array();
	}

	public function delete($id)
	{
		$this->db->delete('categories', $id);
		if($this->db->affected_rows() > 0)
		{
			$this->db->update('posts', array('category_id' => 0), array('category_id' => $id['id']));
			return TRUE;
		}
		else
			return FALSE;
	}

	public function update_category($data, $where)
	{
		$this->db->update('categories', $data, $where);
		if($this->db->affected_rows() > 0)
			return $this->db->select('category_name, type')->get_where('categories', $where)->row_array();
		else
		{
			return 'no';
		}

	}


}



?>