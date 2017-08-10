<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$autoload['helper'] = array('url');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Register</title>	
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
</head>
<body>

<div id="container">
	
	<div class="col-lg-8 col-lg-offset-2">
	<h1 class="text-center">Create User</h1>
	<?php if(isset($_SESSION['success'])){ 
		echo '<div class="alert alert-success">'.$_SESSION['success'].'</div>';
	} 
	if(isset($_SESSION['failed'])){ 
		echo '<div class="alert alert-danger">'.$_SESSION['failed'].'</div>';
	} 
	?>
	<?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
	<form action="" method="POST">
		<div class="form-group">
			<label for="name" >Name:</label>		
			<input type="text" name="name" id="name" class="form-control">
		</div>
		<div " class="form-group">
			<label for="lastName" >Last Name:</label>		
			<input type="text" name="lastName" id="lastName" class="form-control">
		</div>
		<div class="form-group">
			<label for="email" >Email:</label>		
			<input type="text" name="email" id="email" class="form-control">
		</div>
		<div class="form-group">
			<label for="password" >Password:</label>		
			<input type="password" name="password" id="password" class="form-control">
		</div>
		<div  class="form-group">
			<label for="password" >Confirm Password:</label>		
			<input type="password" name="password2" id="password2" class="form-control">
		</div>
		<div class="text-center">
			<button class="btn btn-primary" name="register">Register</button>
			<br><br>
			<a href="<?php echo base_url(); ?>index.php/">Log In</a>
		</div>
	</form>
	</div>
</div>

<script src="<?php echo base_url(); ?>assets/css/bootstrap.min.css"></script>
</body>
</html>