<?php

$sql ='INSERT INTO Tweets (tweet, date) VALUES (? , now() )';

if(!empty($_POST))
{
  $host = "localhost";
  $user = "root";
  $pass = "root";
  $db   = "Tweet";

  $conn = new PDO("mysql:host=$host; charset=UTF8; dbname=$db", $user, $pass);

  $stm = $conn->prepare($sql);

  $result= $stm->execute(
    array($_POST['tweet'])
  );
  if ($result=== false)
  {
    var_dump($conn->errorInfo());
  }
  else
  {
    echo "ok";
  }

}


 ?>
