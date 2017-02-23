<?php

require_once 'src/config.php';
require_once 'src/Tweet.php';
require_once 'src/User.php';

$tweetTest = Tweet::loadAllTweetsByUserId($connection, 2);

echo "<table>";

// tu dodać bordera


foreach ($tweetTest as $value)
{
  $sql = "SELECT * FROM Tweet WHERE user_id=?";

  $result = $connection->query($sql);

  echo "<tr>";
  echo "<td>".$value->getId()."</td>";
  echo "<td>".$value->getText()."</td>";
  echo "<td>".$value->getCreationDate()."</td>";
  echo "</tr>";

}
echo "</table>";

 ?>
