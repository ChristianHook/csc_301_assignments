<?php

class User {
	public $email;
	public $password;
	public $name;
	public $role;
	public $admin;
	public $age_pref;
	public $gender_pref;
	public $breed_pref;
	public $house_trained_pref;

	public function __construct($email=null,$password=null,$name=null,$role=null, $admin=null,$age_pref=null,$gender_pref=null,$breed_pref=null, $house_trained_pref = null){

		$this->email=$email;
		$this->password=$password;
		$this->name=$name;
		$this->role=$role;
		$this->admin=$email;
		$this->age_pref=$age_pref;
		$this->gender_pref=$gender_pref;
		$this->breed_pref=$breed_pref;
		$this->house_trained_pref=$house_trained_pref;
	}

	public function create($data) {

		if(!isset($data['email']{0}) || !isset($data['password']{0}) || !isset($data['name']{0})) return 'Some fields are missing';
		if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL)) return 'The email address is not valid';

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

		$query=$pdo->prepare('SELECT ID FROM user WHERE email=?');
		$query->execute([$data['email']]);
		if($query->rowCount()>0)  die('The user is already registered');


		$query = ('INSERT INTO user (name, email, password, role, admin, age_pref, gender_pref, breed_pref, house_trained_pref) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)');

		$q=$pdo->prepare($query);

		$q -> execute([$data['email'],$data['password'],$data['name'],$data['role'], $data['admin'], $data['age_pref'], $data['gender_pref'], $data['breed_pref'], $data['house_trained_pref']]);
		return '';
	}

	public function update($data) {

		if(!isset($data['email']{0}) || !isset($data['password']{0}) || !isset($data['name']{0})) return 'Some fields are missing';
		if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL)) return 'The email address is not valid';

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

		$query = ('UPDATE user SET email=?,password=?,name=?,role=?,admin=?, age_pref=?,gender_pref=?,breed_pref=?,house_trained_pref=? WHERE ID=?');

		$q=$pdo->prepare($query);

		$q -> execute([$data['email'],$data['password'],$data['name'],$data['role'], $data['admin'], $data['age_pref'], $data['gender_pref'], $data['breed_pref'], $data['house_trained_pref'], $_SESSION['user/uID']]);
		return '';
	}

	public function delete($id){
		// delete a user;
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

		$query=$pdo->prepare('UPDATE user SET role=-1 WHERE ID=?');
		$query->execute([$id]);
	}
}