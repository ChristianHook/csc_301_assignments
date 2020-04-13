<?php

session_start();
$title = 'Update Account';

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


<form action = "modify_user.php?id=<?= $_SESSION['user/uID']?>" method = "POST"> 
E-mail:
<input type = "email" name = "email" value="<?= $user['email'] ?>" required/> <br />
Password:
<input type = "password" name = "password" value="<?= $user['password'] ?>" minlength = "8" required/> <br />
Name:
<input type="text" name="name" value="<?= $user['name'] ?>" required/> <br />
Role (leave blank if unsure):
<input type="text" name="role" value="<?= $user['role'] ?>" required/> <br />
Admin (leave blank if unsure):
<input type="text" name="admin" value="<?= $user['admin'] ?>" required/> <br />
Age Preference of Dog:
<input type="text" name="age_pref" value="<?= $user['age_pref'] ?>" required/> <br />
Gender Preference of Dog:
<input type="text" name="gender_pref" value="<?= $user['gender_pref'] ?>" required/> <br />
Breed Preference of Dog:
<input type="text" name="breed_pref" value="<?= $user['breed_pref'] ?>"required/> <br />
House Trained Preference of Dog:
<input type="text" name="house_trained_pref" value="<?= $user['house_trained_pref'] ?>"required/> <br />

<button type = "submit"> Modify User </button>
</form>
<?php 
require_once('footer.php');
?>