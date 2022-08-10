<?php
include('../includes/db.php');
if(isset($_POST['insertFruit'])){
$product_title=$_POST['fruitName'];
$description=$_POST['description'];
$product_keywords=$_POST['keywords'];
$product_category=$_POST['fruitCategories'];
$product_price=$_POST['fruitPrice'];
$product_status="true";

$product_image1=$_FILES['fruitImage']['name'];

$temp_image1=$_FILES['fruitImage']['tmp_name'];

if($product_title=='' or $description==''
or $product_keywords=='' or $product_category==''
 or $product_price=='' or $product_image1==''  ){
   echo "<script>alert('Please fill all the available fields')</script>";
   exit();
 } else {
move_uploaded_file($temp_image1,"fruitimages/$product_image1");

$insert_Products="insert into `fruits`
(fruit_name,fruit_description,fruit_keyword	,fruit_category,fruit_image,fruit_price,date,status)
values ('$product_title','$description','$product_keywords','$product_category','$product_image1','$product_price',NOW(),'$product_status')";
$result_query=mysqli_query($con,$insert_Products);
if ($result_query) {
     echo "<script>alert('Products Inserted')</script>";
}
 }


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Insert Products</title>
</head>
<body>
<h1>Insert New Fruits</h1>
<form action="" method="post" enctype="multipart/form-data">

<label for="productTitle">Fruit Name</label>
<input type="text" name="fruitName" id="fruitName" placeholder="Enter Product Title" autocomplete="off" >

<label for="description">Description</label>
<input type="text" name="description" id="description" placeholder=" Enter Description" autocomplete="off" >

<label for="keywords">Keyword</label>
<input type="text" name="keywords" id="keywords" placeholder="Enter Keywords" autocomplete="off" >

<select name="fruitCategories" id="fruitCategories">
  <option value="">Select Category 1</option>
  <?php
$select_query="Select * from `categories`";
$result_query=mysqli_query($con,$select_query);
while($row=mysqli_fetch_assoc($result_query)){
  $categoryTitle = $row['category_title'];
  $categoryId = $row['category_id'];
  echo   "<option value='$categoryId'>$categoryTitle </option>";
}?>
</select>

<label for="productImage1"> Fruit Image</label>
<input type="file" name="fruitImage" id="fruitImage" >

<label for="productPrice">Fruit Price</label>
<input type="text" name="fruitPrice" id="fruitPrice" placeholder="Enter Product Price" autocomplete="off" >

<input type="submit" name="insertFruit" value="Insert Fruit">

</form>
</body>
</html>
