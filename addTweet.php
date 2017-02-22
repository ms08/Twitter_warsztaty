<?php

$sql ="INSERT INTO Tweets (tweet, date, userID) VALUES (? , now(), '{$_SESSION['id']}' )";

if(!empty($_POST['tweet']))
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
else
{
  echo "Napisz coś!";
  header( "refresh:2;url=glowna.php" );
}


 ?>
