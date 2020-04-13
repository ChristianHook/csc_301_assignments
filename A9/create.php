<?php

session_start();
$title = 'Update Dog Info';

if(!isset($_SESSION['user/uID'])) die('You are not logged in. <a href="index.php"> Home page </a>');


if(count($_POST)>0){
	require_once('user.php');
	$user = new User;
	$error=$user->update($_POST);
	die('<a href="index.php"> User modified, go back to homepage. </a>');

}


require_once('header.php');


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

$query = ('SELECT * FROM user WHERE ID=?');

$q=$pdo->prepare($query);

$q->execute([$_SESSION['user/uID']]);

if($q->rowCount()==0){
	die('<a href="index.php"> There are no users matching your selection. </a>');
}
else {
	$user = $q->fetch();


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
Adopted? (0 or 1): <input type="text" name="adopted"><br>
Bio: <input type="text" name="bio"><br>
<input type="submit">

</form>

</body>
</html>