<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sites extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$isLogin = $this->session->userdata('loggedIn');
		if(!isset($isLogin) || !is_numeric($isLogin))
			redirect(base_url('index.php/login'));
	}
	
	public function index()
	{
		if(!$this->session->userdata('view_site'))
			redirect(base_url('index.php/permission'));
		
		$this->load->view('header');
		$this->load->view('side_bar');

		$data['sites'] = $this->sites->getAll();
		$this->load->view('sites/list', $data);

		$this->load->view('footer');
	}

	public function add()
	{
		if(!$this->session->userdata('add_site'))
			redirect(base_url('index.php/permission'));
		
		$this->load->view('header');
		$this->load->view('side_bar');

		$this->form_validation->set_rules('name', 'Name', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('sites/add');
		}
		else
		{

			$file_name = uniqid(md5(rand(0,1000)));
			$config['upload_path']          = './sites/';
			$config['allowed_types']        = 'zip|tar|rar';
			$config['max_size']             = 10000;
			$config['file_name'] = $file_name;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('zip'))
			{
				$data['upload_error'] = $this->upload->display_errors();

				$this->load->view('sites/add', $data);
			}
			else
			{
				$upload_data = $this->upload->data();

				$site_id = $this->sites->insert(array(
					'name'=> $this->input->post('name'),
					'zip'=> $file_name
				));

				$zip = new ZipArchive;
				$res = $zip->open($config['upload_path'].$upload_data['file_name']);
				if ($res === TRUE) {
					$zip->extractTo($config['upload_path'].$site_id);
					$zip->close();
					$data['message'] = 'Site added.';
					//Unlink upoaded file
					@unlink($config['upload_path'].$upload_data['file_name']);
				} else {
					$data['upload_error'] = 'Can\'t extract folder';
					@unlink($config['upload_path'].$upload_data['file_name']);
				}
			}

			$data['sites'] = $this->sites->getAll();
			$this->load->view('sites/list', $data);
		}

		$this->load->view('footer');
	}



	public function delete($id)
	{
		if(!$this->session->userdata('delete_site'))
			redirect(base_url('index.php/permission'));
		
		$this->load->view('header');
		$this->load->view('side_bar');
		$in_use = $this->contents->getOneBySite($id);
		if( ! $in_use):
		$this->sites->delete($id);
		@unlink('./sites/'.$id);
		$data['message'] = 'Site deleted.';
		else:
			$data['message'] = 'Can\'t delete site, its already in use in content.';
		endif;
		$data['sites'] = $this->sites->getAll();
		$this->load->view('sites/list', $data);

		$this->load->view('footer');
	}

	public function preview($id){
		redirect(base_url('sites/'.$id));
	}
}
