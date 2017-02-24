
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

require 'src/config.php';
require 'src/Tweet.php';
require 'src/User.php';

$tweet = Tweet::loadTweetById($connection,$_GET['id']);

echo("<table class='allTweet'>");

$id = $tweet->getUserId();
      $sql = "SELECT * FROM users WHERE id=$id";
      $result = $connection->query($sql);
      $row = $result->fetch_assoc();
      echo '
                <tr>
                <td>Imie: '.$row['username'].'</td>
                <td>Email: '.$row['email'].'</td>
                <td>'.$tweet->getText().'</td>
                <td>Data utworzenia: '.$tweet->getCreationDate().'<br></td>
                </tr>';

echo('</table');
 ?>
</body>
