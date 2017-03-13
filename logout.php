<?php

include("config.php");
session_start();

header("X-Frame-Options: DENY");

//destroy created session and redirect to login page

$_SESSION['login_user']=NULL;
$_SESSION['csrf']=NULL;
session_destroy();
header("Location: /secure/index.php");

?>