<?php
$mail=$_POST['email'];
$query="SELECT * from users where email ='$mail'";

if($numOfRows==1)
{
// print"An account with that email is already created..<a href ='createAccount.php'>Please enter a new account email.</a>";
// print"<a href ='createAccount.php'></a>";

}


$sql ='INSERT INTO Users (email, password,salt) VALUES (?,?,?)';
if(!empty($_POST['email']))
{

    if (!empty($_POST['password']))
    {
      $host = "localhost";
      $user = "root";
      $pass = "root";
      $db   = "Tweet";

      $conn = new PDO("mysql:host=$host; charset=UTF8; dbname=$db", $user, $pass);

      $salt = uniqid(mt_rand(), true);
      $pass = hash("sha256",$_POST['password'].$salt);

      $stm = $conn->prepare($sql);

      $result= $stm->execute(
        array($_POST['email'],$pass,$salt)
      );
      if ($result=== false)
      {
        var_dump($conn->errorInfo());
      }
      echo "Zarejestrowano";
      header( "refresh:3;url=glowna.php" );
    }
    else
    {
    echo "Podaj hasło!";
    }
}
else
{
  echo "Podaj email!";
}

?>
