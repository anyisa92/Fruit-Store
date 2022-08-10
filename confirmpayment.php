<?php include('header.php');?>
<?php
if(isset($_GET['order_id'])){
  $order_id=$_GET['order_id'];
  $select_data="Select * from `user_orders` where order_id='$order_id'";
  $result=mysqli_query($con,$select_data);
  $row_fetch=mysqli_fetch_assoc($result);
  $invoice_number=$row_fetch['invoice_number'];
  $amount=$row_fetch['amount_due'];
}

if(isset($_POST['confirm_payment'])){
  $invoice_number=$_POST['invoice_number'];
  $amount=$_POST['amount'];
  $payment_mode=$_POST['payment_mode'];
  $insert_query="insert into `user_payments` (order_id,invoice_number,amount,	payment_mode)
  values($order_id,$invoice_number,$amount, $payment_mode)";
  $results=mysqli_query($con,$insert_query);
  if($results){
     echo "<h4>Payment Completed!</h4>";
     echo "<script>window.open('profile.php','_self')</script>";
  }
  $update_orders="update `user_orders` set order_status='Complete' where order_id='$order_id'";
}

?>

<h1>Confirm Payment</h1>
<br>
<form action="" method="post">
  <br>
  <label>Invoice Number</label>
  <input type="text" name="invoice_number"  value="<?php echo $invoice_number ?>">
<br>
<label>Amount</label>
  <input type="text" name="amount_due" value="<?php echo  $amount ?>">
<br>
<select name="payment_mode" >
<option value="">Select Payment Mode</option>
<option value="">VISA</option>
<option value="">PAYPAL</option>
<option value="">MASTERCARD</option>
<option value="">DISCOVER</option>
</select>
<br>
<input type="submit" value="Confirm Payment" name="confirm_payment">
<br>
</form>
