<?php
include('../includes/db.php');

function fruitCategory(){
  global $con;
  $selectCategory="Select * from `categories`";
  $resultCategory=mysqli_query($con, $selectCategory);
  while($row_data=mysqli_fetch_assoc( $resultCategory)){
  $categoryTitle=$row_data['category_title'];
  $categoryId = $row_data['category_id'];
  echo "<li><a href='fruitstore.php?category=$categoryId'>$categoryTitle</a></li>";
}
}

function getAllFruit(){
  global $con;

if(!isset($_GET['category'])){
$select_query="Select * from `fruits` order by rand()";
    $result_query=mysqli_query($con,$select_query);

    while($row=mysqli_fetch_assoc($result_query)){
      $productId=$row['fruit_id'];
      $productTitle=$row['fruit_name'];
      $productDescription=$row['fruit_description'];
      $productPrice=$row['fruit_price'];
      $categoryId=$row['category_id'];

      echo "
       <h5>$productTitle</h5>
          <p>$productDescription</p>
              <p>Price: $productPrice</p>
            <a href='fruitstore.php?addToCart=$productId'>Add to Cart</a>
          <a href='fruitdetails.php?product_id=$productId'>View More</a>   ";
}
}
}


function getSomeFruit(){
  global $con;

if(!isset($_GET['category'])){
$select_query="Select * from `fruits` order by rand() LIMIT 0,4";
    $result_query=mysqli_query($con,$select_query);

    while($row=mysqli_fetch_assoc($result_query)){
      $productId=$row['fruit_id'];
      $productTitle=$row['fruit_name'];
      $productDescription=$row['fruit_description'];
      $productPrice=$row['fruit_price'];
      $categoryId=$row['category_id'];

      echo "
       <h5>$productTitle</h5>
          <p>$productDescription</p>
              <p>Price: $productPrice</p>
            <a href='fruitstore.php?addToCart=$productId'>Add to Cart</a>
        <a href='fruitdetails.php?product_id=$productId'>View More</a>  ";
}
}
}

function getuniquecategories(){
  global $con;
if(isset($_GET['category'])){

$categoryID=$_GET['category'];
$select_query="Select * from `fruits` where category_id=$categoryID";
$result_query=mysqli_query($con,$select_query);
$num_of_rows=mysqli_num_rows($result_query);
if($num_of_rows==0){
  echo "<h2>No Stock for this category</h2>";
}
    while($row=mysqli_fetch_assoc($result_query)){
      $productId=$row['fruit_id'];
      $productTitle=$row['fruit_name'];
      $productDescription=$row['fruit_description'];
      $productImage1=$row['fruit_image'];
      $productPrice=$row['fruit_price'];
      $categoryId=$row['category_id'];

      echo "     <img src='#e' alt='$productTitle'>
          <h5>$productTitle</h5>
          <p>$productDescription</p>
              <p>Price: $productPrice</p>
          <a href='store.php?addToCart=$productId'>Add to Cart</a>
          <a href='fruitdetails.php?product_id=$productId'>View More</a> ";
}
}
}


function search(){
    global $con;
    if(isset($_GET['search_data_product'])){
      $search_data_value=$_GET['search_data'];
      $search_query="Select * from `fruits` where fruit_keyword like '%$search_data_value%'";
      $result_query=mysqli_query($con,$search_query);
      $num_of_rows=mysqli_num_rows($result_query);
      if($num_of_rows==0){
        echo "<h2>No Items available</h2>";
      }
      while($row=mysqli_fetch_assoc($result_query)){
        $productId=$row['fruit_id'];
        $productTitle=$row['fruit_name'];
        $productDescription=$row['fruit_description'];
        $productImage1=$row['fruit_image'];
        $productPrice=$row['fruit_price'];
        $categoryId=$row['category_id'];

        echo "
            <h5>$productTitle</h5>
            <p>$productDescription</p>
            <p>Price: $productPrice</p>
            <a href='store.php?addToCart=$productId'>Add to Cart</a>
          <a href='fruitdetails.php?product_id=$productId'>View More</a>  ";
  }
  }

}


function viewDetails(){
  global $con;

if(isset($_GET['product_id'])){
if(!isset($_GET['category'])){

     $productID=$_GET['product_id'];
    $select_query="Select * from `fruits` where fruit_id=$productID";
    $result_query=mysqli_query($con,$select_query);

    while($row=mysqli_fetch_assoc($result_query)){
      $productId=$row['fruit_id'];
      $productTitle=$row['fruit_name'];
      $productDescription=$row['fruit_description	'];
      $productImage1=$row['fruit_image'];
      $productPrice=$row['fruit_price'];
      $categoryId=$row['category_id'];

      echo "
          <img src='./admin/product_images/$productImage1' alt='$productTitle'>
          <h5>$productTitle</h5>
          <p>$productDescription</p>
          <p>Price: $productPrice</p>
          <a href='store.php?addToCart=$productId'>Add to Cart</a>
          ";
}
}
}
}


function getIPAddress() {
   //whether ip is from the share internet
    if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
               $ip = $_SERVER['HTTP_CLIENT_IP'];
       }
   //whether ip is from the proxy
   elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
               $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
//whether ip is from the remote address
   else{
            $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
$ip = getIPAddress();


function cartItem(){
  if(isset($_GET['addToCart'])){
    global $con;
    $ip = getIPAddress();
    $select_query="Select * from  `cart_details` where ip_address='$ip'";
    $result_query=mysqli_query($con,$select_query);
    $count_cart_items=mysqli_num_rows($result_query);
     }else{
       global $con;
       $ip = getIPAddress();
       $select_query="Select * from  `cart_details` where ip_address='$ip'";
       $result_query=mysqli_query($con,$select_query);
       $count_cart_items=mysqli_num_rows($result_query);

    }
  echo $count_cart_items;
  }


  function cart (){
  if(isset($_GET['addToCart'])){
    global $con;
    $ip = getIPAddress();
    $getProductID=$_GET['addToCart'];
    $select_query="Select * from  `cart_details` where ip_address='$ip' and fruit_id=$getProductID";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows>0){
      echo "<script>alert('This Item is already Present in your cart')</script>";
      echo "<script>window.open('fruitstore.php','_self')</script>";
    } else{
      $insert_query="insert into `cart_details` (fruit_id,ip_address,quantity) values(  $getProductID,'$ip',0)";
      $result_query=mysqli_query($con,$insert_query);
        echo "<script>alert('Item Added')</script>";
        echo "<script>window.open('fruitstore.php','_self')</script>";
    }
  }
  }


  function totalCartPrice(){
      global $con;
      $ip = getIPAddress();
      $total_price=0;
      $cart_query="Select * from `cart_details` where ip_address='$ip'";
      $result=mysqli_query($con,$cart_query);
      while($row=mysqli_fetch_array($result)){
        $product_id=$row['fruit_id'];
        $select_products="Select * from `fruits` where fruit_id='$product_id'";
        $result_products=mysqli_query($con,$select_products);
        while($row_product_price=mysqli_fetch_array($result_products)){
          $product_price=array($row_product_price['fruit_price']);
          $product_values=array_sum($product_price);
          $total_price+=$product_values;
        }
      }
      echo $total_price;
  }



  function user_order_details (){
    global $con;
    $username=$_SESSION['username'];
    $get_details="Select * from `user_table` where username='$username'";
    $result_query=mysqli_query($con,$get_details);
    while($row_query=mysqli_fetch_array($result_query)){
      $user_id=$row_query['user_id'];
       if(!isset($_GET['editaccount'])){
         if(!isset($_GET['myorders'])){
           if(!isset($_GET['deleteaccount'])){
             $get_orders="Select * from `user_orders` where user_id=$user_id and 	order_status='pending'";
              $result_orders_query=mysqli_query($con,$get_orders);
              $row_count=mysqli_num_rows($result_orders_query);
              if($row_count>0){
                echo "<h3>Pending Orders: <span>$row_count</span></h3> <p><a href='profile.php?myorders'>Order Details</a></p>";
              } else {
                echo "<h3><a href='../store.php'>Explore Products</a></h3>";
              }
            }
         }
       }
     }
  }
?>
