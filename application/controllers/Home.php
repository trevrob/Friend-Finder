<?php 
class Home extends CI_Controller
{
	public function index()
	{
		$this->load->model('users_model');

		$get_users = $this->users_model->show_users();
		$this->session->set_userdata('users', $get_users);

		$this->load->model('friends_model');
		$user = $this->session->userdata('user');
		$user_info['id'] = $user['id'];
		$get_friends = $this->friends_model->get_friends_by_id($user_info);
		$this->session->set_userdata('friends', $get_friends);

		$user_data['users'] = $get_users;
		$user_data['friends'] = $get_friends;

		$this->load->view('home_view', $user_data);
	}

	public function add_friend()
	{
		$this->load->model('friends_model');
		$friend_info['user_id'] = $this->input->post('user_id');
		$friend_info['friend_id'] = $this->input->post('friend_id');

		$this->friends_model->add_friend($friend_info);
		redirect(base_url('home'));
	}

	public function show()
	{

		$this->load->model('friends_model');
		$user = $this->session->userdata('user');
		$user_info['id'] = $user['id'];
		$get_friends = $this->friends_model->get_friends_by_id($user_info);
		$this->session->set_userdata('friends', $get_friends);

		
		$user_data['friends'] = $get_friends;

		$this->load->view('profile_view', $user_data);
	}

	// public function remove_friend($id)
	// {
	// 	$this->load->model("friends_model");
	// 	$this->notes_model->remove_friend($id,'friend_id');

	// }
}
 ?>