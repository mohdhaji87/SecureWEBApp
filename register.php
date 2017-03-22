
<html>
 <head>
 Register page
 </head>
 <body>
 

<?php
include ("config.php");

header("X-Frame-Options: DENY");

//get post parameters

$a=$_POST['username'];
$b=$_POST['passwd'];
$c=$_POST['email'];
$d=$_POST['gender'];

//prepared statements
$query = $db->prepare("insert into register values(?,?,?,?)");
$query->bind_param("ssss",$a,$b,$c,$d);
echo "" . '<br />';

if($query->execute()) {
	
 echo '<h2>sucessfully registerd as '.htmlentities($a).'<br /></h2>';
 
}
else
{
	echo '<h2>Username is taken or registration error</h2>';
}

$query->close();

//database close
$db->close();

?>
<a href="/secure/index.php" >Go back </a>
</body>
</html>
