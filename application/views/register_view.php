<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="assets/css/login_register.css">
</head>
<body>

	<div id='container'>
		<div id='header'>
			<h1>Register Here</h1>
		</div>
		<div id='register'>
			<form action='<?= base_url('register/registration') ?>' method='post'>
				<p><b>Name:</b><br> <input type='text' name='name'></p>
				<p><b>Alias:</b><br> <input type='text' name='alias'></p>
				<p><b>Email Address:</b><br> <input type='text' name='email'></p>
				<p><b>Password:</b><br> <input type='password' name='password'></p>
				<p><b>Confirm Password:</b><br> <input type='password' name='confirm_password'></p>
				<p><b>Birthdate:</b><br> <input type='date' name='birthdate'></p>
				<input id='add' type='submit' value='Register'>
			</form>
		</div>

		<div id ='error'>
		<?php
			echo $this->session->flashdata('errors');
		?>
		</div>
		<div id='footer'>
			<p>Already a member? <a href="<?= base_url('login') ?>">Login Here</a></p>
		</div>
	</div>
</body>
</html>