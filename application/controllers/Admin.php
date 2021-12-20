<?php
	
	Class Admin extends CI_Controller {

		public function index() {
			$this->load->view('Admin/login');
		}
		public function Dashboard() {
			$this->load->view('Admin/Dashboard');
		}
	}
	
?>