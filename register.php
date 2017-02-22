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
        $user = new User();
        $user->setUsername(trim($_POST['username']));
        $user->setEmail(trim($_POST['email']));
        $user->setPassword(trim($_POST['password']));
        $user->saveToDB($connection);

        echo "Zarejestrowano!!";
        header( "refresh:1;url=glowna.php" );

        // $salt = uniqid(mt_rand(), true);
        // $pass = hash("sha256",$_POST['password'].$salt);
        //
        // $stm = $conn->prepare($sql);
        //
        // $result= $stm->execute(
        //   array($_POST['email'],$pass,$salt));
        //
        // if ($result=== false)
        // {
        //   echo "Taki email już istnieje w naszej bazie.";
        //   header( "refresh:3;url=registerhtml.php" );
        }
        //
        // else
        // {
        //   #zalogowano
        // // $_SESSION['zalogowano'] = true;
        // // $_SESSION['id'] = $row['id'];
        // // $_SESSION['email'] = $_POST['email'];
        // echo "Zarejestrowano";
        // header( "refresh:3;url=glowna.php" );
        // }

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
