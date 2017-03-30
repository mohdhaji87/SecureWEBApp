<html>
<title>Vulnerable web application </title>
<?php
header("X-Frame-Options: DENY");
?>

<body>
  <h1> WEB Application Security </h1>
  <h2> Secure WEB Application </h2>
  
<h3> Registration form</h3>
<form action="register.php" method="POST">

Username: <input type="text" name="username" value=""> </br>
Password: <input type="password" name="passwd" value=""></br>
Email: <input type="email" name="email" value=""></br>
Gender : <input type="radio" name="gender" value="male"> Male <input type="radio" name="gender" value="female"> Female
<input type="submit" name="register" value="register">
</form>
<h3> Login form</h3>
<form action="login.php" method="POST">

Username: <input type="text" name="username" value=""> </br>
Password: <input type="password" name="passwd" value=""></br>
<input type="submit" name="login" value="login">
</form>

</br>
<a href="forgotpassword.html" >Forgot Password </a>
</body>
</html>

