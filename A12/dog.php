<?php

class Dog {
	public $name;
	public $age;
	public $gender;
	public $breed;
	public $house_trained;
	public $bio;
	public $adopted;
	public $picture;

	public function __construct($name=null,$age=null,$gender=null,$breed=null, $house_trained=null,$bio=null,$adopted=null,$picture=null){

		$this->name=$name;
		$this->age=$age;
		$this->gender=$gender;
		$this->breed=$breed;
		$this->house_trained=$house_trained;
		$this->bio=$bio;
		$this->adopted=$adopted;
		$this->picture=$picture;
	}

	public function create($data) {

		if(!isset($data['name']{0}) || !isset($data['age']{0}) || !isset($data['gender']{0})) return 'Some important fields are missing';

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


		$query = ('INSERT INTO dog (name, age, gender, breed, house_trained, bio, adopted, picture) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');

		$q=$pdo->prepare($query);

		$q -> execute([$data['name'],$data['age'],$data['gender'],$data['breed'], $data['trained'], $data['bio'], $data['adopted'], $data['picture']]);
	}

	public function update($data) {

		if(!isset($data['name']{0}) || !isset($data['age']{0}) || !isset($data['gender']{0})) return 'Some important fields are missing';

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

		$query = ('UPDATE dog SET name=?,age=?,gender=?,breed=?,house_trained=?, bio=?,adopted=?,picture=? WHERE ID=?');

		$q=$pdo->prepare($query);

		$q -> execute([$data['name'],$data['age'],$data['gender'],$data['breed'], $data['trained'], $data['bio'], $data['adopted'], $data['picture'], $_SESSION['user/uID']]);
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

		$query=$pdo->prepare('UPDATE dog SET adopted=1 WHERE ID=?');
		$query->execute([$id]);
	}

	public function showPreview($id) {
			echo '  <div class="col mb-4">
		    <div class="shadow p-3 mb-5 bg-white rounded" style="max-width: 30rem;">
		      <img src="'.$this->picture.'" class="card-img-top rounded" alt="Profile Pic">
		      <div class="card-body">
		        <h4 class="card-title">'.$this->name.'</h4>
		        <p> <b> Breed: </b>'.$this->breed.'</p>
		        <p> <b> Age Range: </b>'.$this->age.'</p>
		        <p> <b> Gender: </b>'.$this->gender.'</p>
		        <a href="detail.php?id='.$id.'" class="btn btn-primary">See Profile</a>
		      </div>
		    </div>
		  </div>';
		}
	
}