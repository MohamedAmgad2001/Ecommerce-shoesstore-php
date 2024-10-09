<?php

if(isset($_GET['delete_payment'])){
    $delete_payment=$_GET['delete_payment'];

    $delete_query_payment="delete from user_payments where payment_id=$delete_payment";
    $result_payment=mysqli_query($con,$delete_query_payment);
    if($result_payment){
        echo "<script>alert('payment is deleted successfully')</script>";
        echo "<script>window.open('./index.php?list_payment','_self')</script>";
    }

}