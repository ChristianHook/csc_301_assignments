<?php
session_start();
if(!isset($_SESSION['user/uID'])) die('You are not logged in. <a href="signin.php"> Log in </a>');
require_once('CSVutility.php');


# if post is not empty count(POST > 0) -> process info, otherwise show the form

if (count($_POST) > 0) {
	#print_r($_POST);

	require_once('dog.php');
	$dog = new Dog;
	$error=$dog->create($_POST);

	if(isset($error{0})){
		$message=$error;
		$alert_type='danger';
	}
	else{
		header('Location: index.php');
	}
	//writeCSV('data/dogs.csv', $_POST);
   	die();
}

?>
<html>
<body>
	<title> Add New Dog </title>
<h1> Insert New Dog for Adoption </h1>
<form method="post">
Name: <input type="text" name="name"><br>
Age: <input type="text" name="age"><br>
Gender: <input type="text" name="gender"><br>
Insert Link to Picture: <input type="text" name="picture"><br>
Breed: <input type="text" name="breed"><br>
House Trained?: <input type="text" name="trained"><br>
Bio: <input type="text" name="bio"><br>
<input type="submit">

</form>

</body>
</html>