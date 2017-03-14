<?php
require_once 'src/config.php';
require_once 'src/Tweet.php';
require_once 'src/Comment.php';
session_start();
$_SESSION['username'];
header("location:glowna.php");