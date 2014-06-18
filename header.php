<!DOCTYPE html>
<html>
<head>
<title>
e-Shopz
</title>
 <link type="text/css" rel="stylesheet" href="stylesheet.css">
</head>
<body>

<?php
$username = $_POST['username'];
$password = $_POST['secret'];
$login = false;
$link = mysqli_connect('localhost', 'root', 'eshop-aykp', 'eshopz')
or die ('Error connecting to mysql sever');
$query = "SELECT * FROM users_list WHERE username = '$username'";
$result = mysqli_query($link, $query)
or die ('Error connecting to database');
$row = mysqli_fetch_array($result);
if ($row['password'] == $password) {
$login = true;
}
mysqli_close($link);

if ($login == true) {
?>
<div class="header">
<div> 
<?php echo 'Welcome to eshopz, ' . $username . ' ' ?>
</div>
</div>
<?php
}
else {
?>
 <div class="header"> 
        <form action="header.php" method="post">
				  <div class="table-row"> <p> Username: </p> <p> Password: </p> </div>
				  <div class="table-row"> <p> <input type="text" name="username" value=""> </p> 
				  <p class="sp"> <input type="password" name="secret" value=""> <br>
				  <font color="red" size="2px"><?php echo 'Username or password is wrong!' ?> </font></p>
				  <input type="submit" value="Log in"></div>
				  </form>
				  </div>			
<img src="images/9219.png" alt="eshop" width="500px" height="500px">
 <div class="form">
	 		<form action="newest.php" method="post">
			 <h2> SIGN UP </h2>
			 <p> <font color= "red" size="4px"> Fields with * are mandatory </font></p>
		    <div class="table-row"> <p>*First Name : </p><p> <input type="text" name="firstname" value=""> </p> </div>
			<div class="table-row"> <p>Last Name : </p><p><input type="text" name="lastname" value=""> </p> </div>			
			<div class="table-row"> <p>*Username : </p> <p><input type="text" name="username" value=""> </p> </div>
			<div class="table-row"> <p>*Enter Password : </p> <p><input type="password" name="secret" value=""><br> </p> </div>
			<div class="table-row"> <p>*Re-enter Password : </p> <p><input type="password" name="secret1" value=""> </p> </div>
			<div class="table-row"> <p>*E-mail Id : </p> <p><input type="email" name="email" value=""></p> </div>
			<div class="table-row"> <p>*Gender : </p> <p><input type="radio" name="gender" id="gender" value="Female"> Female
			<input type="radio" name="gender" id="gender" value="Male"> Male </p> </div>
			<input type="submit" value="Sign Up">
			</form>
			</div>
			<?php
			}
			?>			
	 </body> </html>