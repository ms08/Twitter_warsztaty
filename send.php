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
<body>
    
    <form method="POST" action="send.php?id=<?php echo $_GET['id'] ?>" class="guzik"><
        <textarea class="guzik" name="message" placeholder="PISac"></textarea>
        <button type="submit">wyslij wiadomosc</button>
        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" />
        </form>
    
    <?php
    session_start();
    require_once 'src/Messages.php';
   // if($_SERVER['REQUEST_METHOD']=='POST')
   // {
        if(isset($_POST['message'])&&(isset($_POST['id'])))
        {
            $message = new Messages();
            $message->setText($_POST['message']);
            $message->setCreationDate();
            $message->setMessageFrom($_SESSION['userID']);
            $message->setUserId($_POST['id']);
            $message->saveToDB($connection);
            
        }
   // }
?>

</body>


