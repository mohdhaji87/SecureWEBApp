<?php

include("config.php");
session_start();

header("X-Frame-Options: DENY");

//get post parameters

$user=mysqli_real_escape_string($db,$_POST['username']);
$old=mysqli_real_escape_string($db,$_POST['oldpasswd']);
$csrf=mysqli_real_escape_string($db,$_POST['csrf_token']);




//check session else redirect to login 

$check=mysqli_real_escape_string($db,$_SESSION['login_user']);
if($check==NULL)
{
	header("Location: /secure/index.php");
}

//check values else redirect to settings page
if($check!=NULL && ($user==NULL || $old==NULL) )
{
header("Location: /secure/settings.php");	
}

//csrf detection

if($_SESSION['csrf']==$csrf)
{


//checking authorized user 
if($check==$user)
{
$sql="DELETE from register where username='$user' AND password='$old'";

echo htmlentities($sql);
echo "</br>";

$result=mysqli_query($db, $sql) or die('Error querying database.');

if( mysqli_affected_rows($db)>0)
{
echo "<h2>Account Deleted successfully</h2>";
session_destroy();
}
else {
	echo "<h2>Incorrect Password</h2>";
}

}

else{
	
	echo "<h2>You are not authorized to delete other user </h2>";
}

}

else
{
	echo "<h2>CSRF detected.. Get the F* Out from here</h2>";
}
mysqli_close($db);

?>


<html>
<body>
</br>
<a href="/secure/settings.php" > <h3> Go back </h3> </a>
</br>
<a href="/secure/index.php" > <h3>Login page </h3> </a>
</body>
</html>
