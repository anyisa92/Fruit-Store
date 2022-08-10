<?php include('header.php');?>

<main>
<h1>Register</h1>
<form action="" method="post" enctype="multipart/form-data">
  <label for="user_username">User Name</label>
  <input type="text" id="user_username" placeholder="Enter Your Username" autocomplete="off" required="required" name="user_username"/>
 <label for="user_email">Email</label>
 <input type="text" id="user_email" placeholder="Enter Your Email" autocomplete="off" required="required" name="user_email"/>

 <label for="user_password">Password</label>
 <input type="password" id="user_password" placeholder="Enter Your Password" autocomplete="off" required="required" name="user_password"/>

 <label for="user_confirm_password">Confirm Password</label>
<input type="password" id="user_confirm_password" placeholder="Confirm Your Password" autocomplete="off" required="required" name="user_confirm_password"/>

<input type="submit" value="Register" name="user_register" />
<p>Already have an account ? <a href="userLogin.php">Login</a></p>

</form>
</main>
<aside>
</aside>
<?php
if(isset($_POST['user_register'])){
  $user_username=$_POST['user_username'];
  $user_email=$_POST['user_email'];
  $user_password=$_POST['user_password'];
  $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
  $user_confirm_password=$_POST['user_confirm_password'];
  $user_ip=getIPAddress();

  $select_query="Select * from `user_table` where username='$user_username' or user_email='$user_email'";
  $result=mysqli_query($con,$select_query);
  $rows_count=mysqli_num_rows($result);
  if($rows_count>0){
    echo "<script>alert('Username Already Exist')</script>";
  } else {
    $insert_query="insert into `user_table` (username,user_email,user_password,user_ip)
    values ('$user_username','$user_email','$hash_password','$user_ip')";
    $sql_execute=mysqli_query($con,$insert_query);
    if($sql_execute){
      echo "<script>alert('Data Inserted Successfully')</script>";
    }

  }
  $select_cart_items="Select * from `cart_details` where ip_address='$user_ip'";
  $result_cart=mysqli_query($con,$select_cart_items);
  $rows_count=mysqli_num_rows($result_cart);
  if($rows_count>0){
    echo "<script>alert('You have Items in your cart')</script>";
    echo "<script>window.open('checkout.php','_self')</script>";
  } else {
    echo "<script>window.open('store.php','_self')</script>";
  }

}

?>
<?php include('footer.php'); ?>
