<?php 

class Login extends CI_Controller
{
	public function index()
	{
		$this->load->view('login_view');
	}

	public function signin()
	{
		$this->load->model('users_model');
		$email = $this->input->post('email');
		$this->load->library('encrypt');
		$password = $this->encrypt->sha1($this->input->post('password'));
		$get_user = $this->users_model->login_user($email);
		if($get_user && $get_user['password'] == $password) //login success
		{
			$user = array(
				'id'=>$get_user['id'],
				'name'=>$get_user['name'],
				'alias'=>$get_user['alias'],
				'email'=>$get_user['email']
			);
			$this->session->set_userdata('user', $get_user);

			// $this->load->view('home_view', $get_users);
			redirect(base_url('home'));
		}
		else
		{
			$this->session->set_flashdata('errors', 'Invalid email or password');
			redirect(base_url());
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
		// exit;
	}
}	

 ?>