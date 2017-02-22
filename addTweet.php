<?php


require_once 'src/config.php';
require_once 'src/Tweet.php';

if(!empty($_POST['tweet']))
{

  $oTweet = new Tweet();
  $oTweet->setuserId(2);
  $oTweet->setCreationDate();
  $oTweet->setText($_POST['tweet']);
  $oTweet->saveToDB($connection);


    echo "Poszło do bazy";
    header( "refresh:2;url=glowna.php" );


}
else
{
  echo "Napisz coś!";
  header( "refresh:2;url=glowna.php" );
}


 ?>
