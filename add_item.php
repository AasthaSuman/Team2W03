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
if (!empty($image)) {
if (($_FILES["image"]["type"] == "image/gif") || ($_FILES["image"]["type"] == "image/jpeg")
|| ($_FILES["image"]["type"] == "image/jpg") || ($_FILES["image"]["type"] == "image/pjpeg")
|| ($_FILES["image"]["type"] == "image/x-png") || ($_FILES["image"]["type"] == "image/png")) {
if ($_FILES['image']['error'] == 0) {
move_uploaded_file($_FILES['image']['tmp_name'], 'images/' . $_FILES['image']['name']); $form = false;}
else {$error = true;}} else {$form= true; $image_check = true;}}
if ((empty($name)) || (empty($price)) || (empty($image))) {$form = true; $detail= true;}
//item added successfully
if ($form == false) { 
/*Connect to mysql database*/require_once('connect_mysql.php');
$query1 = "SELECT * FROM shops_list WHERE user_id = $user_id" or die ('Error connecting to database');
$row = mysqli_fetch_array(mysqli_query($link, $query1));
$seller_id = $row['seller_id'];
$query = "INSERT INTO items_list (user_id, seller_id, item_name, date_upload, category, selling_price, discount, details, image) " .
"VALUES ('$user_id','$seller_id', '$name', NOW(), '$category', '$price', '$discount', '$details', '$image')";
mysqli_query($link, $query) or die ('Error connecting to database');
$query = "UPDATE users_list SET sale = 1 WHERE user_id = '$user_id'";
mysqli_query($link, $query) or die ('Error connecting to database');
mysqli_close($link); 
/*confirmation*/
header('Location: http://localhost/eshopz/item_added.php');
 }} 
 //item adding failed
else {$form = true;}
if ($form==true) {
?>
<div class= "item_form">
<h4>  Add the item you want to sell </h4>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" enctype = "multipart/form-data" method="POST">
<p> <font color= "red" size="4px"> Fields with * are mandatory </font></p>
<div class="table-row"><p>Item name*: </p><p><input type="text" name="item_name" 
value="<?php echo (isset($_POST['item_name']) ? $_POST['item_name'] : ''); ?>"></p></div>
<div class="table-row"><p>Selling price (&#8377)*: </p><p><input type="text" name="price" 
value="<?php echo (isset($_POST['price']) ? $_POST['price'] : ''); ?>"></p></div>
<div class="table-row"><p>Discount(%): </p><p><input type="text" name="discount" 
value="<?php echo (isset($_POST['discount']) ? $_POST['discount'] : '0'); ?>"></p></div>
<div class="table-row"><p>Category*: </p><p><select name="category"><option value = "0">--</option><option value="books">Books</option>
<option value = "lab">Lab materials</option><option value = "others">Others</option></select></p></div>
<div class="table-row"><p>More Details: </p> <p><textarea name="details" rows= "5" cols = "30" 
value="<?php echo (isset($_POST['details']) ? $_POST['details'] : ''); ?>"></textarea></p></div>
<div class="table-row"><p>Upload an image of the item*: </p>
<p class = "sp"><input type="file" name="image" id="image"><br><input type="hidden" value="<?php echo $item['id'];?>" name="filename">
<font color="red" size="2px"><?php if ((isset($image_check)) || (isset($error)))  { if ($image_check) { 
echo 'File should be an image file!' . '<br>';}
if ($error) { echo 'There was an error, try again!' . '<br>';} }?> </font></p></div>
<div class="table-row"><p class="sp"><font color="red" size="2px"><?php
if (isset($detail)) { if ($detail) { echo 'Please enter the mandatory details!' . '<br>';} } ?> </font></p>
<input type="submit" name="add_item" value="Add Item"> </div></form></div>
<?php }  ?>