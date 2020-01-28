<?php
$name='Christian Hook';

$email = 'christianreidhook@gmail.com';

$major = 'Data Science';

$year = 'Senior';

$school = 'Northern Kentucky University';

$paragraph = 'My main hobby would be watching baseball/working on baseball data. I work with the baseball program here at NKU implementing technology, creating tools, and performing analysis on team/NCAA data. Outside of baseball, I enjoy watching comedidies on Netflix (The Office and Parks and Rec. being my favorites).';

$pic = 'https://pbs.twimg.com/profile_images/1113468646226124800/Ra58kfX-_400x400.jpg';

$why_enrolled = 'I enrolled primarily because this seemed like a great CS elective to take to go along with some of the more data-oriented courses I have had to take. While I may not be working primarily on web development one day, I think it will be useful to have the ability to make interactive/dynamic websites that demonstrate analysis/work I do.';

$expected = 'By the end of this course, I expect to be able to create dynamic websites that pull data in to create an interesting and interactive final product.';

$school_blurb = "$year $major student at $school";

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title> <?php echo $name;?> </title>
  </head>
  <body>
    <div class="jumbotron">
  <h1 class="display-4"><?php echo $name; ?></h1>

  <p class="lead"><?php echo $school_blurb; ?></p>

  <p> <img src = '<?php echo $pic; ?>' alt = "Picture of Me" class = "rounded" style="width:250px;height:250px;"/></p>

  <hr class="my-4">
  
  <p class="lead"> <b> Why I Enrolled </b> <br> <?php echo $why_enrolled; ?></p>

  <p class="lead"><?php echo $expected; ?></p>

  <hr class="my-4">

  <p class="lead"> <b> Bio </b> <br> <?php echo $paragraph; ?></p>

  <hr class="my-4">

  <p class = "lead"> <b> Contact Me </b> <br> <?php echo '<a href="mailto:'.$email.'""> E-mail</a>' ?> </p>


</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>