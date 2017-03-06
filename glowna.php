<?php
require_once 'src/config.php';
require_once 'src/Tweet.php';
require_once 'src/Comment.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link href="JS/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="JS/main.css" type="text/css">

        <title>Tweet</title>
    </head>

    <body class="body">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Witaj :
                        <?php
                        session_start();
                        echo $_SESSION['username'];
                        ?> </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Wiadomości<span class="sr-only">(current)</span></a></li>
                        <li><a href="#">Tetsy</a></li>
                        <li><a href="updateuser.php">Zaktualizuj dane</a></li>
                        <li><a href="userglowna.php">Moje Tweety</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="logout.php">Wyloguj</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>


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

        <table class="allTweet allTweetMain">




            <?php
            $tweetTest = Tweet::loadAllTweets($connection);
            $revTweets = array_reverse($tweetTest);

            echo "<th styles:text-align='center'>Tweet</th>";
            echo "<th>Kto</th>";
            echo "<th>Email</th>";
            echo "<th>Data</th>";
            echo "<th>Zobacz</th>";

            foreach ($revTweets as $value) 
                {
                    $id = $value->getUserId();
                    $sql = "SELECT email, username FROM Users WHERE id=$id";

                    $result = $connection->query($sql);
                    $row = $result->fetch_assoc();

                    echo "<tr>";
                    echo "<td>" . $value->getText() . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $value->getCreationDate() . "</td>";
                    echo "<td><a href='onetweet.php?id=" . $value->getId() . "'>Zobacz</a></td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td colspan='4'>";
                    echo "<form method='POST' action='addcomment.php'><textarea name='komentarz'>" .
                    "</textarea>"
                    . "     <input type='hidden' name='tweetID' value='" . $value->getId() . "'/>";
                    echo "</td><td><input type='submit' value='Dodaj'></td></form>";
                    echo "</tr>";



                $oComment = Comment::loadAllCommentsByPostId($connection, $value->getId());

            }
                foreach ($oComment as $valut) {
                    echo "<tr><td colspan=5></td></tr>";
                    echo "<tr><td>" .$valut->getText()."</td></tr>";
                }
           
            ?>
        </table>

    </div>

    <script src="JS/jquery-3.1.1.min.js" type="text/javascript"></script>
    <script src="JS/jquery.js" type="text/javascript"></script>
    <script src="JS/bootstrap.min.js" type="text/javascript"></script>
    <script src="JS/app.js" type="text/javascript"></script>
</body>
</html>
