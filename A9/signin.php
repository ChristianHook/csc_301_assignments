<?php

session_start();
$title = 'Sign In for Dog Adoption';
if(isset($_SESSION['user/uID'])) die('You are logged in. <a href="index.php"> Home page </a>');


if(count($_POST)>0){
	//if user sends the form
	//validate the data

		if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) return 'The email address is not valid';

		$settings = [
			'host' => 'localhost',
			'db' => 'hook_project',
			'user' => 'root',
			'pass' => ''
		];

		$opt=[
			PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES=>false,
		];

		$pdo = new PDO('mysql:host='.$settings['host'].';dbname='.$settings['db'].';charset=utf8mb4',$settings['user'],$settings['pass'],$opt);

		$query=$pdo->prepare('SELECT ID FROM user WHERE email=? AND password=?');
		$query->execute([$_POST['email'],$_POST['password']]);
		if($query->rowCount()>0)  {
			$_SESSION['user/email']=$_POST['email'];
			$_SESSION['user/uID']=$query->execute();

			die('You have been logged in - you can now go back to the dog adoption <a href="index.php"> home page to create, delete, and modify dog profiles. </a>');

		}
		else {
			die('The email you entered is not associate with any account. <a href="signup.php"> Create an account. </a>');
		}
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