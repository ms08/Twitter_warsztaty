<?php

require_once 'src/config.php';
require_once('src/User.php');

session_start();

if($_SERVER['REQUEST_METHOD']=='POST')
{

  if(!empty($_POST['email']))
  {
      if (!empty($_POST['password']))
      {
        $valEmail=$_POST['email'];
        var_dump($valEmail);

        $query = mysqli_query($connection, "SELECT * FROM Users WHERE email='".$valEmail."'");

        if(mysqli_num_rows($query) > 0)
        {
          echo "email already exists";
          header( "refresh:2;url=registerhtml.php" );
        }
        else
        {
          $user = new User();
          $user->setUsername(trim($_POST['username']));
          $user->setEmail(trim($_POST['email']));
          $user->setPassword($_POST['password']);
          $user->saveToDB($connection);

          echo "Zarejestrowano!!";
          header( "refresh:1;url=loginhtml.php" );
        }
      }
      else
      {
        echo('<div style="color:red" >Podaj hasło!</div>');
        header( "refresh:2;url=registerhtml.php" );
      }
  }
  else
  {
    echo "Podaj email!";
    header( "refresh:2;url=registerhtml.php" );
  }
}
?>
