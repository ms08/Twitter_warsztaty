<?php ?>

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
<form action="addTweet.php" method="post">
<textarea placeholder="Napisz coś..." rows="20" name="tweet"></textarea>

</div>
<div class="guzik">
  <button class="btn btn-default registerbtn" type="submit" >Dodaj Tweeta...</button>
</div>
</form>

<div class="center">
<?php

$host = "localhost";
$user = "root";
$pass = "root";
$db = "Tweet";

$conn = new PDO("mysql:host=$host; charset=UTF8; dbname=$db", $user, $pass);

$query = 'SELECT tweet, userID  FROM Tweets';
$result = $conn->query($query);
?>
</body>
<table style="margin: 25px auto">

<?php
foreach ($result->fetchAll() as $row)
{
?>
<tr>
  <td>
   <?php echo $row['tweet'].'&nbsp'?></td>
  <td>  <?php echo $row['userID']   ?></td>
</tr>
</div>
<?php
}

 ?>
</div>
<script src="JS/jquery-3.1.1.min.js" type="text/javascript">  </script>
<script src="JS/jquery.js" type="text/javascript">  </script>
<script src="JS/bootstrap.min.js" type="text/javascript">  </script>
<script src="JS/app.js" type="text/javascript">  </script>
</body>
</html>
