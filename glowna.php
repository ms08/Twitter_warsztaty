<?php

require_once 'src/config.php';
require_once 'src/Tweet.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="JS/main.css" type="text/css">
<link href="JS/bootstrap.min.css" rel="stylesheet" type="text/css">


  <title>Tweet</title>
</head>
<body class="body">

<blockquote class="blockquote-reverse">
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
</blockquote>

<div class="textarea">
<form action="addTweet.php" method="POST">
<textarea placeholder="Napisz coś..." rows="20" name="tweet"></textarea>

</div>
<div class="guzik">
  <button class="btn btn-default registerbtn" type="submit" >Dodaj Tweeta...</button>
</div>
</form>

<div class="center">

<table class="allTweet" border="1px">

<?php

 $tweetTest = Tweet::loadAllTweets($connection);
 $revTweets = array_reverse($tweetTest);

  echo "<th>Tweet</th>";
  echo "<th>Kto</th>";
  echo "<th>Email</th>";
  echo "<th>Data</th>";

          foreach ($revTweets as $value)
          {

            $value->getUserId();
            $id = $value->getUserId();
            $sql = "SELECT email, username FROM Users WHERE id=$id LIMIT 1";

            $result = $connection->query($sql);
            $row=$result->fetch_assoc();

            echo "<tr>";
            echo "<td>".$value->getText()."</td>";
            echo "<td>".$row['username']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$value->getCreationDate()."</td>";
            echo "</tr>";

          }

?>
</table>

</div>

<script src="JS/jquery-3.1.1.min.js" type="text/javascript">  </script>
<script src="JS/jquery.js" type="text/javascript">  </script>
<script src="JS/bootstrap.min.js" type="text/javascript">  </script>
<script src="JS/app.js" type="text/javascript">  </script>
</body>
</html>
