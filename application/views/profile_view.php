<html>
<head>
	<title>Profile Page</title>
	<style type="text/css">

body {
	background-image: url(/assets/wild_flowers.png);
	font-family: sans-serif;
}
	#head{
		text-align: right;
	}

	#profile{
		background-color: #CCCCCC;
		text-align: left;
		border:hidden;
		border-radius: 10px;
		padding: 10px;
		width: 700px;
		margin-left: 30%;
	}
	h1{
		
		color: #673F75;
		text-shadow: 1px 1px 6px rgba(0, 0, 0, 0.5);
		background-color: #A4A4A4;
		color:#673F75;
		padding: 2% 0% 2% 1%;
		border:hidden;
		border-radius: 5px;
		text-shadow: 1px 1px 6px rgba(0, 0, 0, 0.5);
	}
	a{
		float: right;
		padding-left: 5px;
		text-decoration: none;
		font-weight: bold;
	}

	</style>
</head>
<body>
	<div id='profile'>
		<a href="/home">Home</a>
		<a href="/">Logout |</a>
<?php
		$logged_user = $this->session->userdata('user');
			$users = $this->session->userdata('users');
			$friends = $this->session->userdata('friends');
			$friend = $friends[0];

		echo "<h1> {$friend['alias']}'s Profile</h1><hr>";
		echo "<p> <b>Name:</b> {$friend['name']}</p>";
		echo "<p> <b>Email Address:</b> {$friend['email']}</p>";	
?>
	</div>

</body>
</html>