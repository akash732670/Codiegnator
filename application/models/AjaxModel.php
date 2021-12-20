<?php
		
	Class AjaxModel extends CI_Model {

		public function getAllData() {
			$query = $this->db->get('users');
            return $query->result();
		}


		public function InsertData($data) {

			return $this->db->insert('users', $data);
		}

		public function getRecordById($id) {
			$query = $this->db->get_where('users', array('id' => $id));
			return $query->result();

		}

		public function updateData($data, $uid) {
			$this->db->where('id', $uid);
			return $this->db->update('users', $data);
		}

		public function getDataOfView($id) {
			$query = $this->db->get_where('users', array('id' => $id));
			return $query->result();
		}
	}

?>