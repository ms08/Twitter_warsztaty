<?php
require_once 'src/config.php';
require_once 'src/User.php';

session_start();

  if(!empty($_POST['email']))
  {

    if (!empty($_POST['password']))
    {
      $user = new User();
      $pass = $user->setPassword($_POST['password']);

      $query="SELECT COUNT(*) as ilosc,id,username FROM Users WHERE email='".$_POST['email']."' AND hashed_password='$pass'";
      $result = $connection->query($query);
      $row = $result->fetch_assoc();

      // var_dump($row);
      // var_dump($result);
      if($row['ilosc'] == 1 )
      {
        // session_regenerate_id();
        //$_SESSION['userIP'] = $_SERVER['REMOTE_IP'];
        $_SESSION['userID'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        echo "Trwa przekierowanie na strone główna";
        header( "refresh:3;url=glowna.php" );
      }
      else
      {
        echo "NIET";
        header( "refresh:2;url=loginhtml.php" );

      }
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
