<!DOCTYPE html>
<html><head>
<meta charset="uff-8">
<title>Welcome to the world of e-shopping</title>
<link type="text/css" rel="stylesheet" href="stylesheet.css">
</head><body>

<?php

// Login Part
$form = false;
if (isset ($_POST['log_in'])) {
$username = $_POST['username'];
$password = $_POST['secret'];
$login = false;
$link = mysqli_connect('localhost', 'root', 'eshop-aykp', 'eshopz')
or die ('Error connecting to mysql sever');
$query = "SELECT * FROM users_list WHERE username = '$username'";
$result = mysqli_query($link, $query)
or die ('Error connecting to database');
$row = mysqli_fetch_array($result);
mysqli_close($link);
if ($row['password'] == $password) { $login = true; }
else { $form = true; }
// successful login
if ($login == true) {
?><div class="header"> <div> 
<?php echo 'Welcome to eshopz, ' . $row['first_name'] . ' ' . $row['last_name']; ?>
</div><p>
<span class='option'><a href="header.php">HOME</a></span>
<span class='option'>MY ACCOUNT</span>
<span class='option'><a href="my_shop.php">MY SHOP</a></span>
<span class='option'>Notification</span>
</p></div>
<?php  
} }

//Sign up part
else if (isset($_POST['sign_up'])) {
 $first_name = $_POST['firstname'];
 $last_name = $_POST['lastname'];
 $username = $_POST['username'];
 $email = $_POST['email'];
 $password = $_POST['secret'];
 $repassword = $_POST['secret1'];
 if (isset($_POST['gender'])) { $gender = $_POST['gender'];}
$detail= false;
$pass_check= false;
if (empty($first_name) || empty($username) || empty($password) || empty($repassword) || empty($gender) || empty($email)) {
 $detail= true;
 $form = true; }
 if($password != $repassword){
 $form = true;
 $pass_check=true; }
//successful sign up 
 if($password == $repassword && !empty($first_name) && !empty($username) && !empty($password) && !empty($repassword) && !empty($gender) && !empty($email)){
 $form=false;
$link = mysqli_connect ('localhost', 'root', 'eshop-aykp', 'eshopz')
or die ('Error connecting to mysql sever');
$query = "INSERT INTO users_list (first_name, last_name, username, password, email, gender)" .
"VALUES('$first_name', '$last_name', '$username', '$password', '$email', '$gender')";
 mysqli_query ($link, $query)
 or die ('Error connecting database') ;
 mysqli_close($link);
 } }
 else {$form = true;}
 
 if ($form == true) {
 ?>
  <div class="header"> <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
				  <div class="table-row"> <p> Username: </p> <p> Password: </p> </div>
				  <div class="table-row"> <p> <input type="text" name="username" value=""> </p>
				  <p class="sp"> <input type="password" name="secret" value=""> <br>
				  <font color="red" size="2px">
				  <?php 
  				  if (isset($login)) {if ($login == false) {
                  echo 'Username or password is wrong!';
				  } } ?> </font></p>
				  <input type="submit" name="log_in" value="Log in"></div>
				  </form> </div>	
 <img src="images/9219.png" alt="eshop" width="500px" height="500px">
 <div class="form"> <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
			 <h2> SIGN UP </h2>
			 <p> <font color= "red" size="4px"> Fields with * are mandatory </font></p>
		    <div class="table-row"> <p>*First Name : </p><p> <input type="text" name="firstname" value=""> </p> </div>
			<div class="table-row"> <p>Last Name : </p><p><input type="text" name="lastname" value=""> </p> </div>			
			<div class="table-row"> <p>*Username : </p> <p><input type="text" name="username" value=""> </p> </div>
			<div class="table-row"> <p>*Enter Password : </p> <p><input type="password" name="secret" value=""><br> </p> </div>
			<div class="table-row"> <p>*Re-enter Password : </p> <p class="sp"><input type="password" name="secret1" value=""> <br> 
			<font color="red" size="2px"><?php
			if (isset($pass_check)) { if ($pass_check) { echo 'password not matched!' . '<br>';
			} }?> </font> </p> </div>			
			<div class="table-row"> <p>*E-mail Id : </p> <p><input type="email" name="email" value=""></p> </div>
			<div class="table-row"> <p>*Gender : </p> <p><input type="radio" name="gender" id="gender" value="Female"> Female
			<input type="radio" name="gender" id="gender" value="Male"> Male </p> </div>
			<p class="sp"><font color="red" size="2px"><?php
			if (isset($detail)) { if ($detail) { echo 'Please enter the mandatory details!' . '<br>';
			} } ?> </font>
			<input type="submit" name="sign_up" value="Sign Up">
			</p> </form> </div> <?php
			} ?> 
			</body>
			</html>