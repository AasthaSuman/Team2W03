<?php
session_start();
if (isset($_SESSION['user_id'])) {  }
 else if (isset($_COOKIE['user_id']) && isset($_COOKIE['username'])) {
 $_SESSION['user_id'] = $_COOKIE['user_id'];
 $_SESSION['username'] = $_COOKIE['username'];
 }
 else {
 header('Location: http://localhost/eshopz/eshopz.php');  } 
/*Connect to mysql database*/require_once('connect_mysql.php');
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users_list WHERE user_id = '$user_id'";
$result = mysqli_query($link, $query) or die ('Error connecting to database');
$row = mysqli_fetch_array($result);
mysqli_close($link);
?>