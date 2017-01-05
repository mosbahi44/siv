<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$isLogin = $this->session->userdata('loggedIn');
		if(!isset($isLogin) || !is_numeric($isLogin))
			redirect(base_url('index.php/login'));
	}
	
	public function index()
	{
		if(!$this->session->userdata('view_log'))
			redirect(base_url('index.php/permission'));
		
		$this->load->view('header');
		$this->load->view('side_bar');
		$data['logs'] = $this->notifications->getAll();
		$this->load->view('logs',$data);
		$this->load->view('footer');
	}
}
