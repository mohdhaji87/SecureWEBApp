<html>
 <head>
 testpage
 </head>
 <body>
 

<?php
include("config.php");
session_start();
header("X-Frame-Options: DENY");


//sanitize or encoding user input 
$a=mysqli_real_escape_string($db,$_POST['username']);
$b=mysqli_real_escape_string($db,$_POST['passwd']);
$query = "select * from register where username='$a' AND password='$b'";


$result=mysqli_query($db, $query) or die('Error querying database.');

if($row = mysqli_fetch_array($result))
	{   //valid user authorized

 $_SESSION['login_user']=$row['username'];
 $_SESSION['csrf']=md5($_SESSION['login_user'].mt_rand());
  header("Location: /secure/settings.php");
}
else
{
	//not authorized
	header("Location: /secure/index.php");
}

//close database
mysqli_close($db);
?>

</body>
</html>