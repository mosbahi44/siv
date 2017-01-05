<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $isLogin = $this->session->userdata('loggedIn');
        if(!isset($isLogin) || !is_numeric($isLogin))
            redirect(base_url('index.php/login'));
    }

    public function index()
    {
        if(!$this->session->userdata('view_message'))
            redirect(base_url('index.php/permission'));

        $this->load->view('header');
        $this->load->view('side_bar');

        $data['messages'] = $this->messages->getAll();
        $this->load->view('messages/list', $data);

        $this->load->view('footer');
    }

    public function add()
    {
        if(!$this->session->userdata('add_message'))
            redirect(base_url('index.php/permission'));

        $this->load->view('header');
        $this->load->view('side_bar');

        $data['shelters'] = $shelters = $this->shelters->getAll();

        $this->form_validation->set_rules('message', 'Message', 'required');
        $this->form_validation->set_rules('color', 'Color', 'required');
        $this->form_validation->set_rules('background', 'Background', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('messages/add', $data);
        }
        else
        {
            $type = $this->input->post('type');
            if($type == 0){
                $shelters = $data['shelters'];
                if($shelters):
                    foreach($shelters as $shelter):
                        $exist = $this->messages->getOneByShelter($shelter->id);
                        if($exist):
                            $this->messages->update(
                                $exist->id,
                                array(
                                    'id_shelter'=> $shelter->id,
                                    'message'=> $this->input->post('message') ,
                                    'color'=> $this->input->post('color') ,
                                    'background'=> $this->input->post('background')
                                ));
                        else:
                            $this->messages->insert(array(
                                'id_shelter'=> $shelter->id,
                                'message'=> $this->input->post('message') ,
                                'color'=> $this->input->post('color') ,
                                'background'=> $this->input->post('background')
                            ));
                        endif;

                    endforeach;
                    $data['message'] = 'Message broadcasting added.';
                endif;
            }
            else{
                $exist = $this->messages->getOneByShelter($this->input->post('id_shelter'));
                if($exist):
                    $this->messages->update($exist->id,
                        array(
                            'id_shelter'=>$this->input->post('id_shelter'),
                            'message'=> $this->input->post('message') ,
                            'color'=> $this->input->post('color') ,
                            'background'=> $this->input->post('background')
                        ));
                else:
                    $this->messages->insert(array(
                        'id_shelter'=> $this->input->post('id_shelter'),
                        'message'=> $this->input->post('message') ,
                        'color'=> $this->input->post('color') ,
                        'background'=> $this->input->post('background')
                    ));
                endif;

                $data['message'] = 'Message monocasting added.';
            }



            $data['messages'] = $this->messages->getAll();
            $this->load->view('messages/list', $data);
        }

        $this->load->view('footer');
    }

    public function edit($id)
    {
        if(!$this->session->userdata('edit_message'))
            redirect(base_url('index.php/permission'));

        $this->load->view('header');
        $this->load->view('side_bar');

        $this->form_validation->set_rules('message', 'Message', 'required');
        $this->form_validation->set_rules('color', 'Color', 'required');
        $this->form_validation->set_rules('background', 'Background', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $data['messagex'] = $this->messages->getOne($id);
            $this->load->view('messages/edit', $data);
        }
        else
        {
            $content = $this->messages->getOne($id);
            $this->messages->update($id,
                array(
                    'id_shelter'=> $content->id_shelter,
                    'message'=> $this->input->post('message') ,
                    'color'=> $this->input->post('color') ,
                    'background'=> $this->input->post('background')
                ));
            $data['message'] = 'Message updated.';

            $data['messages'] = $this->messages->getAll();
            $this->load->view('messages/list', $data);
        }

        $this->load->view('footer');
    }

    public function delete($id)
    {
        if(!$this->session->userdata('delete_message'))
            redirect(base_url('index.php/permission'));

        $this->load->view('header');
        $this->load->view('side_bar');
        $msg = $this->messages->getOne($id);
        $this->messages->delete($id);
        $data['message'] = 'Message deleted.';

        $data['messages'] = $this->messages->getAll();
        $this->load->view('messages/list', $data);

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

        if(!$this->session->userdata('message_push'))
            redirect(base_url('index.php/permission'));

        $json = array();
        $message = $this->messages->getOne($id);
        if($message):
            $shelter = $this->shelters->getOne($message->id_shelter);
            if($shelter):
                //$json['name'] = $shelter->name;
                //$json['mac'] = $shelter->mac;
                $json['message'] = $message->message;
                $json['color'] = $message->color;
                $json['background'] = $message->background;
            endif;
        endif;
        $this->notifications->push($message->id_shelter,json_encode(array('message'=>$json)));


        $this->load->view('header');
        $this->load->view('side_bar');

        $data['message'] = 'Message pushed to shelter. To view status visit <a href="'.base_url('index.php/logs').'">Log</a>.';
        $data['messages'] = $this->messages->getAll();
        $this->load->view('messages/list', $data);

        $this->load->view('footer');
    }
}
