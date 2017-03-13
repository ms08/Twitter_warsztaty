<?php
require_once 'src/config.php';
require_once 'src/Tweet.php';
require_once 'src/Comment.php';



  $oComment = Comment::loadAllCommentsByPostId($connection, $value->getId());

            
                foreach ($oComment as $valut) 
                {
                    echo "<tr><td colspan=5></td></tr>";
                    echo "<tr><td>" .$valut->getText()."</td></tr>";
                }


