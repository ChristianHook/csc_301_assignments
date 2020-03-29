<?php 

require_once('functions.php');
require_once('CSVutility.php');

$dogs = readCSV('data/dogs.csv');



if(!is_numeric($_GET['id']) || $_GET['id']<0 || $_GET['id'] >= count($dogs)) {
	die('<a href="index.php"> Error! Go back to the home page </a>');
}

$title = $dogs[$_GET['id']][0];

require_once('header.php');

?>



  	    <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Dog Adoption</h1>
    <p class="lead">Look through the profile of <?=  $dogs[$_GET['id']][0] ?>!</p>
    <a href="index.php" class="btn btn-primary">Go Back to All Dogs</a>
  </div>
</div>

  <div align = "center">
	 <div class="shadow p-3 mb-5 bg-white rounded" style="max-width: 50rem;" align = "left">
	  <img src="<?=  $dogs[$_GET['id']][3] ?>" class="card-img-top" alt="...">
	  <br> <br>
	  <h3 class="card-title" align = "center"> Meet <?= $dogs[$_GET['id']][0] ?>!</h3>
	  <ul class="list-group list-group-flush">
	  	<li class="list-group-item"> <b> Bio: </b><?=  $dogs[$_GET['id']][6] ?></li>
	    <li class="list-group-item"> <b> Breed: </b><?=  $dogs[$_GET['id']][4] ?></li>
	    <li class="list-group-item"><b> Age Range: </b><?=  $dogs[$_GET['id']][1] ?></li>
	    <li class="list-group-item"><b> Gender: </b><?=  $dogs[$_GET['id']][2] ?> </li>
	    <li class="list-group-item"><b> House Trained: </b><?=  $dogs[$_GET['id']][5] ?></li>
	  </ul>
	  <br>
	  <?php 
	  echo
	  '<a href="delete.php?id='.$_GET['id'][0].'" class="btn btn-primary">Remove Dog</a>'
	  ?>
	  <br>
	  <br>
	  <?php 
	  echo
	  '<a href="modify.php?id='.$_GET['id'][0].'" class="btn btn-primary">Modify Dog</a>'
	  ?>
	</div>

   </div>
<?php
require_once('footer.php');
