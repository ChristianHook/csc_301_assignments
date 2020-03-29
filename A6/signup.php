<?php

session_start();
if(isset($_SESSION['user/uID'])) die('You are logged in');
$title = 'Signup for Dog Adoption';


if(count($_POST)>0){
//if user sends the form
	//validate the data
	require_once('user.php');
	$user = new User;
	$error=$user->create($_POST);
	if(isset($error{0})){
		$message=$error;
		$alert_type='danger';
	}
	else{
		$message='The user has been added';
		$alert_type='success';
	}

	
}
require_once('header.php');
?>

<form action = "signup.php" method = "POST"> 
E-mail:
<input type = "email" name = "email" required/> <br />
Password:
<input type = "password" name = "password" minlength = "8" required/> <br />
<button type = "submit"> Create Account </button>
</form>

<?php 
require_once('footer.php');
?>