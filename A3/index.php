<?php 
require_once('functions.php');


$dogs = jsonToArray('data.json');


$title = 'All of the Dogs';
require_once('header.php');
?>

    <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Dog Adoption</h1>
    <p class="lead">Look through the profile cards for each dog below!</p>
  </div>
</div>
    <div class="row row-cols-1 row-cols-md-2" align="center">
  <?php
  for($i=0;$i<count($dogs);$i++) {
    echo '  <div class="col mb-4">
    <div class="shadow p-3 mb-5 bg-white rounded" style="max-width: 30rem;">
      <img src="'.$dogs[$i]['picture'].'" class="card-img-top rounded" alt="Profile Pic">
      <div class="card-body">
        <h4 class="card-title">'.$dogs[$i]['name'].'</h4>
        <p> <b> Breed: </b>'.$dogs[$i]['breed'].'</p>
        <p> <b> Age Range: </b>'.$dogs[$i]['age_range'].'</p>
        <p> <b> Gender: </b>'.$dogs[$i]['sex'].'</p>
        <a href="detail.php?id='.$i.'" class="btn btn-primary">See Profile</a>
      </div>
    </div>
  </div>';
  }

  ?>
</div>
<?php
require_once('footer.php');

