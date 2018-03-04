<!-- Dusten Peterson | Web Development 3610 | PHP/Forms Practice -->

<?php
// Add any pre display code you would like here
  $user_name = $_GET["name"];
  $file_value = file("singles.txt");

  foreach($file_value as $files_value){
  $user_explode = explode(",",$files_value);
  $user_data = trim($user_explode[0]);
    if($user_name == $user_data){
       $user_gender = $user_explode[1];
       $user_age = $user_explode[2];
       $user_persona = $user_explode[3];
       $user_os = $user_explode[4];
       $user_min_age = $user_explode[5];
       $user_max_age = $user_explode[6];
    }
}
?>
<?php include("top.html");?>

<strong>Matches for <?=$user_name?></strong>

<?php
  foreach($file_value as $files_value){
    $match_explode = explode(",",$files_value);
    $match_name = $match_explode[0];
    $match_gender = $match_explode[1];
    $match_age = $match_explode[2];
    $match_persona = $match_explode[3];
    $match_os = $match_explode[4];
    $match_min_age = $match_explode[5];
    $match_max_age = $match_explode[6];
?>

<?php if((gender_function($match_gender, $user_gender) == true) &&
         (user_age_function($match_age, $user_min_age, $user_max_age) == true) &&
         (persona_function($match_persona, $user_persona) == true) &&
         (os_function($match_os, $user_os) == true) &&
         (match_age_function($match_min_age, $match_max_age, $user_age) == true)){
?>

<div class="match">
  <p><img src="user.jpg" alt="user"/>
    <?=$match_name?>
  </p>
  <ul>
    <li>Gender: <?=$match_gender?></li>
    <li>Age: <?=$match_age?></li>
    <li>Personality Type: <?=$match_persona?></li>
    <li>Favorite OS: <?=$match_os?></li>
  </ul>
</div>

<?php } ?>
<?php } ?>
<?php
  function gender_function($match_gender, $user_gender){
    if($match_gender != $user_gender){
      return true;
    }
  }

  function user_age_function($match_age, $user_min_age, $user_max_age){
    if(($match_age >= $user_min_age) && ($match_age <= $user_max_age)){
      return true;
    }
  }

  function persona_function($match_persona, $user_persona){
    $split1 = str_split($match_persona);
    $split2 = str_split($user_persona);
      if(($split1[0] == $split2[0]) ||
         ($split1[1] == $split2[1]) ||
         ($split1[2] == $split2[2]) ||
         ($split1[3] == $split2[3])){
        return true;
      }
  }

  function os_function($match_os, $user_os){
    if($match_os != $user_os){
      return true;
    }
  }

  function match_age_function($match_min_age, $match_max_age, $user_age){
    if(($user_age >= $match_min_age) && ($user_age <= $match_max_age)){
      return true;
    }
  }
?>
<?php include("bottom.html"); ?>
