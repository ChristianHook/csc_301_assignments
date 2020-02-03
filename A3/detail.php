<?php 

require_once('functions.php');

$dogs = jsonToArray('data.json');

if(!is_numeric($_GET['id']) || $_GET['id']<0 || $_GET['id'] >= count($dogs)) {
	die('<a href="index.php"> Error! Go back to the home page </a>');
}

$title = $dogs[$_GET['id']]['name'];

require_once('header.php');

?>



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
<?php
require_once('footer.php');
