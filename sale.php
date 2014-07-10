<?php 
//insert log out option
require_once('log_out.php');
//start session
require_once('session.php');
//insert header
require_once('header.php');
?>
<div class="add_item">
<?php require_once('add_item.php'); 
if ($form == false && $detail == false && $image_check == false && $error = false) {
/*Connect to mysql database*/include ('connect_mysql.php');
$query = "UPDATE users_list SET sale = 1 WHERE user_id = '$user_id'";
mysqli_query($link, $query) or die ('Error connecting to database');
mysqli_close($link);
} ?>
</div>
</body></html>
