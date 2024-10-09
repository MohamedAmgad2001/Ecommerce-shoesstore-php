<?php

if(isset($_GET['delete_category'])){
    $delete_cat=$_GET['delete_category'];

    $delete_query="delete from categories where cat_id=$delete_cat";
    $result=mysqli_query($con,$delete_query);
    if($result){
        echo "<script>alert('category is deleted successfully')</script>";
        echo "<script>window.open('./index.php?view_categories','_self')</script>";
    }

}