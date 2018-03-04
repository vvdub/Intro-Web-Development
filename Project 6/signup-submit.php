<!-- Dusten Peterson | Web Development 3610 | PHP/Forms Practice -->

<?php
// Setup and pre-display code here
  $user_name = $_POST["name"];
  $user_gender = $_POST["gender"];
  $user_age = $_POST["age"];
  $user_persona = $_POST["personality"];
  $user_os = $_POST["OS"];
  $user_min_age = $_POST["minage"];
  $user_max_age = $_POST["maxage"];

  $user_data = $user_name . "," .
               $user_gender . "," .
               $user_age . "," .
               $user_persona . "," .
               $user_os . "," .
               $user_min_age . "," .
              $user_max_age;

  file_put_contents("singles.txt", "\n" . $user_data, FILE_APPEND);
?>

<?php include("top.html"); ?>

<!-- Add your HTML and PHP here -->

  <div>
    <h1>Thank you!</h1>
    <p>Welcome to NerdLuv, <?= $user_name ?>!<br/>
      Now <a href="matches.php">log in to see your matches!</a></p>
  </div>

<?php include("bottom.html"); ?>
