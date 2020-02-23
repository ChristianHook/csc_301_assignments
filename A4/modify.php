
<?php


require_once('functions.php');
require_once('CSVutility.php');

$dogs = readCSV('data/dogs.csv');
$index = $_GET['id'];



# if post is not empty count(POST > 0) -> process info, otherwise show the form

if (count($_POST) > 0) {
	#print_r($_POST);


	modifyCSV('data/dogs.csv', $index, $_POST);
	header('Location: index.php');
   	die();
}

?>
<html>
<body>
<title> Modify Dog </title>
<h1> Modify Dog Information </h1>
<form method="post">
Name: <input type="text" name="name" value = <?= $dogs[$_GET['id']][0] ?> ><br>
Age: <input type="text" name="age" value = <?= $dogs[$_GET['id']][1] ?>><br>
Gender: <input type="text" name="gender" value = <?= $dogs[$_GET['id']][2] ?>><br>
Insert Link to Picture: <input type="text" name="picture" value = <?= $dogs[$_GET['id']][3] ?>><br>
Breed: <input type="text" name="breed" value = <?= $dogs[$_GET['id']][4] ?>><br>
House Trained?: <input type="text" name="trained" value = <?= $dogs[$_GET['id']][5] ?>><br>
Bio: <input type="text" name="bio" value = <?= $dogs[$_GET['id']][6] ?>><br>
<input type="submit">

</form>

</body>
</html>