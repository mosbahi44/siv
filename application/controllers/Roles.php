<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends CI_Controller {

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
        $data['roles'] = $this->roles->getAll();
        $this->load->view('roles/list', $data);
        $this->load->view('footer');
    }
    public function add()
    {
        $this->load->view('header');
        $this->load->view('side_bar');

        $this->form_validation->set_rules('name', 'Name', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('roles/add');
        }
        else
        {
            $this->roles->insert(array(
                'name'=> $this->input->post('name'),

                'view_log'=> empty($this->input->post('logs_view')) ? 0 : $this->input->post('logs_view'),
                'add_log'=> empty($this->input->post('logs_add')) ? 0 : $this->input->post('logs_add'),
                'edit_log'=> empty($this->input->post('logs_edit')) ? 0 : $this->input->post('logs_edit'),
                'delete_log'=> empty($this->input->post('logs_delete')) ? 0 : $this->input->post('logs_delete'),

                'view_shelter'=> empty($this->input->post('shelters_view')) ? 0 : $this->input->post('shelters_view'),
                'add_shelter'=> empty($this->input->post('shelters_add')) ? 0 : $this->input->post('shelters_add'),
                'edit_shelter'=> empty($this->input->post('shelters_edit')) ? 0 : $this->input->post('shelters_edit'),
                'delete_shelter'=> empty($this->input->post('shelters_delete')) ? 0 : $this->input->post('shelters_delete'),
                'shelter_reboot'=> empty($this->input->post('shelters_reboot')) ? 0 : $this->input->post('shelters_reboot'),
                'shelter_clear'=> empty($this->input->post('shelters_clear')) ? 0 : $this->input->post('shelters_clear'),
                'shelter_push'=> empty($this->input->post('shelters_push')) ? 0 : $this->input->post('shelters_push'),

                'view_content'=> empty($this->input->post('contents_view')) ? 0 : $this->input->post('contents_view'),
                'add_content'=> empty($this->input->post('contents_add')) ? 0 : $this->input->post('contents_add'),
                'edit_content'=> empty($this->input->post('contents_edit')) ? 0 : $this->input->post('contents_edit'),
                'delete_content'=> empty($this->input->post('contents_delete')) ? 0 : $this->input->post('contents_delete'),
                'content_push'=> empty($this->input->post('contents_push')) ? 0 : $this->input->post('contents_push'),

                'view_ads'=> empty($this->input->post('ads_view')) ? 0 : $this->input->post('ads_view'),
                'add_ads'=> empty($this->input->post('ads_add')) ? 0 : $this->input->post('ads_add'),
                'edit_ads'=> empty($this->input->post('ads_edit')) ? 0 : $this->input->post('ads_edit'),
                'delete_ads'=> empty($this->input->post('ads_delete')) ? 0 : $this->input->post('ads_delete'),
                'ads_push'=> empty($this->input->post('ads_push')) ? 0 : $this->input->post('ads_push'),

                'view_site'=> empty($this->input->post('sites_view')) ? 0 : $this->input->post('sites_view'),
                'add_site'=> empty($this->input->post('sites_add')) ? 0 : $this->input->post('sites_add'),
                'edit_site'=> empty($this->input->post('sites_edit')) ? 0 : $this->input->post('sites_edit'),
                'delete_site'=> empty($this->input->post('sites_delete')) ? 0 : $this->input->post('sites_delete'),

                'view_partner'=> empty($this->input->post('partners_view')) ? 0 : $this->input->post('partners_view'),
                'add_partner'=> empty($this->input->post('partners_add')) ? 0 : $this->input->post('partners_add'),
                'edit_partner'=> empty($this->input->post('partners_edit')) ? 0 : $this->input->post('partners_edit'),
                'delete_partner'=> empty($this->input->post('partners_delete')) ? 0 : $this->input->post('partners_delete'),
                'partner_push'=> empty($this->input->post('partners_push')) ? 0 : $this->input->post('partners_push'),

                'view_message'=> empty($this->input->post('shelters_view')) ? 0 : $this->input->post('shelters_view'),
                'add_message'=> empty($this->input->post('messages_view')) ? 0 : $this->input->post('messages_view'),
                'edit_message'=> empty($this->input->post('messages_edit')) ? 0 : $this->input->post('messages_edit'),
                'delete_message'=> empty($this->input->post('messages_delete')) ? 0 : $this->input->post('messages_delete'),
                'message_push'=> empty($this->input->post('messages_push')) ? 0 : $this->input->post('messages_push'),

                'view_user'=> empty($this->input->post('users_view')) ? 0 : $this->input->post('users_view'),
                'add_user'=> empty($this->input->post('users_add')) ? 0 : $this->input->post('users_add'),
                'edit_user'=> empty($this->input->post('users_edit')) ? 0 : $this->input->post('users_edit'),
                'delete_user'=> empty($this->input->post('users_delete')) ? 0 : $this->input->post('users_delete')
            ));
            $data['message'] = 'Role added.';
            $data['roles'] = $this->roles->getAll();
            $this->load->view('roles/list', $data);
        }

        $this->load->view('footer');
    }
    public function edit($id)
    {
        $this->load->view('header');
        $this->load->view('side_bar');

        $this->form_validation->set_rules('name', 'Name', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $data['role'] = $this->roles->getOne($id);
            $this->load->view('roles/edit', $data);
        }
        else
        {
            $this->roles->update($id,
                array(
                    'name'=> $this->input->post('name'),

                    'view_log'=> empty($this->input->post('logs_view')) ? 0 : $this->input->post('logs_view'),
                    'add_log'=> empty($this->input->post('logs_add')) ? 0 : $this->input->post('logs_add'),
                    'edit_log'=> empty($this->input->post('logs_edit')) ? 0 : $this->input->post('logs_edit'),
                    'delete_log'=> empty($this->input->post('logs_delete')) ? 0 : $this->input->post('logs_delete'),

                    'view_shelter'=> empty($this->input->post('shelters_view')) ? 0 : $this->input->post('shelters_view'),
                    'add_shelter'=> empty($this->input->post('shelters_add')) ? 0 : $this->input->post('shelters_add'),
                    'edit_shelter'=> empty($this->input->post('shelters_edit')) ? 0 : $this->input->post('shelters_edit'),
                    'delete_shelter'=> empty($this->input->post('shelters_delete')) ? 0 : $this->input->post('shelters_delete'),
                    'shelter_reboot'=> empty($this->input->post('shelters_reboot')) ? 0 : $this->input->post('shelters_reboot'),
                    'shelter_clear'=> empty($this->input->post('shelters_clear')) ? 0 : $this->input->post('shelters_clear'),
                    'shelter_push'=> empty($this->input->post('shelters_push')) ? 0 : $this->input->post('shelters_push'),

                    'view_content'=> empty($this->input->post('contents_view')) ? 0 : $this->input->post('contents_view'),
                    'add_content'=> empty($this->input->post('contents_add')) ? 0 : $this->input->post('contents_add'),
                    'edit_content'=> empty($this->input->post('contents_edit')) ? 0 : $this->input->post('contents_edit'),
                    'delete_content'=> empty($this->input->post('contents_delete')) ? 0 : $this->input->post('contents_delete'),
                    'content_push'=> empty($this->input->post('contents_push')) ? 0 : $this->input->post('contents_push'),

                    'view_ads'=> empty($this->input->post('ads_view')) ? 0 : $this->input->post('ads_view'),
                    'add_ads'=> empty($this->input->post('ads_add')) ? 0 : $this->input->post('ads_add'),
                    'edit_ads'=> empty($this->input->post('ads_edit')) ? 0 : $this->input->post('ads_edit'),
                    'delete_ads'=> empty($this->input->post('ads_delete')) ? 0 : $this->input->post('ads_delete'),
                    'ads_push'=> empty($this->input->post('ads_push')) ? 0 : $this->input->post('ads_push'),

                    'view_site'=> empty($this->input->post('sites_view')) ? 0 : $this->input->post('sites_view'),
                    'add_site'=> empty($this->input->post('sites_add')) ? 0 : $this->input->post('sites_add'),
                    'edit_site'=> empty($this->input->post('sites_edit')) ? 0 : $this->input->post('sites_edit'),
                    'delete_site'=> empty($this->input->post('sites_delete')) ? 0 : $this->input->post('sites_delete'),

                    'view_partner'=> empty($this->input->post('partners_view')) ? 0 : $this->input->post('partners_view'),
                    'add_partner'=> empty($this->input->post('partners_add')) ? 0 : $this->input->post('partners_add'),
                    'edit_partner'=> empty($this->input->post('partners_edit')) ? 0 : $this->input->post('partners_edit'),
                    'delete_partner'=> empty($this->input->post('partners_delete')) ? 0 : $this->input->post('partners_delete'),
                    'partner_push'=> empty($this->input->post('partners_push')) ? 0 : $this->input->post('partners_push'),

                    'view_message'=> empty($this->input->post('shelters_view')) ? 0 : $this->input->post('shelters_view'),
                    'add_message'=> empty($this->input->post('messages_view')) ? 0 : $this->input->post('messages_view'),
                    'edit_message'=> empty($this->input->post('messages_edit')) ? 0 : $this->input->post('messages_edit'),
                    'delete_message'=> empty($this->input->post('messages_delete')) ? 0 : $this->input->post('messages_delete'),
                    'message_push'=> empty($this->input->post('messages_push')) ? 0 : $this->input->post('messages_push'),

                    'view_user'=> empty($this->input->post('users_view')) ? 0 : $this->input->post('users_view'),
                    'add_user'=> empty($this->input->post('users_add')) ? 0 : $this->input->post('users_add'),
                    'edit_user'=> empty($this->input->post('users_edit')) ? 0 : $this->input->post('users_edit'),
                    'delete_user'=> empty($this->input->post('users_delete')) ? 0 : $this->input->post('users_delete')
                ));
            $data['message'] = 'Role updated.';
            $data['roles'] = $this->roles->getAll();
            $this->load->view('roles/list', $data);
        }

        $this->load->view('footer');
    }
    public function delete($id)
    {
        $this->load->view('header');
        $this->load->view('side_bar');
        $users = $this->users->getByRole($id);
        if(count($users) > 0){

            $data['error'] = 'Can\'t delete this role. Some users are attached to this.';
        }
        else{
            $this->roles->delete($id);
            $data['message'] = 'Role deleted.';
        }
        $data['roles'] = $this->roles->getAll();
        $this->load->view('roles/list', $data);
        $this->load->view('footer');
    }
}
