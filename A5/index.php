<?php 
require_once('functions.php');
require_once('CSVutility.php');

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
    <a href="create.php" class="btn btn-primary">Add a Dog</a>
  </div>
</div>
    <div class="row row-cols-1 row-cols-md-2" align="center">
  <?php
  for($i=0;$i<count($dogs);$i++) {
    echo '  <div class="col mb-4">
    <div class="shadow p-3 mb-5 bg-white rounded" style="max-width: 30rem;">
      <img src="'.$dogs[$i][3].'" class="card-img-top rounded" alt="Profile Pic">
      <div class="card-body">
        <h4 class="card-title">'.$dogs[$i][0].'</h4>
        <p> <b> Breed: </b>'.$dogs[$i][4].'</p>
        <p> <b> Age Range: </b>'.$dogs[$i][1].'</p>
        <p> <b> Gender: </b>'.$dogs[$i][2].'</p>
        <a href="detail.php?id='.$i.'" class="btn btn-primary">See Profile</a>
      </div>
    </div>
  </div>';
  }

  ?>
</div>
<?php
require_once('footer.php');

