<?php 
include('../include/connect.php');
if(isset($_POST['insert_brand'])){
  $brands_title = $_POST['brand_title'];
  $select_query="select * from `brands` where brand_title = '$brands_title'";
  $result_select = mysqli_query($con,$select_query);
  $number=mysqli_num_rows($result_select);
  if($number>0){
    echo "<script>alert('its already in database')</script>";
  }else{
  $insert_query="INSERT INTO `brands` (brand_title) VALUES ('$brands_title')";
  $result = mysqli_query($con,$insert_query);
  if($result){
    echo "<script>alert('brand has been inserted success')</script>";
  }}
}
?>
<h2 class="text-center">insert brand</h2>
<form action="" method="post"class="mb-2">
<div class="input-group w-90 mb-2">
  <span class="input-group-text bg-success" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="brand_title" placeholder="insert brands" aria-label="Brands" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-2 m-auto">
  <input type="submit" class=" bg-success border-0 p-2" name="insert_brand" value="insert categories">
</div>
</form>

