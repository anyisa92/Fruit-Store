<?php include('header.php');?>
<header>

<main>
<h1>Cart Page</h1>
<form action="" method="post">
<table>
<?php

      $ip = getIPAddress();
      $total_price=0;
      $cart_query="Select * from `cart_details` where ip_address='$ip'";
      $result=mysqli_query($con,$cart_query);
      $resultCount=mysqli_num_rows($result);
      if($resultCount>0){
        echo "  <thead>
            <tr>
              <th>Product Title</th>
              <th>Product Image</th>
              <th>Quantity</th>
              <th>Total Price</th>
              <th>Remove</th>
              <th>Operations</th>
            </tr>
          </thead>
          <tbody>";
      while($row=mysqli_fetch_array($result)){
        $product_id=$row['fruit_id'];
        $select_products="Select * from `fruits` where 	fruit_id='$product_id'";
        $result_products=mysqli_query($con,$select_products);
        while($row_product_price=mysqli_fetch_array($result_products)){
          $product_price=array($row_product_price['fruit_price']);
          $price_table=$row_product_price['fruit_price'];
          $product_title=$row_product_price['fruit_name'];
          $product_image1=$row_product_price['fruit_image'];
          $product_values=array_sum($product_price);
          $total_price+=$product_values;

      ?>
      <td><?php echo $product_title?></td>
      <td></td>
      <td><input type="text"  name="qty"</td>
      <?php
      $ip = getIPAddress();
     if(isset($_POST['updateCart'])){
       $quantities=$_POST['qty'];
       $updateCart="update `cart_details` set quantity=$quantities where ip_address='$ip'";
       $result_products_quantity=mysqli_query($con,$updateCart);
       $total_price= $total_price*$quantities;
     }
      ?>
      <td><?php echo $price_table?></td>
      <td>
 <input type="checkbox" name="removeItem[]" value="<?php echo $product_id ?>"></td>
      </td>
      <td>
        <!-- <button><p>Update</p></button> -->
        <input type="submit" value="Update Cart" name="updateCart">
        <input type="submit" value="Remove" name="removeCart">
        </td>
    </tr>
    <?php }}} else {echo "<h2>Cart is Empty</h2>";}?>
  </tbody
</table>
</form>
<?php
$ip = getIPAddress();
$cart_query="Select * from `cart_details` where ip_address='$ip'";
$result=mysqli_query($con,$cart_query);
$resultCount=mysqli_num_rows($result);
if($resultCount>0){
echo "<h4>Subtotal:$total_price</h4>
<input type='submit' value='Continue Shopping' name='continueShopping'>
<button><a href='checkout.php'>Check Out</a></button>";
}else {
  echo "<input type='submit' value='Continue Shopping' name='continueShopping'>";
}
if(isset($_POST['continueShopping'])){
  echo "<script>window.open('store.php','_self')</script>";
}
?>

<?php
function removeItem(){
  global $con;
  if(isset($_POST['removeCart'])){
    foreach($_POST['removeItem'] as $remove_id){
      echo $remove_id;
      $delete_query="Delete from `cart_details` where fruit_id=$remove_id";
      $run_delete=mysqli_query($con,$delete_query);
      if($run_delete){
        echo "<script>window.open('cart.php','_self')</script>";
      }
    }
  }
}
  echo $remove_item=removeItem();
?>
</main>
<aside>

</aside>
<?php include('footer.php'); ?>
