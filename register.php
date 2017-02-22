<?php
// $mail=$_POST['email'];
// $query="SELECT * from users where email ='$mail'";
//
// if($numOfRows==1)
// {
// // print"An account with that email is already created..<a href ='createAccount.php'>Please enter a new account email.</a>";
// // print"<a href ='createAccount.php'></a>";
//
// }

require_once 'src/config.php';

session_start();

$sql ='INSERT INTO Users (email, username, hashed_password) VALUES (?,?,?)';
if(!empty($_POST['email']))
{

    if (!empty($_POST['password']))
    {
      // $host = "localhost";
      // $user = "root";
      // $pass = "root";
      // $db   = "Tweet";
      //
      // $conn = new PDO("mysql:host=$host; charset=UTF8; dbname=$db", $user, $pass);

      $salt = uniqid(mt_rand(), true);
      $pass = hash("sha256",$_POST['password'].$salt);

      $stm = $conn->prepare($sql);

      $result= $stm->execute(
        array($_POST['email'],$pass,$salt)
      );
      if ($result=== false)
      {
        echo "Taki email już istnieje w naszej bazie.";
        header( "refresh:3;url=register.html" );
      }
      else
      {
        #zalogowano
      // $_SESSION['zalogowano'] = true;
      // $_SESSION['id'] = $row['id'];
      // $_SESSION['email'] = $_POST['email'];
      echo "Zarejestrowano";
      header( "refresh:3;url=glowna.php" );
      }
    }
    else
    {
      echo('<div style="color:red" >Podaj hasło!</div>');
      header( "refresh:2;url=register.html" );
    }
}
else
{
  echo "Podaj email!";
  header( "refresh:2;url=register.html" );
}

?>
