<?php
if(isset($_GET['edit_brands'])){
    $edit_brands=$_GET['edit_brands'];
    // " select * from `brands` where brand_id=$edit_brands"
    
    $get_brands="SELECT * FROM brands WHERE brand_id =$edit_brands ";
    $result=mysqli_query($con,$get_brands);
    $rows_brands=mysqli_fetch_assoc($result);
    $brands_title=$rows_brands['brand_title'];
    
}

if(isset($_POST['edit_brand'])){
    $brand_title=$_POST['brands_title'];

    $update_query_brands="update brands set brand_title='$brand_title' where brand_id=$edit_brands";
    $result_brands=mysqli_query($con,$update_query_brands);
    if($result_brands){
        echo "<script>alert('brands is updated successfully')</script>";
        echo "<script>window.open('./index.php?view_brands','_self')</script>";
    }
}


?>

<div class="container mt-3">
    <h1 class="text-center">Edit brands</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="brands_title" class="form-label">brand title</label>
            <input type="text" value="<?php echo $brands_title;?>" name="brands_title" id="brands_title" class="form-control" 
            required="required">
        </div>
        <input type="submit" value="update brand" class="btn btn-success px-3 mb-3" name="edit_brand">
    </form>
</div>

