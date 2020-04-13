<?php
$title = 'Signout of Dog Adoption Account';
session_start();
if(!isset($_SESSION['user/uID'])) die('You are not logged in to begin with. <a href="signin.php"> Log in </a>');
$_SESSION=[];
session_destroy();
echo 'You have been logged out, go back to the <a href="index.php">dog adoption home page. </a>';

require_once('header.php');
require_once('footer.php');
?>