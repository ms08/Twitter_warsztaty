<?php

require_once 'src/config.php';

session_start();


  //rejestrujmey
  //haslo : qwerty
  //salt: dashdhasjnbjcxsad
  //hashHASLO: dasghdasdsadmashjngfcnasd

  //Login
  //email:
  //haslo: qwerty
  //salt : z bazy
  //hashHASLO = hash(sol z bazy+qwerty)

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


      $sql = "SELECT id,password,salt FROM Users WHERE email=?";
      $stmt = $conn->prepare($sql);
      $stmt->execute(array($_POST['email']));
      $row = $stmt->fetch();

      $ps=hash("sha256",$_POST['password'].$row['salt']);

      if ($ps==$row['password'])
      {
        #zalogowano
        echo "Trwa przekierowanie na strone główna";
        header( "refresh:3;url=glowna.php" );
        $_SESSION['zalogowano'] = true;
        $_SESSION['id'] = $row['id'];
        $_SESSION['email'] = $_POST['email'];

      }
      else
      {
        echo "Podano błędne dane";
        header( "refresh:3;url=logowanie.html" );
      }
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
<!-- // $_SESSION['zalogowano'] == true {
//$_SESSION['email']
//}
/*

*/ -->
