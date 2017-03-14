
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="JS/main.css" type="text/css">
  <link href="JS/bootstrap.min.css" rel="stylesheet" type="text/css">


  <title>Messages</title>
</head>
<body>
<?php
session_start();

require 'src/config.php';
require 'src/Messages.php';
require 'src/User.php';
require 'src/Tweet.php';




echo "<table class='allTweet'>";

// tu dodać bordera

if(!empty($_GET['id']))
{
    $msg1 = Messages::loadMessagesById($connection, $_GET['id']);
    $msg1->setRead(1);
    $msg1->saveToDB($connection);
}

$msg = Messages::loadMessagesByUserId($connection,$_SESSION['userID']);

foreach ($msg as $value)
{
  echo "<tr>";
  echo "<td>".$value->getUserId()."</td>";
  if($value->getRead() == 0)
     echo "<td><a href='messages.php?id=".$value->getId()."'>".$value->getText()."</td>";
  else
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