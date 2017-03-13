<?php
include("config.php");
session_start();

header("X-Frame-Options: DENY");

//get post parameters

$user=mysqli_real_escape_string($db,$_POST['username']);
$old=mysqli_real_escape_string($db,$_POST['oldpasswd']);
$new=mysqli_real_escape_string($db,$_POST['newpasswd']);
$csrf=mysqli_real_escape_string($db,$_POST['csrf_token']);


//check session else redirect to login page
$check=$_SESSION['login_user'];
if($check==NULL)
{
	header("Location: /secure/index.php");
}

//check values else redirect to settings page
if($check!=NULL && ($user==NULL || $old==NULL || $new==NULL) )
{
header("Location: /secure/settings.php");	
}


//csrf detection

if($_SESSION['csrf']==$csrf)
{

if($check==$user)       //checking wheather valid user or not
{


//update password 

$sql="UPDATE register set password='$new' where username='$user' AND password='$old'";

echo htmlentities($sql);
echo "</br>";

$result=mysqli_query($db, $sql) or die('Error querying database.');

if( mysqli_affected_rows($db)>0)
{
echo "Password updated successfully";
}
else {
	echo "Incorrect Password";
}

}

else{
	
	echo "You are not authorized to change other user password";
}
}

else{
	
	echo "CSRF detected.. Get Out from here";
}
mysqli_close($db);


?>

<html>
<body>
</br>
<a href="/secure/settings.php" > <h3>Go back</h3> </a>
</body>
</html>
