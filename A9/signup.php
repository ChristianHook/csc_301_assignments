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
	die('<a href="index.php"> User created, go back to homepage. </a>');
	// if(isset($error{0})){
	// 	$message=$error;
	// 	$alert_type='danger';
	// }
	// else{
	// 	$message='The user has been added';
	// 	$alert_type='success';
	// }

	
}
require_once('header.php');
?>

<form action = "signup.php" method = "POST"> 
E-mail:
<input type = "email" name = "email" required/> <br />
Password:
<input type = "password" name = "password" minlength = "8" required/> <br />
Name:
<input type="text" name="name" required/> <br />
Role (leave blank if unsure):
<input type="text" name="role" required/> <br />
Admin (leave blank if unsure):
<input type="text" name="admin" required/> <br />
Age Preference of Dog:
<input type="text" name="age_pref" required/> <br />
Gender Preference of Dog:
<input type="text" name="gender_pref" required/> <br />
Breed Preference of Dog:
<input type="text" name="breed_pref" required/> <br />
House Trained Preference of Dog:
<input type="text" name="house_trained_pref" required/> <br />

<button type = "submit"> Create Account </button>
</form>

<?php 
require_once('footer.php');
?>