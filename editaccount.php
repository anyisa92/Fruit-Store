<?php
if(isset($_GET['editaccount'])){
  $user_session_name=$_SESSION['username'];
  $select_query="Select * from `user_table` where username='$user_session_name'";
  $result_query=mysqli_query($con,$select_query);
  $row_fetch=mysqli_fetch_assoc($result_query);
  $user_id=$row_fetch['user_id'];
  $username=$row_fetch['username'];
  $user_email=$row_fetch['user_email'];
}
  if(isset($_POST['user_update'])){
    $update_id=$user_id;
    $username=$_POST['user_username'];
    $user_email=$_POST['user_email'];

    $update_data="update `user_table` set username='$username', user_email='$user_email'
    where user_id=$update_id";
    $result_query_update=mysqli_query($con,$update_data);
    if($result_query_update){
      echo "<script>alert('Data Updated Succesfully')</script>";
      echo "<script>window.open('logout.php','_self')</script>";
    }
  }
?>

<h1>Edit Account </h1>
<form action="" method="post" enctype="multipart/form-data">
<input type="text" name="user_username" value="<?php echo $username ?>">
<input type="text" name="user_email" value="<?php echo $user_email ?>">
<input type="submit" value="Update" name="user_update">
</form>
