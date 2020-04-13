<?php 
session_start();
require_once('functions.php');
require_once('CSVutility.php');
require_once('dog.php');

if(!isset($_SESSION['admin'])) {
      $dogs = array_filter(readCSV('data/dogs.csv'));

  $title = 'All of the Dogs';
  require_once('header.php');
  ?>

      <div class="jumbotron jumbotron-fluid">
        <a href="signup.php" class="btn btn-secondary">Sign Up</a>
        <a href="signin.php" class="btn btn-secondary">Sign In</a>
        <a href="signout.php" class="btn btn-secondary">Sign Out</a>

    <div class="container">
      <br>
      <h1 class="display-4">Dog Adoption</h1>
      <p class="lead">Look through the profile cards for each dog below!</p>
    </div>
  </div>
      <div class="row row-cols-1 row-cols-md-2" align="center">
    <?php
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

      $dogs=$pdo->query('SELECT * from dog');
      $dogs = $dogs->fetch(PDO::FETCH_ASSOC);
      $dog = $dogs['name'];
      $dog++;
      // while($dogs=$dogs->fetch()) {
      //   $p= new Dog($dogs);
      //   //$p->showPreview($dogs['ID']);
      // }

  require_once('footer.php');
}

elseif ($_SESSION['admin'] == 1){

  $dogs = array_filter(readCSV('data/dogs.csv'));

  $title = 'All of the Dogs';
  require_once('header.php');
  ?>

      <div class="jumbotron jumbotron-fluid">
        <a href="signup.php" class="btn btn-secondary">Sign Up</a>
        <a href="signin.php" class="btn btn-secondary">Sign In</a>
        <a href="modify_user.php" class="btn btn-secondary">Update User</a>
        <a href="signout.php" class="btn btn-secondary">Sign Out</a>

    <div class="container">
      <br>
      <h1 class="display-4">Dog Adoption</h1>
      <p class="lead">Look through the profile cards for each dog below!</p>
      <a href="create.php" class="btn btn-primary">Add a Dog</a>
    </div>
  </div>
      <div class="row row-cols-1 row-cols-md-2" align="center">
    <?php
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

      $dogs=$pdo->query('SELECT * from dog');
      $dogs = $dogs->fetch(PDO::FETCH_ASSOC);
      $dog = $dogs['name'];
      $dog++;
      // while($dogs=$dogs->fetch()) {
      //   $p= new Dog($dogs);
      //   //$p->showPreview($dogs['ID']);
      // }

  require_once('footer.php');
}

elseif ($_SESSION['admin'] == 0){

      $dogs = array_filter(readCSV('data/dogs.csv'));

  $title = 'All of the Dogs';
  require_once('header.php');
  ?>

      <div class="jumbotron jumbotron-fluid">
        <a href="signup.php" class="btn btn-secondary">Sign Up</a>
        <a href="signin.php" class="btn btn-secondary">Sign In</a>
        <a href="signout.php" class="btn btn-secondary">Sign Out</a>

    <div class="container">
      <br>
      <h1 class="display-4">Dog Adoption</h1>
      <p class="lead">Look through the profile cards for each dog below!</p>
    </div>
  </div>
      <div class="row row-cols-1 row-cols-md-2" align="center">
    <?php
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

      $dogs=$pdo->query('SELECT * from dog');
      $dogs = $dogs->fetch(PDO::FETCH_ASSOC);
      $dog = $dogs['name'];
      $dog++;
      // while($dogs=$dogs->fetch()) {
      //   $p= new Dog($dogs);
      //   //$p->showPreview($dogs['ID']);
      // }

  require_once('footer.php');
}


