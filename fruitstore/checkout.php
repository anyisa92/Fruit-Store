<?php include('header.php');?>
<header>

<main>
<h1>Check Out</h1>
<?php
if (!isset($_SESSION['username'])){
  echo  "<script>alert('Please Log In')</script>";
  echo  "<script>window.open('login.php','_self')</script>";
}
?>
<?php
  $user_ip = getIPAddress();
  $get_user="Select * from `user_table` where user_ip='$user_ip'";
  $result=mysqli_query($con,$get_user);
  $run_query=mysqli_fetch_array($result);
  $user_id=$run_query['user_id'];
?>

  <h2>Payment Options</h2>
 <a href="https://www.paypal.com" target="blank">Paypal</a>
  <a href="order.php?user_id=<?php echo $user_id ?>">Pay Offline</a>

</main>
<aside>

</aside>
<?php include('../footer.php'); ?>
