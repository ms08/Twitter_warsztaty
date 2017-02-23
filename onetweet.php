<?php

require 'src/config.php';
require 'src/Tweet.php';
require 'src/User.php';

$tweet = Tweet::loadTweetById($connection, 1);

$id = $tweet->getUserId();
      $sql = "SELECT * FROM users WHERE id=$id";
      $result = $connection->query($sql);
      $row = $result->fetch_assoc();
      echo '
                <tr>
                <tr>Imie: '.$row['username'].' || <br></tr>
                <tr>Email: '.$row['email'].' || <br></tr>
                <tr>Data utworzenia: '.$tweet->getCreationDate().'<br></tr>
                <tr>'.$tweet->getText().
                '</tr>';

 ?>
