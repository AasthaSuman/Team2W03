<?php
/* _____________ Log Out_____________*/
if (isset($_POST['log_out'])) {
if (isset($_SESSION['user_id'])) { $_SESSION = array();}
if (isset($_COOKIE['session_name']))  { setcookie(session_name(), '', time() - 3600); 
session_destroy();}
setcookie(username, '', time() - 3600);
setcookie(user_id, '', time() - 3600);
header('Location: http://localhost/eshopz/eshopz.php'); }
?>