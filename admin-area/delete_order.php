<?php

if(isset($_GET['delete_order'])){
    $delete_order=$_GET['delete_order'];

    $delete_query_order="delete from user_orders where order_id=$delete_order";
    $result_order=mysqli_query($con,$delete_query_order);
    if($result_order){
        echo "<script>alert('order is deleted successfully')</script>";
        echo "<script>window.open('./index.php?list_orders','_self')</script>";
    }

}