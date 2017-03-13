<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="JS/main.css" type="text/css">
  <link href="JS/bootstrap.min.css" rel="stylesheet" type="text/css">
  

  <title>Tweet</title>
</head>
<body>


<?php
session_start();

require_once 'src/config.php';
require_once 'src/Tweet.php';
require_once 'src/User.php';

$tweetTest = Tweet::loadAllTweetsByUserId($connection, $_SESSION['userID']);

echo "<table class='allTweet'>";

// tu dodać bordera


foreach ($tweetTest as $value)
{
  echo "<tr>";
  echo "<td>".$value->getId()."</td>";
  echo "<td>".$value->getText()."</td>";
  echo "<td>".$value->getCreationDate()."</td>";
  echo "</tr>";
}
echo "</table>";

 ?>
        <div class="guzik">
      <form method="post" action="glowna.php">
        <button type="submit">Powrót na stronę główna</button>
    </form>
    </div>
</body>
