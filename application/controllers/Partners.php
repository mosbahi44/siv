<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partners extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$isLogin = $this->session->userdata('loggedIn');
		if(!isset($isLogin) || !is_numeric($isLogin))
			redirect(base_url('index.php/login'));
	}
	
	public function index()
	{
		if(!$this->session->userdata('view_partner'))
			redirect(base_url('index.php/permission'));
		
		$this->load->view('header');
		$this->load->view('side_bar');

		$data['partners'] = $this->partners->getAll();
		$this->load->view('partners/list', $data);

		$this->load->view('footer');
	}

	public function add()
	{
		if(!$this->session->userdata('add_partner'))
			redirect(base_url('index.php/permission'));
		
		$this->load->view('header');
		$this->load->view('side_bar');

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('url', 'Url', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('partners/add');
		}
		else
		{
			$file_name = uniqid(md5(rand(0,1000)));
			$config['upload_path']          = './partners/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['file_name'] = $file_name;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('logo'))
			{
				$data['upload_error'] = $this->upload->display_errors();

				$this->load->view('partners/add', $data);
			}
			else
			{
				$upload_data = $this->upload->data();
				$this->partners->insert(array(
					'name'=> $this->input->post('name'),
					'logo'=> $upload_data['file_name'],
					'url'=> $this->input->post('url')
				));
				$data['message'] = 'Partner added.';
				$ret = array();
				$partners = $this->partners->getAll();
				if($partners):
					foreach($partners as $partner):
						$ret[] = base_url('partners/'.$partner->logo);
					endforeach;
				endif;
			}



			$data['partners'] = $this->partners->getAll();
			$this->load->view('partners/list', $data);
		}

		$this->load->view('footer');
	}



	public function delete($id)
	{

		if(!$this->session->userdata('delete_partner'))
			redirect(base_url('index.php/permission'));
		
		$this->load->view('header');
		$this->load->view('side_bar');
		
		
		$partner = $this->partners->getOne($id);
		$this->partners->delete($id);
		@unlink('./partners/'.$partner->logo);
		$data['message'] = 'Partner deleted.';

		$data['partners'] = $this->partners->getAll();
		$this->load->view('partners/list', $data);

		$this->load->view('footer');
	}

	public function preview($id){
		$partner = $this->partners->getOne($id);
		redirect(base_url('partners/'.$partner->logo));
	}


    public function push(){


        if(!$this->session->userdata('partner_push'))
            redirect(base_url('index.php/permission'));
        $ret = array();
        $partners = $this->partners->getAll();
        if($partners):
            $i=0;
            foreach($partners as $partner):
                $ret[$i]['name'] = $partner->name;
                $ret[$i]['img'] = base_url('partners/'.$partner->logo);
                $ret[$i]['url'] = $partner->url;
            $i++;
            endforeach;
        endif;
        $shelters = $this->shelters->getAll();
        if($shelters):
            foreach($shelters as $shelter):
                $this->notifications->push($shelter->id,json_encode(array('partners'=>$ret)));
            endforeach;
        endif;

        $this->load->view('header');
        $this->load->view('side_bar');

        $data['partners'] = $this->partners->getAll();
        $data['message'] = 'Partners pushed to shelters. To view status visit <a href="'.base_url('index.php/logs').'">Log</a>.';
        $this->load->view('partners/list', $data);

        $this->load->view('footer');
    }
}
