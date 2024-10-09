<?php

if(isset($_GET['delete_brands'])){
    $delete_brands=$_GET['delete_brands'];

    $delete_query_brand="delete from brands where brand_id=$delete_brands";
    $result_brands=mysqli_query($con,$delete_query_brand);
    if($result_brands){
        echo "<script>alert('brands is deleted successfully')</script>";
        echo "<script>window.open('./index.php?view_brands','_self')</script>";
    }

}