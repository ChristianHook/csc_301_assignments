<?php 


$dogs = [['name' => 'Casita',
'age_range' => 'Young',
'sex' => 'Female',
'picture' => 'https://dl5zpyw5k3jeb.cloudfront.net/photos/pets/47028030/1/?bust=1578265232&width=1080',
'breed' => 'Greyhound',
'house-trained' => 'Yes',
'bio' => 'Come see all of these beautiful, elegant, gentle companions at one of our meet and greets. Check our website www.gpacincinnati.org for meet and greet info and to learn more about greyhounds as pets'],

['name' => 'Bluerock',
'age_range' => 'Young',
'sex' => 'Male',
'picture' => 'https://dl5zpyw5k3jeb.cloudfront.net/photos/pets/47028025/1/?bust=1578446920&width=1080',
'breed' => 'Greyhound',
'house-trained' => 'Yes',
'bio' => 'Come see all of these beautiful, elegant, gentle companions at one of our meet and greets. Check our website www.gpacincinnati.org for meet and greet info and to learn more about greyhounds as pets.'],

['name' => 'Dewey',
'age_range' => 'Young',
'sex' => 'Male',
'picture' => 'https://dl5zpyw5k3jeb.cloudfront.net/photos/pets/47028007/3/?bust=1578446986&width=1080',
'breed' => 'Greyhound',
'house-trained' => 'Yes',
'bio' => 'Come see all of these beautiful, elegant, gentle companions at one of our meet and greets. Check our website www.gpacincinnati.org for meet and greet info and to learn more about greyhounds as pets.'],

['name' => 'Seville',
'age_range' => 'Young',
'sex' => 'Male',
'picture' => 'https://dl5zpyw5k3jeb.cloudfront.net/photos/pets/47027999/2/?bust=1578265297&width=1080',
'breed' => 'Greyhound',
'house-trained' => 'Yes',
'bio' => 'Come see all of these beautiful, elegant, gentle companions at one of our meet and greets. Check our website www.gpacincinnati.org for meet and greet info and to learn more about greyhounds as pets.'],

['name' => 'Bella',
'age_range' => 'Adult',
'sex' => 'Female',
'picture' => 'https://dl5zpyw5k3jeb.cloudfront.net/photos/pets/45334133/6/?bust=1563799878&width=1080',
'breed' => 'Chihuahua',
'house-trained' => 'Yes',
'bio' => 'Bella is a very happy and content dog. She settled in quickly to her foster home and has been a joy to have around. She does not act like a senior. Loves walks, sometimes a little jog. Does a cute little twirly dance when excited, especially at meal times. Not a snuggler, but enjoys laying by your side or on your lap getting rub downs.'],

['name' => 'Snow',
'age_range' => 'Adult',
'sex' => 'Female',
'picture' => 'https://dl5zpyw5k3jeb.cloudfront.net/photos/pets/44144547/6/?bust=1567133981&width=1080',
'breed' => 'American Staffordshire Terrier & Boxer Mix',
'house-trained' => 'Yes',
'bio' => 'Snow is a 5-year-old Bully/Boxer mix weighing 45#. She is a lot smaller than she looks, which makes her the perfect lap dog. Snow loves belly rubs, snuggles, and occasionally a good game of tug of war. She is kid friendly, but would do best with older children. She is crate trained and house trained. She is dog friendly, but prefers low-energy dogs like herself. Snow goes to basic obedience classes which are free to her for life!'],

['name' => 'Suzie',
'age_range' => 'Senior',
'sex' => 'Female',
'picture' => 'https://dl5zpyw5k3jeb.cloudfront.net/photos/pets/42044380/2/?bust=1568684739&width=1080',
'breed' => 'Beagle Mix',
'house-trained' => 'Yes',
'bio' => 'Suzie was left homeless at a shelter after her owner drowned in a flash flood. She is guessed to be a 10-year-old Beagle mix. 

Until now, Suzie has not had much exposure to other people and dogs outside of the comfort of her previous home. Therefore, she may need slow introductions and time in a new environment.

Suzie is a couch potato and guard dog all in one. She has a very sweet and laid back personality but still has enough spunk in her to play in small spurts with her foster dog siblings.

Suzie would not do well in a home with children. She is more of a “love one person only” kind of gal. No cats. She is crate and house trained.']];

if(!is_numeric($_GET['id']) || $_GET['id']<0 || $_GET['id'] >= count($dogs)) {
	die('<a href="index.php"> Error! Go back to the home page </a>');
}
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title><?=  $dogs[$_GET['id']]['name'] ?> </title>
  </head>
  <body>
  	    <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Dog Adoption</h1>
    <p class="lead">Look through the profile of <?=  $dogs[$_GET['id']]['name'] ?>!</p>
    <a href="index.php" class="btn btn-primary">Go Back to All Dogs</a>
  </div>
</div>

  <div align = "center">
	 <div class="shadow p-3 mb-5 bg-white rounded" style="max-width: 50rem;" align = "left">
	  <img src="<?=  $dogs[$_GET['id']]['picture'] ?>" class="card-img-top" alt="...">
	  <br> <br>
	  <h3 class="card-title" align = "center"> Meet <?= $dogs[$_GET['id']]['name'] ?>!</h3>
	  <ul class="list-group list-group-flush">
	  	<li class="list-group-item"> <b> Bio: </b><?=  $dogs[$_GET['id']]['bio'] ?></li>
	    <li class="list-group-item"> <b> Breed: </b><?=  $dogs[$_GET['id']]['breed'] ?></li>
	    <li class="list-group-item"><b> Age Range: </b><?=  $dogs[$_GET['id']]['age_range'] ?></li>
	    <li class="list-group-item"><b> Gender: </b><?=  $dogs[$_GET['id']]['sex'] ?> </li>
	    <li class="list-group-item"><b> House Trained: </b><?=  $dogs[$_GET['id']]['house-trained'] ?></li>
	  </ul>
	</div>

   </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
