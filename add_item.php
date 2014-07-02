<?php 
$form = false;
if (isset ($_POST['add_item'])) {
$name = $_POST['item_name'];
$price = $_POST['price'];
$discount = $_POST['discount'];
$category = $_POST['category'];
$details = $_POST['details'];
$image = $_FILES['image']['name'];
$detail = false; $image_check = false; $error = false;
if (($_FILES["image"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["image"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["image"]["type"] == "image/x-png") || ($_FILES["file"]["type"] == "image/png")) {
if ($_FILES['image']['error'] == 0) { move_uploaded_file($_FILES['image']['tmp_name'], images/$_FILES['image']['name']); $form = false;}
else {$error = true;}} else {$form= true; $image_check = true;}
if ((empty($name)) || (empty($price)) || (empty($category)) || (empty($image))) {$form = true; $detail= true;}
if ($form == false) { 
$link = mysqli_connect('localhost', 'root', 'eshop-aykp', 'eshopz') or die ('Error connecting to mysql sever');
$query1 = "SELECT * FROM shops_list WHERE user_id = $user_id";
$row = mysqli_fetch_array(mysqli_query($link, $query1));
$seller_id = $row['seller_id'];
$query = "INSERT INTO items_list (user_id, seller_id,date_upload, category, selling_price, discount, details) " .
"VALUES ('$user_id','$seller_id', NOW(), '$category', '$price', '$discount', '$details')";
mysqli_query($link, $query) or die ('Error connecting to database');
$query = "UPDATE users_list SET sale= 1 WHERE user_id = '$user_id'";
mysqli_query($link, $query) or die ('Error connecting to database');
msysqli_close($link); 
/*confirmation*/?>
<br><br>
<p>The item has been successfully added with the following image.<br>
<img src="images/$_FILES['image']['name']" alt = "item uploaded"> </p>
<?php }} 
else {$form = true;}
if ($form==true) {
?>
<div>
<h4> Add the item you want to sell </h4>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" enctype = "multipart/form-data" method="POST">
<p> <font color= "red" size="4px"> Fields with * are mandatory </font></p>
<div class="table-row"><p>Item name*: </p><p><input type="text" name="item_name" value=""></p></div>
<div class="table-row"><p>Selling price (&#8377)*: </p><p><input type="text" name="price" value=""></p></div>
<div class="table-row"><p>Discount(%): </p><p><input type="text" name="discount" value="0"></p></div>
<div class="table-row"><p>Category*: </p><p><select name="category">Books</select><select name="category">Lab material</select></p></div>
<div class="table-row"><p>More Details: </p> <p><textarea name="details" rows= "5" cols = "30"></textarea></p></div>
<div class="table-row"><p>Upload an image of the item*: </p>
<p class = "sp"><input type="file" name="image" id="image"><br><input type="hidden" value="<?php echo $item['id'];?>" name="filename">
<font color="red" size="2px"><?php if ((isset($image_check)) || (isset($image_check)))  { if ($image_check) { 
echo 'File should be an image file!' . '<br>';}
if ($image_check) { echo 'There was an error, try again!' . '<br>';} }?> </font></p></div>
<div class="table-row"><p class="sp"><font color="red" size="2px"><?php
if (isset($detail)) { if ($detail) { echo 'Please enter the mandatory details!' . '<br>';} } ?> </font></p>
<input type="submit" name="add_item" value="Add Item"> </div></form></div>
<?php }  ?>