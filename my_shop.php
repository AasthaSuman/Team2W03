<?php 
require_once('log_out.php');
require_once('session.php');
require_once('header.php');
$link = mysqli_connect ('localhost', 'root', 'eshop-aykp', 'eshopz') or die ('Error connecting to mysql sever');
$query = "SELECT * FROM users_list WHERE user_id = '$user_id'";
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
<?php } else { ?>
<div class = "side">
<?php require_once('add_item.php'); } ?>
</div>
</body>
</html>
