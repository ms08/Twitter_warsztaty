  <?php
  require 'src/User.php';
  require 'updateUser.php';
  
  
  if($_SERVER['REQUEST_METHOD']=='POST')
  {
  
$logged= User::loadUserById($connection, $_SESSION['userID']);
var_dump($logged);
$logged->setEmail($_POST['email']);
$logged->setPassword($_POST['password']);
$logged->setUsername($_POST['username']);
  
  }  