<?php
//insert log out option
require_once('log_out.php');
//start session
require_once('session.php');
//insert header
require_once('header.php');
/*Connect to mysql database*/include ('connect_mysql.php');
$query = "SELECT * FROM items_list where user_id = '$user_id' ORDER BY item_id DESC" or die ('Error connecting to database');
$result = mysqli_query($link, $query);
$row = mysqli_fetch_array($result);
echo '<font size = "5px"><p>The item <b>' . $row['item_name'] . '</b> was successfully added with the following image. <br>' . 
'<center><img src="images/' . $row['image'] . '" height = "180px" width = "150px" alt = "item uploaded"></center> </p></font>'.
'<a href = "my_shop.php"> <font color = "black">&gt;&gt; Go back to My Shop page</font> </a>';
mysqli_close($link);
?>
</body> </html>