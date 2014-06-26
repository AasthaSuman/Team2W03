<?php 
/* _____________ Log Out_____________*/
if (isset($_POST['log_out'])) {
if (isset($_SESSION['user_id'])) { $_SESSION = array();}
if (isset($_COOKIE['session_name']))  { setcookie(session_name(), '', time() - 3600); 
session_destroy();}
setcookie(username, '', time() - 3600);
setcookie(user_id, '', time() - 3600);
header('Location: http://localhost/eshopz/eshopz.php'); }
require_once('session.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>
e-Shopz
</title>
 <link type="text/css" rel="stylesheet" href="stylesheet.css">
</head>
<body>
<div class="header">
<div> 
<?php 
require_once('session.php');
echo 'Welcome to eshopz, ' . $row['first_name'] . ' ' . $row['last_name']; ?>
</div></div> <div class='option'> <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
<span class='option'><a href="homepage.php">HOME</a></span>
<span class='option'><a>MY ACCOUNT</a></span>
<span class='option'><a href="my_shop.php">MY SHOP</a></span>
<span class='option'><a>NOTIFICATION</a></span>
<span><input type='submit' value='Log Out' name='log_out'></span>
</form></div>
</body>
</html>
