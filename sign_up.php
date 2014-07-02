<html>
<head><title>  </title>
<link type="text/css" rel="stylesheet" href="stylesheet.css">
</head>
<body>
<?php 
session_start();
if (isset($_SESSION['username'])) {
$username = $_SESSION['username'];
$link = mysqli_connect('localhost', 'root', 'eshop-aykp', 'eshopz') or die ('Error connecting to mysql sever');
$query = "SELECT * FROM users_list WHERE username = '$username'";
$result = mysqli_query($link, $query) or die ('Error connecting to database');
$row = mysqli_fetch_array($result);
mysqli_close($link);
$_SESSION['user_id'] = $row['user_id'];
 ?>
<p><font style="bold"> <?php echo 'Dear ' . $row['first_name'] . ' ' . $row['last_name'] . ',<br> You have successfully signed ' .
'up for e-shopz. A confirmation email will be sent to your email id.'; ?></font>
<br>You will be redirected to your homepage within few seconds.  </p>
<?php
header('Refresh:5; url = http://localhost/eshopz/homepage.php');
}
else {header('Location: http://localhost/eshopz/eshopz.php'); }
 ?> 
</body>
</html>