<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="assets/css/login_register.css">
</head>
<body>
<div id='container'>
	<div id='header'>
			<h1>Friend Finder Login</h1>
	</div>
	<div id='alerts'>
		<?php
			echo "<div id='success'>".$this->session->flashdata('success')."</div>";
			echo "<div id='error'>".$this->session->flashdata('errors')."</div>";
		?>
	</div>
	<div id='login'>
		<form action='<?= base_url('login/signin') ?>' method='post'>
			<p><b>Email:</b><br> <input type='text' name='email'></p>
			<p><b>Password:</b><br> <input type='password' name='password'></p>
			<input type='submit' id='add' value='Login'>
		</form>
	</div>
	<p>Not a member? <a href="<?= base_url('register') ?>">Register Here</a></p>
</div>
</body>
</html>