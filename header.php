<!DOCTYPE html>
<html><head><meta charset="uff-8">
<title>Welcome to the world of e-shopping</title>
<link type="text/css" rel="stylesheet" href="stylesheet.css">
</head><body>
<div class="header"> <div> <?php echo 'Welcome to eshopz, ' . $row['first_name'] . ' ' . $row['last_name']; ?>  </div>
</div> <div class='option'> <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
<span class='option'><a href="homepage.php">HOME</a></span>
<span class='option'><a>MY ACCOUNT</a></span>
<span class='option'><a href="my_shop.php">MY SHOP</a></span>
<span class='option'><a>NOTIFICATION</a></span>
<span class='option'><input type='submit' value='Log Out' name='log_out'></span>
</form></div>