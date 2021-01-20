<?php
	class Service_model extends CI_Model
	{
		public function get_services($where = FALSE)
		{
			if($where === FALSE)
				$query = $this->db->get('services');
			else
				$query = $this->db->get_where('services', $where);

			return $query->result_array();			
		}

		public function get_post($id)
		{
			return $this->db->get_where('posts', array('id' => $id))->row_array();
		}	

		public function get_post_types()
		{
			return $this->db->select('type')->distinct()->get('posts')->result_array();
		}

		public function create_event($ins_data)
		{
			$this->db->insert('events', $ins_data);
			return $this->db->affected_rows() > 0;
		}

		public function update_post($upd_data, $wh)
		{
			$this->db->update('posts', $upd_data, $wh);
			if($this->db->affected_rows() > 0)
			{
				//$query = $this->db->select('type, category_id')->get_where('posts', $wh);
				//return $query->row_array();
				return 'Changes Updated.';
			}
			else
				return 'Make changes to update.';
		}

		public function delete_post($post_id)
		{
			$this->db->delete('posts', array('id' => $post_id));
			if($this->db->affected_rows() === 1)
				return TRUE;
			else
				return FALSE;
		}

	}
?>