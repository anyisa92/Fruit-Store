<?php include('header.php');?>
<header>
  <?php
  if (!isset($_SESSION['username'])){
    echo  "<script>alert('Please Log In')</script>";
    echo  "<script>window.open('login.php','_self')</script>";
  } ?>
<main>

      <h1>Profile Page</h1>
      <a href="profile.php">Your Profile</a>

      <ul>
      <li><a href="profile.php?pendingorders">Pending orders</a></li>
      <li><a href="profile.php?editaccount">Edit Account</a></li>
          <li><a href="profile.php?myorders">My Orders</a></li>
      <li><a href="profile.php?deleteaccount">Delete Account</a></li>
      </ul>
      <?php
 user_order_details ();
      ?>
      <?php
if(isset($_GET['editaccount'])){
  include('editaccount.php');
} if(isset($_GET['myorders'])){
  include('userorders.php'); 
}if(isset($_GET['pendingorders'])){
  include('pendingorders.php');
}if(isset($_GET['deleteaccount'])){
  include('deleteaccount.php');
}


      ?>
</main>
<?php include('footer.php'); ?>
