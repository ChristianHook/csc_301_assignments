<?php
require_once('CSVutility.php');


# if post is not empty count(POST > 0) -> process info, otherwise show the form

if (count($_POST) > 0) {
	#print_r($_POST);


	writeCSV('data/dogs.csv', $_POST);
	header('Location: index.php');
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