<?php
require 'src/User.php';

session_start();

if(!isset($_SESSION['userID']))
{
    echo "Przekierowanie na stronę logowania!!!";
    header( "refresh:2;url=loginhtml.php" );
}
else
{
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <link href="JS/bootstrap.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="JS/main.css" type="text/css">
  
  <title>Document</title>
</head>
<body>
  
    
    <form method="POST" >
        <input type="text" placeholder="Nazwa użytkownia" name="username"><br>
        <input type="text" placeholder="email" name="email"><br>
        <input type="text" placeholder="stare hasło" name="oldPassword"><br>
        <input type="text" placeholder="hasło" name="password"><br>
        <button class="guzik" type="submit">zmień dane</button>
    </form>
    
    
    <form method="post" action="glowna.php">
        <button type="submit">Powrót na stronę główna</button>
    </form>
    
       <form method="post" action="delete.php">
        <button type="submit">Usuń się!!</button>
    </form>

 
    
   
  
</body>
</html>
<?php
}
  if($_SERVER['REQUEST_METHOD']=='POST')
  {
      $logged= User::loadUserById($connection, $_SESSION['userID']);
      var_dump($logged);
      $newPass=hash('sha256', $_POST['oldPassword']);
      if($newPass == $logged->getPassword())
      {
        $logged->setEmail($_POST['email']);
        $logged->setPassword($_POST['password']);
        $logged->setUsername($_POST['username']); 
        $logged->saveToDB($connection);
        echo 'Dane zmienione!';
        $_SESSION['username'] = $_POST['username'];
//        session_destroy();
//        header("location:session.php");

      }  
      else
      {
          echo 'Podaj poprawne hasło';
      }
      
  }



?>