<?php 
	
class Register extends CI_Controller 
{
	public function index()
	{
		$this->load->view('register_view');
	}

	public function registration()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'required|alpha');
		$this->form_validation->set_rules('alias', 'Alias', 'required|alpha');
		$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
		$this->form_validation->set_rules('birthdate', 'Birthdate', 'required');
		if($this->form_validation->run() === FALSE) //not success
		{
			$this->session->set_flashdata('errors', validation_errors());
			redirect(base_url('register'));
		}
		else //success
		{
			$this->session->set_flashdata('success', 'You have successfully registered!');
			$this->load->model('users_model');
			// encrypting password
			$this->load->library('encrypt');
			$hash = $this->encrypt->sha1($this->input->post('password'));

			$user_details = array(
				'name' => $this->input->post('name'),
				'alias' => $this->input->post('alias'),
				'email' => $this->input->post('email'),
				'password' => $hash,
				'birthdate' => $this->input->post('birthdate')
				);
			$add_user = $this->users_model->add_user($user_details);

			redirect(base_url('login'));
		}
	}
}
 ?>