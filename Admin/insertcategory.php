<?php
include('../includes/db.php');
if(isset($_POST['insertFruitCat'])){
$categoryTitle = $_POST['catTitle'];

$selectQuery="select * from `categories` where category_title='$categoryTitle'";
$resultSelect=mysqli_query($con,$selectQuery);
$number=mysqli_num_rows($resultSelect);
if($number>0){
    echo "<script>alert('This category is already located in the database')</script>";
} else{
$insertQuery = "INSERT INTO `categories` (category_title) values ('$categoryTitle')";
$result=mysqli_query($con,$insertQuery);
if($result){
  echo "<script>alert('Category has been inserted')</script>";
}
}}
?>
<h2>Insert Category</h2>
<form action="" method="post">
  <span>@</span>
  <input type="text" placeholder="Insert Fruit" name="catTitle">
  <input type="submit" value="Insert Fruit" name="insertFruitCat">
</form>
