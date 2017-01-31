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
<textarea placeholder="Napisz coś..." rows="20" name="comment[text]"></textarea>

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
$db = "products_ex";

$conn = new PDO("mysql:host=$host; charset=UTF8; dbname=$db", $user, $pass);

$query = 'SELECT name, description, price FROM products';

$result = $conn->query($query);

//poniżej wyświetl listę danych z bazy, pamiętaj aby użyć pętli a nie print_r lub var_dump
?>
</body>
<table>

<?php
foreach ($result->fetchAll() as $row)
{

?>
<tr>
  <td> <?php echo $row['name']?></td>
  <td>
    <?php

    //zmieniłem na 5 bo tak.
  if(strlen($row['description']) >5 )
  {
    echo substr($row['description'],0, 5) .'.....';
  }
  else {
    echo $row['description'];
  }
  ?></td>
  <td> <?php echo $row['price']?></td>
</tr>
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
