<!DOCTYPE html>
<html><head><meta charset="uff-8">
<title>Welcome to the world of e-shopping</title>
<link type="text/css" rel="stylesheet" href="stylesheet.css">
</head><body>
<?php
$form = true;

/*__________________ Login Part _____________________*/
if (isset ($_POST['log_in'])) {
$username = $_POST['username'];
$password = $_POST['secret'];
$login = false;
/*Connect to mysql database*/include ('connect_mysql.php');
$query = "SELECT * FROM users_list WHERE password = sha('$password') AND username = '$username'";
$result = mysqli_query($link, $query) or die ('Error connecting to database');
$row = mysqli_fetch_array($result);
mysqli_close($link);
if (!empty($password) && !empty($username) && mysqli_num_rows($result) == 1) { $login = true; $form = false; }

/* _________________ successful login _____________________*/
if ($login == true) {
session_start();
$_SESSION['user_id'] = $row['user_id'];
$_SESSION['username'] = $row['username'];
if (!empty($_POST['keep_logged'])) {
setcookie('user_id', $row['user_id'], time() + (60 * 60 * 24 * 30)); // expires in 30 days
setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30)); // expires in 30 days
} 
header('Location: http://localhost/eshopz/homepage.php'); 
} }
 
/* _________________ Sign up part ________________________*/
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
$user_check= false;
$email_check= false;
if (empty($first_name) || empty($username) || empty($password) || empty($repassword) || empty($gender) || empty($email)) { $detail= true; }
 if($password != $repassword){ $pass_check=true; }
 /*Connect to mysql database*/require_once('connect_mysql.php');
 $query = "SELECT * FROM users_list";
 $result = mysqli_query($link, $query) or die ('Error connecting to database');
 while ( $row = mysqli_fetch_array($result)) { if ($row['username'] == $username)  { $user_check=true;} 
  if ($row['email'] == $email)  { $email_check=true; } }
  mysqli_close($link);

 /*__________________ successful sign up _____________________*/ 
 if($detail == false && $pass_check == false && $user_check == false && $email_check == false) {
 $form = false;
 /*Connect to mysql database*/require_once('connect_mysql.php');
$query = "INSERT INTO users_list (date_time, first_name, last_name, username, password, email, gender)" .
"VALUES(NOW(), '$first_name', '$last_name', '$username', sha('$password'), '$email', '$gender')";
 mysqli_query ($link, $query) or die ('Error connecting database') ;
 mysqli_close($link);
 session_start();
$_SESSION['username'] = $username;
header('Location: http://localhost/eshopz/sign_up.php');
 }  else {$form = true;} }
 
 /*_______________________ already logged in___________________ */
 else if (isset($_SESSION['user_id'])) { header('Location: http://localhost/eshopz/homepage.php');  }
 else if (isset($_COOKIE['user_id']) && isset($_COOKIE['username'])) {
header('Location: http://localhost/eshopz/homepage.php');  }
 
 /* _________________ sign up & login forms __________________*/
 if ($form == true) {
 ?>
<div class="header"> <form class='log_in' action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<div class="table-row"> <p> Username: </p> <p> Password: </p> </div>
<div class="table-row"> <p class="sp"> <input type="text" name="username" 
value="<?php if (isset ($_POST['log_in'])){echo $_POST['username'];} else echo ''; ?>">
<br> <input type="checkbox" name="keep_logged"><font size="2px">Keep me logged in </font> </p>
<p class="sp"> <input type="password" name="secret" value=""> <br> <font color="red" size="2px">
 <?php if (isset($login)) {if ($login == false) { echo 'Username or password is wrong!'; } } ?> </font></p>
<input type="submit" name="log_in" value="Log in"></div> 
</form> </div>	
 <img src="images/9219.png" alt="eshop" width="500px" height="500px">
 <div class="form"> <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<h2> SIGN UP </h2>
<p> <font color= "red" size="4px"> Fields with * are mandatory </font></p>
<div class="table-row"> <p>*First Name : </p><p> <input type="text" name="firstname" 
value="<?php if (isset ($_POST['sign_up'])){echo $_POST['firstname'];} else echo ''; ?>"> </p> </div>
<div class="table-row"> <p>Last Name : </p><p><input type="text" name="lastname" 
value="<?php if (isset ($_POST['sign_up'])){echo $_POST['lastname'];} else echo ''; ?>"> </p> </div>			
<div class="table-row"> <p>*Username : </p> <p class="sp"><input type="text" name="username" 
value="<?php if (isset ($_POST['sign_up'])){echo $_POST['username'];} else echo ''; ?>"><br> 
<font color="red" size="2px">
<?php if (isset($user_check)) { if ($user_check) { echo 'username already exists!' . '<br>'; } }?> </font> </p> </div>
<div class="table-row"> <p>*Enter Password : </p> <p><input type="password" name="secret" value=""><br> </p> </div>
<div class="table-row"> <p>*Re-enter Password : </p> <p class="sp"><input type="password" name="secret1" value=""> <br> 
<font color="red" size="2px"><?php
if (isset($pass_check)) { if ($pass_check) { echo 'password not matched!' . '<br>';
} }?> </font> </p> </div>			
<div class="table-row"> <p>*E-mail Id : </p> <p class="sp"><input type="email" name="email" 
value="<?php if (isset ($_POST['sign_up'])){echo $_POST['email'];} else echo ''; ?>"><br> 
<font color="red" size="2px">
<?php if (isset($email_check)) { if ($email_check) { echo 'e-mail id is already registered!' . '<br>'; } }?> </font> </p> </div>
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