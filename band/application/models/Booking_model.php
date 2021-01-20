<?php
	class Booking_model extends CI_Model
	{
		public function create_booking($ins_data)
		{
			$this->db->insert('bookings', $ins_data);
			if($this->db->affected_rows() > 0)
				return TRUE;
			else
				return FALSE;
		}

		public function get_bookings($where = FALSE, $limit = null, $start = null)
		{
			$this->db->order_by('id', 'DESC');
			if($where === FALSE)
				$query = $this->db->get('bookings');
			else
			{
				$this->db->limit($limit, $start);
				$query = $this->db->get_where('bookings', $where);
			}

			return $query->result_array();			
		}

		public function get_timings($where)
		{
			return $this->db->select('time')->get_where('bookings', $where)->result_array();
		}

		public function update_booking($upd_data, $wh)
		{
			$this->db->update('bookings', $upd_data, $wh);
			if($this->db->affected_rows() > 0)
				return TRUE;
			else
				return FALSE;
		}

		public function get_post_types()
		{
			return $this->db->select('type')->distinct()->get('posts')->result_array();
		}

		public function delete_post($post_id)
		{
			$this->db->delete('posts', array('id' => $post_id));
			if($this->db->affected_rows() === 1)
				return TRUE;
			else
				return FALSE;
		}

		public function save_client_signature($ins_data, $where)
		{
			$this->db->update('bookings', $ins_data, $where);
			return $this->db->affected_rows();
		}

	}
?>