<?php
require_once('file.php');
class Dog{
	public $name;
	public $age;
	public $gender;
	public $picture;
	public $breed;
	public $trained;
	public $bio;
	
	public function __construct($name=null,$age=null,$gender = null,$picture = null,$breed = null,$trained = null,$bio = null){
		$this->name=$name;
		$this->age=$age;
		$this->gender=$gender;
		$this->picture=$picture;
		$this->breed=$breed;
		$this->trained=$trained;
		$this->bio=$bio;
		
	}
	public function create($data){
		// filter data
		writeCSV('data/dogs.csv', $data);
	}

}