<?php
include("config.php");
session_start();

header("X-Frame-Options: DENY");

//get parameter

$url=mysqli_real_escape_string($db,$_POST['url']);
$csrf=mysqli_real_escape_string($db,$_POST['csrf_token']);

//check session else redirect to login page

$check=$_SESSION['login_user'];
if($check==NULL )
{
	header("Location: /secure/index.php");
}


//check values else redirect to settings page
if($check!=NULL && $url==NULL  )
{
header("Location: /secure/settings.php");	
}


//csrf detection

if($_SESSION['csrf']==$csrf)
{



echo system(escapeshellcmd("ping $url"));


}
else
{
echo "CSRF detected.. Get Out from here";
}


?>