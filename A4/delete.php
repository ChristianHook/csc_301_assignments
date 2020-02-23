
<?php
require_once('functions.php');
require_once('CSVutility.php');

$dogs = readCSV('data/dogs.csv');
$index = $_GET['id'];


if(!is_numeric($_GET['id']) || $_GET['id']<0 || $_GET['id'] >= count($dogs)) {
	die('<a href="index.php"> Error! Go back to the home page </a>');
}



?>
<html>
<body>
	<title> Remove Dog </title>
<h2> Are you sure you want to remove <?= $dogs[$_GET['id']][0] ?> from the adoption site? </h2>
<form method="post">
    <input type="submit" name="confirm" id="confirm" value="Confirm" /><br/>
</form>

</body>
</html>

<?php


if(array_key_exists('confirm',$_POST)){
   deleteCSV('data/dogs.csv', $index);
   header('Location: index.php');
   die();
}

?>