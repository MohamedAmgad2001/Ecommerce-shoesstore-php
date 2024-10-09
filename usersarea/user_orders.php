<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .table{
            background: 1223;
        }
    </style>
</head>
<body>
<?php
$username=$_SESSION['username'];
$get_user="select * from user_table where username = '$username'";
$result = mysqli_query($con,$get_user);
$row_fetch=mysqli_fetch_array($result);
$user_id=$row_fetch['id'];


?>
<h3 class="text-success text-center">all my orders</h3>
<table class="table table-bordered mt-5">
    <thead class="tables">
        
        <?php
        $get_order_details="select * from user_orders where user_id = '$user_id'";
        $result_orders = mysqli_query($con,$get_order_details);
        $num=1;
        $row_count=mysqli_num_rows($result_orders);
        if($row_count==0){
            echo"<h2 class='text-danger text-center mt-5'>No orders yet</h2>";
        }else{
            echo"<tr>
            <th>Serial no.</th>
            <th>Amount Duo</th>
            <th>Total products</th>
            <th>Invoice num.</th>
            <th>Date</th>
            <th>Complete/Incomplete</th>
            <th>Status</th>
            </tr>
            </thead>
            <tbody class='bg-secondary text-center text-light'>";
        while($row_orders=mysqli_fetch_array($result_orders)){
            $oid=$row_orders['order_id'];
            $amount_due=$row_orders['amount_due'];
            $total_products=$row_orders['total_products'];
            $invoice_num=$row_orders['invoice_num'];
            $order_status=$row_orders['order_status'];
            if($order_status=='pending'){
                $order_status='incomplete';
            }else{
                $order_status='complete';
            }
            $order_date=$row_orders['order_date'];
            echo "<tr>
            <td>$num</td>
            <td>$amount_due</td>
            <td>$total_products</td>
            <td>$invoice_num</td>
            <td>$order_date</td>
            <td>$order_status</td>"?>
            <?php
            if($order_status=='complete'){echo "<td>paid</td>";}else{
          echo  "<td><a href='confirm_payment.php?order_id=$oid' class='text-dark'>confirm</a></td>
        </tr>";}
             $num++;
        
            }
        }
        ?>
        
        
        
    </tbody>

</table>
</body>
</html>