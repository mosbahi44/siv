<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$isLogin = $this->session->userdata('loggedIn');
		if(!isset($isLogin) || !is_numeric($isLogin))
			redirect(base_url('index.php/login'));
	}

	public function index()
	{
		if(!$this->session->userdata('view_user'))
			redirect(base_url('index.php/permission'));
		
		$this->load->view('header');
		$this->load->view('side_bar');
		$data['users'] = $this->users->getAll();
		$this->load->view('users/list', $data);
		$this->load->view('footer');
	}
	public function add()
	{
		if(!$this->session->userdata('add_user'))
			redirect(base_url('index.php/permission'));
		
		$this->load->view('header');
		$this->load->view('side_bar');
		$data['roles'] = $this->roles->getAll();

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('user_password', 'Password', 'required|min_length[5]');
		$this->form_validation->set_rules('user_password2', 'Password confirmation', 'required|matches[user_password]');

		if ($this->form_validation->run() == FALSE)
		{
			echo 'name : '.$this->input->post('name');
			echo 'email: '.$this->input->post('email');
			echo 'password: '.$this->input->post('user_password');
			echo 'password2: '.$this->input->post('user_password2');
			echo 'id_role: '.$this->input->post('id_role');

			$this->load->view('users/add',$data);
		}
		else
		{
			$this->users->insert(array(
				'name'=> $this->input->post('name'),
				'email'=> $this->input->post('email'),
				'password'=> $this->input->post('user_password'),
				'id_role'=> $this->input->post('id_role'),
			));
			$this->email->from('admin@app.com', 'ADMIN APP'); //TODO change sender
			$this->email->to($this->input->post('email'));

			$this->email->subject('Subscription');
			$this->email->message('You have been subscribed to our web application as '.$this->getUserRole($this->input->post('id_role')).'.<br>
			Email : '.$this->input->post('email').'<br>
			Password : '.$this->input->post('user_password').'<br>
			Thanks.');

			$this->email->send();
			$data['message'] = 'User added.';
			$data['users'] = $this->users->getAll();
			$this->load->view('users/list', $data);
		}

		$this->load->view('footer');
	}
	public function edit($id)
	{
		if(!$this->session->userdata('edit_user'))
			redirect(base_url('index.php/permission'));
		
		$this->load->view('header');
		$this->load->view('side_bar');

		$data['roles'] = $this->roles->getAll();

		$this->form_validation->set_rules('name', 'Name', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$data['user'] = $this->users->getOne($id);
			$this->load->view('users/edit', $data);
		}
		else
		{
			$this->users->update($id,
				array(
					'name'=> $this->input->post('name'),
					'id_role'=> $this->input->post('id_role')
				));
			$data['message'] = 'User updated.';
			$data['users'] = $this->users->getAll();
			$this->load->view('users/list', $data);
		}

		$this->load->view('footer');
	}


	public function profile()
	{
		$id = $this->session->userdata('loggedIn');

		$data['roles'] = $this->roles->getAll();

		$this->form_validation->set_rules('name', 'Name', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$data['user'] = $this->users->getOne($id);
			$this->load->view('header');
			$this->load->view('side_bar');
			$this->load->view('users/profile', $data);
		}
		else
		{
			$this->users->update($id,
				array(
					'name'=> $this->input->post('name')
				));
			$this->session->set_userdata('name', $this->input->post('name'));
			$data['message'] = 'Account updated.';
			$data['user'] = $this->users->getOne($id);
			$this->load->view('header');
			$this->load->view('side_bar');
			$this->load->view('users/profile', $data);
		}

		$this->load->view('footer');
	}
	
	public function delete($id)
	{
		if(!$this->session->userdata('delete_user'))
			redirect(base_url('index.php/permission'));
		
		$this->load->view('header');
		$this->load->view('side_bar');
		$this->users->delete($id);
		$data['message'] = 'User deleted.';
		$data['users'] = $this->users->getAll();
		$this->load->view('users/list', $data);
		$this->load->view('footer');
	}

	public function resetPassword($id){
	
			if(!$this->session->userdata('edit_user'))
			redirect(base_url('index.php/permission'));
		
		$this->load->view('header');
		$this->load->view('side_bar');
		$user = $this->users->getOne($id);
		if($user){
			$this->email->from('admin@app.com', 'ADMIN APP'); //TODO change sender
			$this->email->to($user->email);
			$this->load->helper('string');
			$newpass = random_string('alnum', 8);
			$this->users->update($id,
				array(
					'password'=> $newpass
				));
			$this->email->subject('Password change');
			$this->email->message('Your password have been change '.date('Y-m-d H:i:s').'.<br>
			Email : '.$user->email.'<br>
			New password : '.$newpass.'<br>
			Thanks.');
			$data['message'] = 'Password updated. Email sent to user.';
		}
		$data['users'] = $this->users->getAll();
		$this->load->view('users/list', $data);
		$this->load->view('footer');

	}

	public function getUserRole($id_role){
		$role = $this->roles->getOne($id_role);
		if($role) return $role->name;
	}

	public function changePassword(){
		$data = array();

		$id = $this->session->userdata('loggedIn');

		$data['roles'] = $this->roles->getAll();

		$this->form_validation->set_rules('old_password', 'Old password', 'required');
		$this->form_validation->set_rules('new_password', 'New password', 'required|min_length[5]');
		$this->form_validation->set_rules('user_password2', 'Confirm password', 'required|matches[new_password]');

		if ($this->form_validation->run() == FALSE)
		{
		}
		else
		{
			$user = $this->users->getOne($id);
			if($user){
				if($user->password == $this->input->post('old_password')){
					$this->users->update($id,
						array(
							'password'=> $this->input->post('new_password')
						));

					$data['message'] = 'Password updated.';
				}
				else{
					$data['errors'] = 'Invalid old password.';
				}
			}
			else
				$data['errors'] = 'Invalid user.';
			
		}
		
		$this->load->view('header');
		$this->load->view('side_bar');
		$this->load->view('users/change-password',$data);
		$this->load->view('footer');
	}

}
