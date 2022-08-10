<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UX-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width,initial-scale=1.0">
     <title>Admin Dashboard</title>
</head>
<body>
  <h1>Admin Panel</h1>

<h2>Manage Details</h2>
<br>
  <p>Admin Name</p>
  <br>
  <button><a href="admin.php?insertfruits">Insert Fruits</a></button>
  <button><a href="#">View Fruits</a></button>
  <button><a href="admin.php?category">Insert Category</a></button>
  <button><a href="#">View Categories</a></button>
  <button><a href="#">All Orders</a></button>
  <button><a href="#">All Payments</a></button>
  <button><a href="#">List Users</a></button>
  <button><a href="#">Log Out</a></button>
  <br>
<?php
if(isset($_GET['category'])){
  include('insertcategory.php');
} if(isset($_GET['insertfruits'])){
  include('insertfruits.php');
}
 ?>
</body>
</html>
