<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="assets/css/login_register.css">
	<style type="text/css">
	td{
		font-size: 14px;
	}
	h2{
		color: #2E2E2E;
	}
	form{
		margin-bottom: 0;
	}
	#add{
		font-style: italic;
	}

	</style>
</head>
<body>
	<div id='container'>
		<div id='header'>
<?php 
			$logged_user = $this->session->userdata('user');
			$users = $this->session->userdata('users');
			$friends = $this->session->userdata('friends');
			echo "<h1> Hello, ".$logged_user['name']."</h1>";

?>
			<a id='logout' href='<?= base_url('login/logout') ?>'>Logout</a>
		</div>
		<div id='content'>
			<h2>Friend List</h2>
			<hr>
<?php 
			// var_dump($this->session->all_userdata());
			if(!empty($friends))
			{ 
?>
			<table>
				<th>Name</th>
				<th>Alias</th>
				<th>Action</th>
				<tbody>
<?php 
				
					foreach($friends as $friend)
					{
?>
						<tr>
							<td><?= $friend['name'] ?></td>
							<td><?= $friend['alias'] ?></td>
							<td>
								<a href="home/show" class='view_profile'>View Profile</a>
							</td>
						</tr>
<?php
					}
			}
			else
			{
				echo "<h5>You currently dont have any friends, you should add some friends</h5>";
			}
?>
				</tbody>
			</table>
			<h2>Other Users...</h2>
			<hr>
			
			<table>
				<th>Name</th>
				<th>Alias</th>
				<th>Action</th>
				<tbody>
<?php 
				
				foreach($users as $user)
				{
	
?>							
<?php
								if($logged_user['id'] == $user['id'] )
								{
									continue;
								}
								$found = false;
								foreach ($friends as $friend) 
								{
									if($friend['id'] == $user['id'])
									{
										$found = true;
									}

								}
								if($found == true)
								{
									continue;
								}
?>
							<tr>
							<td><a href="home/show"><?= $user['name'] ?></a> </td>
							<td><?= $user['alias'] ?></td>
							<td>
								<form action='<?= base_url('home/add_friend') ?>' method='post'>
									<input type='hidden' name='friend_id' value='<?= $user['id'] ?>'>
									<input type='hidden' name='user_id' value='<?= $logged_user['id'] ?>'>
									<input type='submit' id='add' value='Add as Friend'>
			 					</form>
<?php 							

?>
		 					</td>
							<tr>
<?php  							
						
				}
?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>