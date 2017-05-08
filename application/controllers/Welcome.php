<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == true) {
			$this->load->view('welcome');
		} else {
			redirect('Admin');
		}
	}
}
