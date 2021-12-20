<?php
	
	Class AjaxCrud extends CI_Controller {

		public function __construct() {
			parent::__construct();
			$this->load->model('AjaxModel');
		}

		public function index() {

			return $this->load->view('Ajax/create');
		}


		public function getRecord() {

			$result = $this->AjaxModel->getAllData();

			echo json_encode($result);
		}

		public function dataInsert() {

			$data = array(
				"name" => $this->input->post('name'),
				"email" => $this->input->post('email')
			);

			$result = $this->AjaxModel->InsertData($data);

			echo $result;

		}

		public function deleteData() {
			$Id = $this->input->post('id');
			$result =  $this->db->delete('users', array('id' => $Id)); 
			echo $result;
 
		}

		public function getRecordById() {
			$Id = $this->input->post('id');
			$result = $this->AjaxModel->getRecordById($Id);
			echo json_encode($result);
		}

		public function updateData() {
			$uid = $this->input->post('id');
			$data = array(
		        'name' => $this->input->post('name'),
		        'email' => $this->input->post('email')
			);
			echo $result = $this->AjaxModel->updateData($data,$uid);
				
		}

		public function viewData() {

			$uid = $this->input->post('id');
			$result = $this->AjaxModel->getDataOfView($uid);
			echo json_encode($result);

		}

		public function updateDataById() {
			$uid = $this->input->post('id');
			$data = array(
		        'name' => $this->input->post('name'),
		        'email' => $this->input->post('email')
			);


		
			echo $result = $this->AjaxModel->updateData($data,$uid);
				
		}

	}

?>