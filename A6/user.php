<?php
require_once('file.php');
class User{
	public $email;
	public $password;
	
	public function __construct($email=null,$password=null){
		$this->email=$email;
		$this->password=$password;
		
	}
	public function create($data){
		// filter data
		if(!isset($data['email']{0}) || !isset($data['password']{0})) die('You must enter e-mail and password');
		if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL)) die('Please enter valid email address');

		# parameters 
		$data['email']=strtolower($data['email']);
		$data['password'] = trim($data['password']);
		if(strlen($data['password']) < 8) die('Please enter a password that is at least 8 characters long');

		//create file
		if(!file_exists('database.csv')) {
			$h=File::read('database.csv','w');
			fwrite($h, '');
			fclose($h);
		}
		//check if user is already there
		$h=File::read('database.csv','r');
		while(!feof($h)) {
			$line=fgets($h);
			if(strstr($line, $data['email'])) die('The email you entered is already associated with an account');
		}

		fclose($h);

		// encrypt password
		$data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
		// save the user
		//store data
		$h = fopen('database.csv', 'a+');
		//fwrite($h, $data['email'].';'.$data['password'].PHP_EOL);
		File::write($h, $data['email'], $data['password'], PHP_EOL);
		fclose($h);

		//write confirmation 
		echo 'Your account has been created - you can now <a href="signin.php">Sign in </a>';
	}

}