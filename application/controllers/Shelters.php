<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shelters extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $isLogin = $this->session->userdata('loggedIn');
        if(!isset($isLogin) || !is_numeric($isLogin))
            redirect(base_url('index.php/login'));
    }

    public function index()
    {
        if(!$this->session->userdata('view_shelter'))
            redirect(base_url('index.php/permission'));

        $this->load->view('header');
        $this->load->view('side_bar');

        $data['shelters'] = $this->shelters->getAll();
        $this->load->view('shelters/list', $data);

        $this->load->view('footer');
    }

    public function add()
    {
        if(!$this->session->userdata('add_shelter'))
            redirect(base_url('index.php/permission'));

        $this->load->view('header');
        $this->load->view('side_bar');

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('mac', 'MAC address', 'required');
        $this->form_validation->set_rules('lat', 'Latitude', 'required|numeric');
        $this->form_validation->set_rules('lng', 'Longitude', 'required|numeric');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('shelters/add');
        }
        else
        {
            $this->shelters->insert(array(
                'name'=> $this->input->post('name'),
                'mac'=> $this->input->post('mac') ,
                'lat'=> $this->input->post('lat') ,
                'lng'=> $this->input->post('lng')
            ));
            $data['message'] = 'Shelter added.';
            $data['shelters'] = $this->shelters->getAll();
            $this->load->view('shelters/list', $data);
        }

        $this->load->view('footer');
    }

    public function edit($id)
    {
        if(!$this->session->userdata('edit_shelter'))
            redirect(base_url('index.php/permission'));

        $this->load->view('header');
        $this->load->view('side_bar');

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('mac', 'MAC address', 'required');
        $this->form_validation->set_rules('lat', 'Latitude', 'required|numeric');
        $this->form_validation->set_rules('lng', 'Longitude', 'required|numeric');

        if ($this->form_validation->run() == FALSE)
        {
            $data['shelter'] = $this->shelters->getOne($id);
            $this->load->view('shelters/edit', $data);
        }
        else
        {
            $this->shelters->update($id,
                array(
                    'name'=> $this->input->post('name'),
                    'mac'=> $this->input->post('mac') ,
                    'lat'=> $this->input->post('lat') ,
                    'lng'=> $this->input->post('lng')
                ));
            $data['message'] = 'Shelter updated.';

            $ret = array();
            $ret['name'] = $this->input->post('name');
            $ret['mac'] = $this->input->post('mac');
            $ret['lat'] = $this->input->post('lat');
            $ret['lng'] = $this->input->post('lng');
            $this->notifications->push($id, 0, json_encode($ret));

            $data['shelters'] = $this->shelters->getAll();
            $this->load->view('shelters/list', $data);
        }

        $this->load->view('footer');
    }

    public function delete($id)
    {
        if(!$this->session->userdata('delete_shelter'))
            redirect(base_url('index.php/permission'));

        $this->load->view('header');
        $this->load->view('side_bar');

        $this->shelters->delete($id);
        $data['message'] = 'Shelter deleted.';

        $data['shelters'] = $this->shelters->getAll();
        $this->load->view('shelters/list', $data);

        $this->load->view('footer');
    }

    public function push($id){


        if(!$this->session->userdata('shelter_push'))
            redirect(base_url('index.php/permission'));

        $json = array();
        $ads = array();
        $shelter = $this->shelters->getOne($id);
        $json['name'] = $shelter->name;
        $json['mac'] = $shelter->mac;
        $json['lat'] = $shelter->lat;
        $json['lng'] = $shelter->lng;

        $content = $this->contents->getOneByShelter($shelter->id);
        if($content):
            $json['url'] = base_url('sites/'.$content->id_site);
        endif;

        $adsx = $this->ads->getOneByShelter($shelter->id);
        if($adsx):
            $frequency = $this->frequencies->getOne($adsx->id_frequency);
            $ads['frequency'] = $frequency->name;
            $ads_videos = $this->ads_videos->getAllByAds($adsx->id);
            if($ads_videos):
                foreach($ads_videos as $ads_video):
                    $ads['videos'][] = $ads_video->video;
                endforeach;
            endif;
            $json['ads'] = $ads;
        endif;
        $this->notifications->push($id,json_encode(array('shelter'=>$json)));


        $this->load->view('header');
        $this->load->view('side_bar');

        $data['message'] = 'Shelter data pushed. To view status visit <a href="'.base_url('index.php/logs').'">Log</a>.';
        $data['shelters'] = $this->shelters->getAll();
        $this->load->view('shelters/list', $data);

        $this->load->view('footer');
    }

    public function clearCache($id){
        if(!$this->session->userdata('shelter_clear'))
            redirect(base_url('index.php/permission'));

        $this->notifications->push($id,json_encode(array('clear cache'=>'clear cache')));


        $this->load->view('header');
        $this->load->view('side_bar');

        $data['message'] = 'Shelter data pushed. To view status visit <a href="'.base_url('index.php/logs').'">Log</a>.';
        $data['shelters'] = $this->shelters->getAll();
        $this->load->view('shelters/list', $data);

        $this->load->view('footer');
    }

    public function reboot($id){
        if(!$this->session->userdata('shelter_reboot'))
            redirect(base_url('index.php/permission'));
        
        $this->notifications->push($id,json_encode(array('reboot'=>'reboot')));


        $this->load->view('header');
        $this->load->view('side_bar');

        $data['message'] = 'Shelter data pushed. To view status visit <a href="'.base_url('index.php/logs').'">Log</a>.';
        $data['shelters'] = $this->shelters->getAll();
        $this->load->view('shelters/list', $data);

        $this->load->view('footer');
    }
}
