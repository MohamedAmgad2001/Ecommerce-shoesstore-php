<?php
if(isset($_GET['edit_category'])){
    $edit_cat=$_GET['edit_category'];
    $get_cat="select * from categories where cat_id=$edit_cat";
    $result=mysqli_query($con,$get_cat);
    $rows_cat=mysqli_fetch_assoc($result);
    $cat_title=$rows_cat['cats_title'];
    
}

if(isset($_POST['edit_cat'])){
    $category_title=$_POST['cat_title'];

    $update_query="update categories set cats_title='$category_title' where cat_id=$edit_cat";
    $result_cat=mysqli_query($con,$update_query);
    if($result_cat){
        echo "<script>alert('category is updated successfully')</script>";
        echo "<script>window.open('./index.php?view_categories','_self')</script>";
    }
}


?>

<div class="container mt-3">
    <h1 class="text-center">Edit Category</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="cat_title" class="form-label">category title</label>
            <input type="text" value="<?php echo $cat_title;?>" name="cat_title" id="cat_title" class="form-control" 
            required="required">
        </div>
        <input type="submit" value="update category" class="btn btn-success px-3 mb-3" name="edit_cat">
    </form>
</div>

