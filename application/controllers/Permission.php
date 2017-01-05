<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class permission extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $isLogin = $this->session->userdata('loggedIn');
        if(!isset($isLogin) || !is_numeric($isLogin))
            redirect(base_url('index.php/login'));
    }
    
	public function index()
	{
		$this->load->view('permission');
	}
}
