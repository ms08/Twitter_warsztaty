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
      $dbPass = $row['hashed_password'];

      if(password_verify($password, $dbPass))
      {
        $_SESSION['zalogowano'] = true;
        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] = $row['username'];

        $sql  = "SELECT * FROM Users ";
        $sql .= "WHERE email = '{$email}' ";
        $sql .= "LIMIT 1";

        echo "Trwa przekierowanie na strone główna";
        header( "refresh:3;url=glowna.php" );
        //
        //
        // $sql = "SELECT password,salt FROM Users WHERE email=?";
        // $stmt = $conn->prepare($sql);
        // $stmt->execute(array($_POST['email']));
        // $row = $stmt->fetch();
        // $ps=hash("sha256",$_POST['password'].$row['salt']);
       }
        else
        {
          echo "Podano błędne dane";
          header( "refresh:3;url=loginhtml.php" );
        }

    }
    else
    {
    echo "Podaj hasło!";
    header( "refresh:3;url=loginhtml.php" );
    }
  }
  else
  {
    echo "Podaj email!";
    header( "refresh:3;url=loginhtml.php" );
  }

  ?>
  <!-- // $_SESSION['zalogowano'] == true {
  //$_SESSION['email']
  //}
  /*

  */ -->
