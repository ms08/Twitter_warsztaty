<?php

require 'src/config.php';
require 'src/Comment.php';



session_start();

if(isset($_SESSION['userID']))
{
  if(!empty($_POST['komentarz']))
  {
    $session = $_SESSION['userID'];
    $tweetID=$_POST['tweetID'];
    $komentarz = $_POST['komentarz'];

  /*  $sql="INSERT INTO comment (user_id, id_post, creation_date, text)
    VALUES ($session,$tweetID, NOW(), $komentarz)";
    */

    $oComment= new Comment();
    $oComment->setUserId($session);
    $oComment->setIdPost($tweetID);
    $oComment->setText($komentarz);
    $oComment->setCreationDate();
    $oComment->saveToDB($connection);


    header( "refresh:2;url=glowna.php" );
  }
  else
  {
    echo "napisz coś";
  }
}
else
{
  echo "Proszę się zalogować";
    header( "refresh:2;url=loginhtml.php" );
}
 ?>
