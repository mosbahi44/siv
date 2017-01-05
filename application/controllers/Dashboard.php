<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$isLogin = $this->session->userdata('loggedIn');
		if(!isset($isLogin) || !is_numeric($isLogin))
			redirect(base_url('index.php/login'));
	}
	
	public function index()
	{
		$this->load->view('header');
		$this->load->view('side_bar');
		$data['shelters'] = $this->shelters->getAll();
		$data['sites'] = $this->sites->getAll();
		$data['partners'] = $this->partners->getAll();
		$data['messages'] = $this->messages->getAll();
		$data['users'] = $this->users->getAll();
		$data['roles'] = $this->roles->getAll();
		$data['ads'] = $this->ads->getAll();
		$data['contents'] = $this->contents->getAll();
		$this->load->view('dashboard', $data);
		$this->load->view('footer');
	}
}
