<?php

session_start();

if(isset($_SESSION['zalogowany'])&&($_SESSION['zalogowany']==true))
{
  header('Location:glowna.php');
  exit();
}

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
<body class="logowanie">


<form action="login.php" method="POST">

  <div class="input-group">
    <span class="input-group-addon" id="basic-addon1"></span>
    <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1" name="email">
  </div>

  <div class="input-group">
    <span class="input-group-addon" id="basic-addon1"></span>
    <input type="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1" name="password">
  </div>
<div class="guzik">
  <button class="btn btn-default" type="submit" >Zaloguj</button>


</form>

<form action="registerhtml.php" method="get">

<button class="btn btn-default" type="submit" >Rejestruj</button>

</div>
</div>
<!-- <img height="33%" name="slide" src="JS/img/1.jpg" width="100%"/> -->


<script src="JS/jquery-3.1.1.min.js" type="text/javascript">  </script>
<script src="JS/jquery.js" type="text/javascript">  </script>
<script src="JS/bootstrap.min.js" type="text/javascript">  </script>
<script src="JS/app.js" type="text/javascript">  </script>

</body>
</html>
