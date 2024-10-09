<?php
if(isset($_GET['delete_product'])){
    $delete_id=$_GET['delete_product'];

    $delete_query="delete from product where product_id=$delete_id";
    $result_products=mysqli_query($con,$delete_query);
    if($result_products){
        echo"<script>alert('product deleted succesfully' </script>";
        echo"<script>window.open('insert_product.php','_self' </script>";
    }
}
?>