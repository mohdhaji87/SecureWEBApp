<?php
include ("config.php");

$token=mysqli_real_escape_string($db,$_GET['token']);
$user=mysqli_real_escape_string($db,$_GET['user']);        // read values from GET request
$pass=mt_rand();
$count=0;

$sql="select email from reset where token='$token'";    //getting email 
$result=mysqli_query($db, $sql) or die('Error querying database.');
//fetch values from database
 if($row = mysqli_fetch_array($result)) {
	$checkemail=$row['email'];
	$count=1;
}

$sql="select username from register where email='$checkemail'";    //getting username 
$result=mysqli_query($db, $sql) or die('Error querying database.');
//fetch values from database
 if($row = mysqli_fetch_array($result)) {
	$checkuser=$row['username'];

}
 
if($count==1 && $checkuser==$user )       //checking valid link or not and also username
{

$query = "Update register set password='$pass' where username='$user' AND email='$checkemail'";


if (mysqli_query($db, $query)==1)
{

    echo '<h2>Your new new password is   '.$pass.'</h2>';

	$sql1="delete from reset where token='$token'";
mysqli_query($db,$sql1) or die ('Error querying db');
	
	}
else{
	echo "<h2>Error changing password or invalid reset link</h2>";
}
}

else{
	echo "<h2>Invalid reset link</h2>";
	
}
?>