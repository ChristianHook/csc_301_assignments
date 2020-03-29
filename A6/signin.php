<?php

session_start();
require_once('file.php');
$title = 'Sign In for Dog Adoption';
if(isset($_SESSION['user/uID'])) die('You are logged in. <a href="index.php"> Home page </a>');


if(count($_POST)>0){
	//if user sends the form
	//validate the data
	if(!isset($_POST['email']{0}) || !isset($_POST['password']{0})) return('You must enter e-mail and password');

	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) return('Please enter valid email address');

	$_POST['email']=strtolower($_POST['email']);

	$_POST['password'] = trim($_POST['password']);

	if(strlen($_POST['password']) < 8) return('Please enter a password that is at least 8 characters long');

	//create file
	if(!file_exists('database.csv')) {
		$h=File::read('database.csv','w');
		fwrite($h, '');
		fclose($h);
	}
	//check if email exists
	$h=fopen('database.csv','r');
	$userid=1;
	while(!feof($h)) {
		$line=fgets($h);
		if(strstr($line, $_POST['email'])) {
			$line = explode(';', $line);
			//check passwords
			if(!password_verify($_POST['password'],trim($line[1]))) return('The pswrd you entered is not correct');
			$_SESSION['user/email']=$_POST['email'];
			$_SESSION['user/uID']=$userid;

			//write confirmation 
			die('You have been logged in - you can now go back to the dog adoption <a href="index.php"> home page to create, delete, and modify dog profiles. </a>');

			//header('location:index.php');
			//confirmation
			//echo 'Welcome to our website';
			//die();
		}
		$userid++;
	}

	fclose($h);

	die('The email you entered is not associate with any account. <a href="signup.php"> Create an account. </a>');
	//encrypt
	$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

}


require_once('header.php');
?>

<form action = "signin.php" method = "POST"> 
E-mail:
<input type = "email" name = "email" required/> <br />
Password:
<input type = "password" name = "password" minlength = "8" required/> <br />
<button type = "submit"> Sign In </button>
</form>
<?php 
require_once('footer.php');
?>