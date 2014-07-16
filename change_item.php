<?php
//insert log out option
require_once('log_out.php');
//start session
require_once('session.php');
//insert header
require_once('header.php');
/*Connect to mysql database*/include('connect_mysql.php');
$id = $_GET['id'];
$query = "SELECT * FROM items_list WHERE item_id = '$id'";
$result  = mysqli_query($link, $query);
$row = mysqli_fetch_array($result);
mysqli_close($link);
$form = false;
if (isset ($_POST['add_item'])) {
$name = $_POST['item_name'];
$price = $_POST['price'];
$number = $_POST['number'];
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
if ((empty($name)) || (empty($price)) || (empty($number))) {$form = true; $detail= true;}
//item changed successfully
if ($form == false) {
/*Connect to mysql database*/ include ('connect_mysql.php');
$query1 = "SELECT category_id FROM category WHERE category_name = '$category'";
$row = mysqli_fetch_array(mysqli_query($link, $query1)); $category_id = $row['category_id'];
$query = "UPDATE items_list SET item_name = $name, selling_price = $price, discount = $discount, number = $number,".
"category_id = $category_id, details = $details WHERE item_id = '$id'" or die ('Error connecting to database');
}
//item changing failed
} else {$form = true;}
if ($form == true) {
 ?>
<div class= "item_form">
<h4>  Make changes in the item </h4>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" enctype = "multipart/form-data" method="POST">
<p> <font color= "red" size="4px"> Fields with * should not be left empty </font></p>
<div class="table-row"><p>Item name*: </p><p><input type="text" name="item_name" value="<?php echo $row['item_name'];?>"></p></div>
<div class="table-row"><p>Selling price (&#8377)*: </p><p><input type="text" name="price" value="<?php echo $row['selling_price'];?>"></p></div>
<div class="table-row"><p>No. of items available*: </p><p><input type="text" name="number" value="<?php echo $row['number'];?>"></p></div>
<div class="table-row"><p>Discount(%): </p><p><input type="text" name="discount" value="<?php echo $row['discount'];?>"></p></div>
<div class="table-row"><p>Category*: </p><p><select name="category"><option value = "0">--</option><option value="books">Books</option>
<option value = "lab">Lab materials</option><option value = "others">Others</option></select></p></div>
<div class="table-row"><p>More Details: </p> <p><textarea name="details" rows= "5" cols = "30">
<?php echo $row['details'] ?></textarea></p></div>
<div class="table-row"><p>Upload a new image of the item: </p>
<p class = "sp"><input type="file" name="image" id="image"><br><input type="hidden" value="<?php echo $item['id'];?>" name="filename">
<font color="red" size="2px"><?php if ((isset($image_check)) || (isset($error)))  { if ($image_check) { 
echo 'File should be an image file!' . '<br>';}
if ($error) { echo 'There was an error, try again!' . '<br>';} }?> </font></p></div>
<input type="submit" name="change_item" value="Change Item"> </div></form></div>
<?php } ?>


 