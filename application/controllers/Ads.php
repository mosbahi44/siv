<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ads extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$isLogin = $this->session->userdata('loggedIn');
		if(!isset($isLogin) || !is_numeric($isLogin))
			redirect(base_url('index.php/login'));
	}

	public function index()
	{
		if(!$this->session->userdata('view_ads'))
			redirect(base_url('index.php/permission'));



		$this->load->view('header');
		$this->load->view('side_bar');

		$data['ads'] = $this->ads->getAll();
		$this->load->view('ads/list', $data);

		$this->load->view('footer');
	}

	public function add()
	{
		if(!$this->session->userdata('add_ads'))
			redirect(base_url('index.php/permission'));

		$errors = '';
		$this->load->view('header');
		$this->load->view('side_bar');

		$data['shelters'] = $this->shelters->getAll();
		$data['frequencies'] = $this->frequencies->getAll();

		$this->form_validation->set_rules('id_shelter', 'Shelter', 'required|numeric');
		$this->form_validation->set_rules('id_frequency', 'Frequency', 'required|numeric');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('ads/add', $data);
		}
		else
		{
			$exist = $this->ads->getOneByShelter($this->input->post('id_shelter'));
			if($exist){
				$ad_id = $exist->id;
			}
			else{
				$ad_id = $this->ads->insert(array(
					'id_shelter'=>$this->input->post('id_shelter'),
					'id_frequency'=>$this->input->post('id_frequency'),
				));
			}

			$files = $_FILES;
			$cpt = count($_FILES['videos']['name']);
			for($i=0; $i<$cpt; $i++)
			{
				$file_name = uniqid(md5(rand(0,1000)));
				$config['upload_path']          = './videos/';
				$config['allowed_types']        = 'mp4';
				$config['file_name'] = $file_name;

				$_FILES['video']['name']= $files['videos']['name'][$i];
				$_FILES['video']['type']= $files['videos']['type'][$i];
				$_FILES['video']['tmp_name']= $files['videos']['tmp_name'][$i];
				$_FILES['video']['error']= $files['videos']['error'][$i];
				$_FILES['video']['size']= $files['videos']['size'][$i];
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('video'))
				{
					$errors .= $this->upload->display_errors();

				}
				else
				{
					$val = $this->upload->data();
					$filename = $val['file_name'];
					$this->ads_videos->insert(array(
						'id_ads'=> $ad_id,
						'video'=>$filename
					));
				}
			}
		}


		
		$data['errors'] = $errors;
		$data['ads'] = $this->ads->getAll();
		$this->load->view('ads/list', $data);
		$this->load->view('footer');
	}

	public function edit($id)
	{
		if(!$this->session->userdata('edit_ads'))
			redirect(base_url('index.php/permission'));
		$errors = '';
		$this->load->view('header');
		$this->load->view('side_bar');

		$data['shelters'] = $this->shelters->getAll();
		$data['frequencies'] = $this->frequencies->getAll();

		$this->form_validation->set_rules('id_frequency', 'Frequency', 'required|numeric');

		if ($this->form_validation->run() == FALSE)
		{
			$data['ad'] = $this->ads->getOne($id);
			$this->load->view('ads/edit', $data);
		}
		else
		{


				$this->ads->update($id,
					array(
						'id_frequency'=> $this->input->post('id_frequency')
					));
				$data['message'] = 'Ads updated.';

			$files = $_FILES;
			$cpt = count($_FILES['videos']['name']);
			for($i=0; $i<$cpt; $i++)
			{
				$file_name = uniqid(md5(rand(0,1000)));
				$config['upload_path']          = './videos/';
				$config['allowed_types']        = 'mp4';
				$config['file_name'] = $file_name;

				$_FILES['video']['name']= $files['videos']['name'][$i];
				$_FILES['video']['type']= $files['videos']['type'][$i];
				$_FILES['video']['tmp_name']= $files['videos']['tmp_name'][$i];
				$_FILES['video']['error']= $files['videos']['error'][$i];
				$_FILES['video']['size']= $files['videos']['size'][$i];
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('video'))
				{
					$errors .= $this->upload->display_errors();

				}
				else
				{
					$val = $this->upload->data();
					$filename = $val['file_name'];
					$this->ads_videos->insert(array(
						'id_ads'=> $id,
						'video'=>$filename
					));
				}
			}

			$data['ads'] = $this->ads->getAll();
			$this->load->view('ads/list', $data);
		}

		$this->load->view('footer');
	}

	public function delete($id)
	{
		if(!$this->session->userdata('delete_ads'))
			redirect(base_url('index.php/permission'));

		$this->load->view('header');
		$this->load->view('side_bar');

		$this->ads->delete($id);
		$data['message'] = 'ADS deleted';

		$data['contents'] = $this->ads->getAll();
		$this->load->view('ads/list', $data);

		$this->load->view('footer');
	}

	public function deleteVideo($id, $id_video){
		$this->ads_videos->delete($id_video);

		if(!$this->session->userdata('edit_ads'))
			redirect(base_url('index.php/permission'));

		$this->load->view('header');
		$this->load->view('side_bar');

		$data['shelters'] = $this->shelters->getAll();
		$data['frequencies'] = $this->frequencies->getAll();

		$data['message'] = 'Video deleted.';

		$data['ad'] = $this->ads->getOne($id);
		$this->load->view('ads/edit', $data);

		$this->load->view('footer');
	}
	public function getFrequency($id_frequency){
		$site = $this->frequencies->getOne($id_frequency);
		if($site) return $site->name;
	}

	public function getShelterName($id_shelter){
		$shelter = $this->shelters->getOne($id_shelter);
		if($shelter) return $shelter->name;
	}

	public function getVideos($id_ad){
		return $this->ads_videos->getAllByAds($id_ad);
	}
    public function push($id){

        if(!$this->session->userdata('ads_push'))
            redirect(base_url('index.php/permission'));

        $json = array();
        $adsx = $this->ads->getOne($id);
        if($adsx):
            $frequency = $this->frequencies->getOne($adsx->id_frequency);
            $ads['frequency'] = $frequency->name;
            $ads_videos = $this->ads_videos->getAllByAds($adsx->id);
            if($ads_videos):
                $shelter = $this->shelters->getOne($adsx->id_shelter);
                if($shelter):
                    //$json['name'] = $shelter->name;
                    //$json['mac'] = $shelter->mac;

                    foreach($ads_videos as $ads_video):
                        $ads['videos'][] = $ads_video->video;
                    endforeach;
                    $json['ads'] = $ads;
                endif;

            endif;
        endif;
		
        $this->notifications->push($adsx->id_shelter,json_encode(array('ads'=>$ads)));
		
        $this->load->view('header');
        $this->load->view('side_bar');
        $data['message'] = 'Ads pushed to shelter. To view status visit <a href="'.base_url('index.php/logs').'">Log</a>.';
        $data['ads'] = $this->ads->getAll();
        $this->load->view('ads/list', $data);

        $this->load->view('footer');
    }
}
