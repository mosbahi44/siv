<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $isLogin = $this->session->userdata('loggedIn');
        if(isset($isLogin) && is_numeric($isLogin))
            redirect(base_url('index.php/dashboard'));
    }

    public function index()
    {
        $data = array();
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE)
        {

        }
        else{
            $user = $this->users->getByEmail($this->input->post('email'));
            if($user){
                if($user->password == $this->input->post('password')){
                    $this->session->set_userdata('loggedIn', $user->id);
                    $this->session->set_userdata('name', $user->name);
                    $role = $this->roles->getOne( $user->id);
                    if($role)
                        $rolen= $role->name;
                    else
                        $rolen = '';
                    $this->session->set_userdata('role', $rolen);

                    //SET PERMISSIONS
                    $this->session->set_userdata('role_id',$role->id);

                    $this->session->set_userdata('view_log',$role->view_log);
                    $this->session->set_userdata('add_log',$role->add_log);
                    $this->session->set_userdata('edit_log',$role->edit_log);
                    $this->session->set_userdata('delete_log',$role->delete_log);

                    $this->session->set_userdata('view_shelter',$role->view_shelter);
                    $this->session->set_userdata('add_shelter',$role->add_shelter);
                    $this->session->set_userdata('edit_shelter',$role->edit_shelter);
                    $this->session->set_userdata('delete_shelter',$role->delete_shelter);
                    $this->session->set_userdata('shelter_reboot',$role->shelter_reboot);
                    $this->session->set_userdata('shelter_clear',$role->shelter_clear);
                    $this->session->set_userdata('shelter_push',$role->shelter_push);

                    $this->session->set_userdata('view_content',$role->view_content);
                    $this->session->set_userdata('add_content',$role->add_content);
                    $this->session->set_userdata('edit_content',$role->edit_content);
                    $this->session->set_userdata('delete_content',$role->delete_content);
                    $this->session->set_userdata('content_push',$role->content_push);

                    $this->session->set_userdata('view_ads',$role->view_ads);
                    $this->session->set_userdata('add_ads',$role->add_ads);
                    $this->session->set_userdata('edit_ads',$role->edit_ads);
                    $this->session->set_userdata('delete_ads',$role->delete_ads);
                    $this->session->set_userdata('ads_push',$role->ads_push);

                    $this->session->set_userdata('view_site',$role->view_site);
                    $this->session->set_userdata('add_site',$role->add_site);
                    $this->session->set_userdata('edit_site',$role->edit_site);
                    $this->session->set_userdata('delete_site',$role->delete_site);

                    $this->session->set_userdata('view_partner',$role->view_partner);
                    $this->session->set_userdata('add_partner',$role->add_partner);
                    $this->session->set_userdata('edit_partner',$role->edit_partner);
                    $this->session->set_userdata('delete_partner',$role->delete_partner);
                    $this->session->set_userdata('partner_push',$role->partner_push);

                    $this->session->set_userdata('view_message',$role->view_message);
                    $this->session->set_userdata('add_message',$role->add_message);
                    $this->session->set_userdata('edit_message',$role->edit_message);
                    $this->session->set_userdata('delete_message',$role->delete_message);
                    $this->session->set_userdata('message_push',$role->message_push);

                    $this->session->set_userdata('view_user',$role->view_user);
                    $this->session->set_userdata('add_user',$role->add_user);
                    $this->session->set_userdata('edit_user',$role->edit_user);
                    $this->session->set_userdata('delete_user',$role->delete_user);




                    redirect(base_url('index.php/dashboard'));
                }
                else{
                    $data['message'] = 'Invalid Email/password';
                }
            }
            else
                $data['message'] = 'Invalid Email/password';
        }
        $this->load->view('login', $data);
    }
}
