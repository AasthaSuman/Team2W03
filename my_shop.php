<?php 
//insert log out option
require_once('log_out.php');
//start session
require_once('session.php');
//insert header
require_once('header.php');
/*Connect to mysql database*/ include ('connect_mysql.php');
$query = "SELECT * FROM users_list WHERE user_id = '$user_id'" or die ('Error connecting to database');
$result = mysqli_query($link,$query);
$row = mysqli_fetch_array($result);
if ($row['shop']== 0) {
?>
<div class="shop"><br><br>
<font color="red" size="10px">  
<a class="shop" href="sale.php" alt="Start selling">Keep items on sale</a>
<p> OR </p>
<a class="shop" href="create_shop.php" alt="Your Shop">Create your own eshop </a>
</font>
</div>
<?php } else {
echo '<div class = "side">';
require_once('add_item.php');
echo '</div> <div><h1>Items in shop </h1>';
$query1 = "SELECT * FROM items_list WHERE user_id = '$user_id' ORDER BY date_upload DESC" or die ('Error connecting to database');
$data = mysqli_query($link, $query1);
if (mysqli_num_rows($data) != 0) {
$count = 0; 
echo '<table class = "items"> <tr><th>Se. No.</th><th>Item Name</th><th>No. of items available</th><th></th></tr>';
while($row1 = mysqli_fetch_array($data)) {
$count++; echo '<tr><td>' . $count . '</td>';
echo '<td>' . $row1['item_name'] . '</td>';
echo '<td>' . $row1['number'] . '</td>';
echo '<td><a href = "change_item.php?id=' . $row1['item_id'] . '">Change</a></td></tr>';} echo '</table>';}
else { echo '<font color= "red" size = "6px"> <br>No item added</font>';}
echo '</div>';}
mysqli_close($link);
?>
</div>
</body>
</html>
