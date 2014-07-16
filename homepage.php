<?php 
//insert log out option
require_once('log_out.php');
//start session
require_once('session.php');
//insert header
require_once('header.php');
?><br>
<div class = "category">
<ul><a><b>Books</b></a>
<li><a>Study related books</a></li>
<li><a>Novels</a></li>
<li><a>Magazines</a></li>
<li><a>Others</a></li>
</ul>
<ul><a><b>Lab materials</b></a>
<li><a>Mechanical lab</a></li>
<li><a>Engineering Design</a></li>
<li><a>Others</a></li>
</ul>
<ul><a><b>Electronics & Computers</b></a>
<li><a>Camera and Accessories</a></li>
<li><a>Laptop</a></li>
<li><a>Laptop Accessories</a></li>
<li><a>Videogames</a></li>
<li><a>Other Electronics</a></li>
</ul>
</div>
<div class = "home">
<?php
include ('connect_mysql.php');
$query = "SELECT * FROM items_list ORDER BY date_upload DESC";
$result = mysqli_query($link, $query);
while ($row = mysqli_fetch_array($result)) {
echo '<div> <b>' . $row['item_name'] . '<b><br>Price: ' . $row['selling_price'] . '</div>';}
?>
</div>
</body>
</html>