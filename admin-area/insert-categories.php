<?php 
include('../include/connect.php');
if(isset($_POST['insert_cat'])){
  $category_title = $_POST['cat_title'];

  $select_query="select * from `categories` where cats_title = '$category_title'";
  $result_select = mysqli_query($con,$select_query);
  $number=mysqli_num_rows($result_select);
  if($number>0){
    echo "<script>alert('its already in database')</script>";
  }else{
  $insert_query="INSERT INTO `categories` (cats_title) VALUES ('$category_title')";
  $result = mysqli_query($con,$insert_query);
  if($result){
    echo "<script>alert('category has been inserted success')</script>";
  }}
}
?>
<h2 class="text-center">insert category</h2>
<form action="" method="post"class="mb-2">
<div class="input-group w-90 mb-2">
  <span class="input-group-text bg-success" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="cat_title" placeholder="insert category" aria-label="category" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-2 m-auto">
  <input type="submit" class="bg-success border-0 p-2" name="insert_cat" value="insert categories">
</div>
</form>

