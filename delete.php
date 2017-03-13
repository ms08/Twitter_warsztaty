<?php

require 'src/User.php';
session_start();



  $logged= User::loadUserById($connection, $_SESSION['userID']);
  $logged->delete($connection);
  
  echo 'Usunięto';
  
 

  header( "refresh:2;url=loginhtml.php" );
  
  