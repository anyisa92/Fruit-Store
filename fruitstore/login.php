<?php include('header.php');?>

<main>
<h1>Log In</h1>
<form action="" method="post" enctype="multipart/form-data">

  <label for="user_username">User Name</label>
  <input type="text" id="user_username" placeholder="Enter Your Username" autocomplete="off" required="required" name="user_username"/>


<label for="user_password">Password</label>
<input type="password" id="user_password" placeholder="Enter Your Password" autocomplete="off" required="required" name="user_password"/>

     <input type="submit" value="Login" name="user_login"/>
     <p>Don't have an account ? <a href="register.php">Register</a></p>
     </form>
</main>
<?php
if(isset($_POST['user_login'])){

  $user_username=$_POST['user_username'];
  $user_password=$_POST['user_password'];
  $select_query="Select * from `user_table` where username='$user_username'";
  $result=mysqli_query($con,$select_query);
  $row_count=mysqli_num_rows($result);
  $row_data=mysqli_fetch_assoc($result);
  $ip = getIPAddress();


  $select_query_cart="Select * from `cart_details` where ip_address='$ip'";
  $select_cart=mysqli_query($con,$select_query_cart);
  $row_count_cart=mysqli_num_rows($select_cart);
  if($row_count>0){
      $_SESSION['username']=$user_username;
if(password_verify($user_password,$row_data['user_password'])){
  if($row_count==1 and $row_count_cart==0){
      $_SESSION['username']=$user_username;
      echo  "<script>alert('Login Success')</script>";
      echo  "<script>window.open('profile.php','_self')</script>";
  } else {
      $_SESSION['username']=$user_username;
    echo  "<script>alert('Login Success')</script>";
    echo  "<script>window.open('checkout.php','_self')</script>";
  }

} else {
  echo  "<script>alert('Invalid Credentials')</script>";
}
  } else {
       echo  "<script>alert('Invalid Credentials')</script>";
  }
}
?>

<?php include('footer.php'); ?>
