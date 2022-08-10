<?php
include('includes/db.php');
include('functions/functions.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Fruit Store</title>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/fruitstore.css">
<script src="https://kit.fontawesome.com/79d876b251.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
<nav>
<ul>
<li><a href="fruitstore.php">Home</a></li>
<li><a href="about.php">About</a></li>
<li><a href="store.php">Store</a></li>
<?php
if(isset($_SESSION['username'])){
  echo "<li><a  href='profile.php'>My Account</a></li>";
}

?>
<li><a href="contact.php">Contact</a></li>
</ul>
<?php cart();?>
<ul>
<li><a href="cart.php"><?php cartItem(); ?><i class="fa-solid fa-cart-shopping"></i> Total Price:<?php totalCartPrice(); ?> </a></li>

</ul>
<ul>

  <?php
  if(!isset($_SESSION['username'])){
    echo "<a href='#'>Welcome Guest!</a>";
  } else {
    echo "<a href='profile.php'><i class='fa-solid fa-user'></i></a>";
    echo "<a href='profile.php'>".$_SESSION['username']."</a>";
  }
  if(!isset($_SESSION['username'])){
  echo "<a href='login.php'>Login</a>";
  echo "<a href='register.php'>Register</a>";
  } else {
  echo "<a href='logout.php'>Log Out</a>";
  }
?>
</ul>
<ul>
<li><form action="searchFruit.php" method="get">
  <input type="search" placeholder="Search..." name="search_data">
  <input type="submit" value="Search" name="search_data_product">
</li>
</ul>
</form>
</nav>
