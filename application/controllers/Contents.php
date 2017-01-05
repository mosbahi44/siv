<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contents extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $isLogin = $this->session->userdata('loggedIn');
        if(!isset($isLogin) || !is_numeric($isLogin))
            redirect(base_url('index.php/login'));
    }
    public function index()
    {
        if(!$this->session->userdata('view_content'))
            redirect(base_url('index.php/permission'));

        $this->load->view('header');
        $this->load->view('side_bar');

        $data['contents'] = $this->contents->getAll();
        $this->load->view('contents/list', $data);

        $this->load->view('footer');
    }

    public function add()
    {
        if(!$this->session->userdata('add_content'))
            redirect(base_url('index.php/permission'));

        $this->load->view('header');
        $this->load->view('side_bar');

        $data['shelters'] = $this->shelters->getAll();
        $data['sites'] = $this->sites->getAll();

        $this->form_validation->set_rules('id_shelter', 'Shelter', 'required|numeric');
        $this->form_validation->set_rules('id_site', 'Site', 'required|numeric');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('contents/add', $data);
        }
        else
        {
            $exist = $this->contents->getOneByShelter($this->input->post('id_shelter'));

            if($exist){
                if($exist->id_site != $this->input->post('id_site'))
                {
                    $this->contents->update($exist->id,
                        array(
                            'id_shelter'=> $this->input->post('id_shelter'),
                            'id_site'=> $this->input->post('id_site')
                        ));
                    $data['message'] = 'Content updated.';
                }
            }
            else{
                $this->contents->insert(
                    array(
                        'id_shelter'=> $this->input->post('id_shelter'),
                        'id_site'=> $this->input->post('id_site')
                    ));
                $data['message'] = 'Content added.';

            }

            $data['contents'] = $this->contents->getAll();
            $this->load->view('contents/list', $data);
        }

        $this->load->view('footer');
    }

    public function edit($id)
    {
        if(!$this->session->userdata('edit_content'))
            redirect(base_url('index.php/permission'));

        $this->load->view('header');
        $this->load->view('side_bar');

        $data['shelters'] = $this->shelters->getAll();
        $data['sites'] = $this->sites->getAll();

        $this->form_validation->set_rules('id_shelter', 'Shelter', 'required|numeric');
        $this->form_validation->set_rules('id_site', 'Site', 'required|numeric');

        if ($this->form_validation->run() == FALSE)
        {
            $data['content'] = $this->contents->getOne($id);
            $this->load->view('contents/edit', $data);
        }
        else
        {

            $exist = $this->contents->getOneByShelter($this->input->post('id_shelter'));
            if($exist){
                // Do update
                if($exist->id_site != $this->input->post('id_shelter'))
                {
                    $this->contents->update($id,
                        array(
                            'id_shelter'=> $this->input->post('id_shelter'),
                            'id_site'=> $this->input->post('id_site')
                        ));
                    $data['message'] = 'Content updated.';

                }
            }
            else{
                $this->contents->insert(
                    array(
                        'id_shelter'=> $this->input->post('id_shelter'),
                        'id_site'=> $this->input->post('id_site')
                    ));
                $data['message'] = 'Content added.';

            }


            $data['contents'] = $this->contents->getAll();
            $this->load->view('contents/list', $data);
        }

        $this->load->view('footer');
    }

    public function delete($id)
    {
        if(!$this->session->userdata('delete_content'))
            redirect(base_url('index.php/permission'));

        $this->load->view('header');
        $this->load->view('side_bar');
        $content = $this->contents->getOne($id);
        $data['message'] = 'Content deleted.';
        $this->contents->delete($id);

        $data['contents'] = $this->contents->getAll();
        $this->load->view('contents/list', $data);

        $this->load->view('footer');
    }

    public function getSiteUrl($id_site){
        $site = $this->sites->getOne($id_site);
        if($site) return $site->name;
    }
    public function getShelterName($id_shelter){
        $shelter = $this->shelters->getOne($id_shelter);
        if($shelter) return $shelter->name;
    }

    public function push($id){
        if(!$this->session->userdata('view_content'))
            redirect(base_url('index.php/permission'));
        $json = array();
        $content = $this->contents->getOne($id);
        if($content):
            $json['url'] = base_url('sites/'.$content->id_site);
            $this->notifications->push($content->id_shelter,json_encode(array('content'=>$json)));
        endif;

        $this->load->view('header');
        $this->load->view('side_bar');

        $data['message'] = 'Content pushed to shelter. To view status visit <a href="'.base_url('index.php/logs').'">Log</a>.';
        $data['contents'] = $this->contents->getAll();
        $this->load->view('contents/list', $data);

        $this->load->view('footer');
    }
}
