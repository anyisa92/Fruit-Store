<?php
$username=$_SESSION['username'];
$get_user="Select * from `user_table` where username='$username'";
$result=mysqli_query($con,$get_user);
$row_fetch=mysqli_fetch_assoc($result);
$user_id=$row_fetch['user_id'];
?>


<h1>All Orders</h1>
<thead>
<table>
<th>Order Number</th>
<th>Amount Due</th>
<th>Total Products</th>
<th>Invoice Number</th>
<th>Date</th>
<th>Complete/Incomplete</th>
<th>Status</th>
</table>
</thead>
<tbody>
  <?php
$get_order_details="Select * from `user_orders` where user_id='$user_id'";
$result_orders=mysqli_query($con,$get_order_details);
while($row_orders=mysqli_fetch_assoc($result_orders)){
  $order_id=$row_orders['order_id'];
  $amount_due=$row_orders['amount_due'];
  $total_products=$row_orders['total_fruits'];
  $invoice_number=$row_orders['invoice_number'];
  $order_status=$row_orders['order_status'];
    if($order_status=='pending'){
      $order_status='Incomplete';
    }else{
      $order_status='Complete';
    }
  $order_date=$row_orders['order_date'];
  $number=1;
  echo "
  <br>
<tr>
<td>$order_id</td>
<td> $amount_due</td>
<td>  $total_products</td>
<td>$invoice_number</td>
<td>$order_date</td>
<td>$order_date</td>
<td>$order_status</td>
<td><a href='confirmpayment.php?order_id=$order_id'>Confirm Payment</a></td>
</tr>
<br>
";
}

?>
</tbody>
