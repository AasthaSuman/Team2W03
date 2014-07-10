<?php 
//insert log out option
require_once('log_out.php');
//start session
require_once('session.php');
//insert header
require_once('header.php');
?>
<?php 
$form = false;
if (isset($_POST['create_shop'])) {
$user_id = $_SESSION['user_id'];
$name = $_POST['shop_name'];
$address = $_POST['address'];
$phone = $_POST['phone_no'];
$mobile = $_POST['mo_no'];
$details = $_POST['details'];
$detail = false;
If ((empty($name))|| (empty($address)) || (empty($mobile))) {$form = true; $detail = true;} 
if ($form == false) { 
/*Connect to mysql database*/ include ('connect_mysql.php');
$query = "INSERT INTO shops_list (user_id, date_made, shop_name, address, phone_no, mobile_no, details) " .
"VALUES ('$user_id', NOW(), '$name', '$address', '$phone', '$mobile', '$details')";
mysqli_query($link, $query) or die ('Error connecting to database');
$query = "UPDATE users_list SET shop = 1 WHERE user_id = '$user_id'";
mysqli_query($link, $query) or die ('Error connecting to database');
msysqli_close($link);
/*confirmation*/ ?>
<p><br><br>The shop with following details has been created. You will be redirected to your shop in 15 seconds.<br></p>
<table> <tr><td>Shop name: </td><td><?php echo '$name'; ?></td></tr>
<tr><td>Address: </td><td><?php echo '$address'; ?></td></tr>
<tr><td>Phone no.: </td><td><?php if (!empty($phone)) {echo '$phone';} else {echo 'none';} ?></td></tr>
<tr><td>Mobile no.: </td><td><?php echo '$mobile'; ?></td></tr>
<tr><td>Further Details: </td><td><?php if (!empty($details)) {echo '$details';} else {echo 'none';?></td></tr>
</table> 
<?php header('Refresh: 15; url= http://localhost/eshopz/my_shop.php'); }} }
else {$form = true;}
if ($form == true) {
?>
<div class="create_shop">
<h4> Fill up the following form to create your shop </h4>
<form class="create_shop" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
<p> <font color= "red" size="4px"> Fields with * are mandatory </font></p>
<div class="table-row"> <p>Shop Name*: </p><p><input type="text" name="shop_name" value=""></p> </div>
<div class="table-row"> <p>Address*: </p><p><input type="text" name="address" value=""></p></div>
<div class="table-row"> <p>Phone no.: </p><p><input type="text" name="phone_no" value=""></p></div>
<div class="table-row"> <p>Mobile no.*: </p><p><input type="text" name="mo_no" value=""></p></div>
<div class="table-row"> <p>More Details: </p> <p><textarea name="address" rows= "7" cols = "40"></textarea></p></div>
<div class="table-row"> <p class="sp"><font color="red" size="2px"><?php
if (isset($detail)) { if ($detail) { echo 'Please enter the mandatory details!' . '<br>';} } ?> </font></p>
<input type="submit" name="create_shop" value="Create Shop"> </div>
</form></div>
</body>
</html>
<?php }
 ?>