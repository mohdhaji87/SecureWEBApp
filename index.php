<html>
<title>Vulnerable web application </title>
<?php
header("X-Frame-Options: DENY");
?>

<body>
<h1> Registration form</h1>
<form action="register.php" method="POST">

Username: <input type="text" name="username" value=""> </br>
Password: <input type="password" name="passwd" value=""></br>
Email: <input type="email" name="email" value=""></br>
Gender : <input type="radio" name="gender" value="male"> Male <input type="radio" name="gender" value="female"> Female
<input type="submit" name="register" value="register">
</form>
<h1> Login form</h1>
<form action="login.php" method="POST">

Username: <input type="text" name="username" value=""> </br>
Password: <input type="password" name="passwd" value=""></br>
<input type="submit" name="login" value="login">
</form>
</body>
</html>

