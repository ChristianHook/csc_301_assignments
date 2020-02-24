<?php

session_start();
if(isset($_SESSION['user/uID'])) die('You are logged in');
$title = 'Signup for Dog Adoption';


if(count($_POST)>0){
//if user sends the form
	//validate the data
	if(!isset($_POST['email']{0}) || !isset($_POST['password']{0})) die('You must enter e-mail and password');

	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) die('Please enter valid email address');

	$_POST['email']=strtolower($_POST['email']);

	$_POST['password'] = trim($_POST['password']);

	if(strlen($_POST['password']) < 8) die('Please enter a password that is at least 8 characters long');

	//create file
	if(!file_exists('database.csv')) {
		$h=fopen('database.csv','w');
		fwrite($h, '');
		fclose($h);
	}
	$h=fopen('database.csv','r');
	while(!feof($h)) {
		$line=fgets($h);
		if(strstr($line, $_POST['email'])) die('The email you entered is already associated with an account');
	}

	fclose($h);

	//encrypt
	$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

	//store data
	$h = fopen('database.csv', 'a+');
	fwrite($h, $_POST['email'].';'.$_POST['password'].PHP_EOL);
	fclose($h);

	//write confirmation 
	echo 'Your account has been created - you can now <a href="signin.php">Sign in </a>';

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