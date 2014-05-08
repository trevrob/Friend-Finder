<?php 

class Users_Model extends CI_Model
{
	function add_user($user)
	{
		$query = "INSERT INTO users (name, alias, email, password, birthdate, created_at, updated_at)
				  VALUES (?, ?, ?, ?, ?, NOW(), NOW())";
		$values = array($user['name'], $user['alias'], $user['email'], $user['password'], $user['birthdate']);
		return $this->db->query($query, $values);
	}

	function login_user($email)
	{
		$query = "SELECT * FROM users WHERE email = ?";

		return $this->db->query($query, array($email))->row_array();
	}

	function show_users()
	{
		return $this->db->query("SELECT * FROM users")->result_array();
	}

	function add_friend($friend)
	{
		$query = "INSERT INTO friends (users_id, friend_id)
				  VALUES (?, ?)";
		$values = array($friend['user_id'], $friend['friend_id']);
		return $this->db->query($query, $values);
	}
}
 ?>