<?php
include('include/connect.php');
include('functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="style.css">
     <style>
        .cart_image {
  width: 80px;
  height: 80px;
  object-fit: contain;
}

     </style>

</head>




<body>
    <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg "style="background-color: #e3f5e3;">
  <div class="container-fluid">
<img src="./images/1.png" alt="" class="logo">
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">product</a>
        </li>
        <?php if(!isset($_SESSION['username'])){
      echo "<li class='nav-item'>
          <a class='nav-link' href='./usersarea/userregestration.php'>register</a>
        </li> ";
      }else{
      echo "<li class='nav-item'>
          <a class='nav-link' href='./usersarea/profile.php'>My Acount</a>
        </li> ";
     }
?>
        <li class="nav-item">
          <a class="nav-link" href="/">contact</a>
        </li>
        <li class="nav-item">
        
          <a class="nav-link" href="cart.php">cart<sup><?php cart_item()?></sup></i></a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>

<?php
cart();

?>

    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>




<nav class="navbar navbar-expand-lg navbar-dark bg-secondary ">

<ul class="navbar-nav me-auto">
<?php
if(!isset($_SESSION['username'])){
  echo "<li class='nav-item'>
          <a class='nav-link' href='#'>welcome</a>
</li>";
}else{
  echo "<li class='nav-item'>
          <a class='nav-link' href='#'>welcome ".$_SESSION['username']."</a>
</li>";
}

if(!isset($_SESSION['username'])){
  echo "<li class='nav-item'>
          <a class='nav-link' href='./usersarea/userlogin.php'>login</a>
</li>";
}else{
  echo "<li class='nav-item'>
          <a class='nav-link' href='./usersarea/logout.php'>logout</a>
</li>";
}
?>
</ul>
</nav>


<div class="bg-light">
    <h3 class="text-center">hidden store</h3>
    <p class="text-center">feel free to shop</p>
</div>

<div class="container">
    <div class="row">
      <form action="" method="post">
        <table class="table table-bordered text-center m-auto">
    
            
            <?php
            global $con;
            $get_ip = getIPAddress();
            $total_price=0;
            $carts_query="select * from `cart_details` where ip_address = '$get_ip'";
            $carts_query=mysqli_query($con,$carts_query);
            $result_count=mysqli_num_rows($carts_query);
            if($result_count>0){
             echo" <thead>
              <tr>
                  <th>product title</th>
                  <th>product image</th>
                  <th>quantity</th>
                  <th>total price</th>
                  <th>remove</th>
                  <th colspan='2'>operations</th>
              </tr>
          </thead>
          <tbody>";
            
            while($row_data=mysqli_fetch_array($carts_query)){
              $product_id = $row_data['product_id'];
              $select_products = "select * from `product` where product_id = '$product_id'";
              $products_query=mysqli_query($con,$select_products);
              while($row_data_products=mysqli_fetch_array($products_query)){
                $prod_price = array($row_data_products['product_price']);
                $prod_value = array_sum($prod_price);
                $price_table=$row_data_products['product_price'];
                $product_title=$row_data_products['product_title'];
                $product_image1=$row_data_products['product_image1'];
                $total_price+=$prod_value;
              ?>
                <tr><td><?php echo $product_title?></td>
                <td><img src="./admin-area/product-images/<?php echo $product_image1?>" alt="" class="cart_image"></td>
                <td><input type="text"name="qty"class="form-input w-50"></td>
                <?php
                $get_ip = getIPAddress();
                if(isset($_POST['update_cart'])){
                  $quantity=$_POST['qty'];
                  $update_cart="update `cart_details`
                   set quantity=$quantity where ip_address='$get_ip'";
                  $cart_query_quantity=mysqli_query($con,$update_cart);
                  $total_price=$total_price*$quantity;
                }
                ?>
                <td><?php echo $price_table?></td>
                <td><input type="checkbox" name="removeitem[]"value="<?php echo $product_id ?>"></td>
                <td>
                <!-- <button class='bg-success px-3  py-2 border-0 mx-3'>update</button> -->
                <input type="submit" value="update"class='bg-success px-3  py-2 border-0 mx-3'name="update_cart">
                <input type="submit" value="remove"class='bg-success px-3  py-2 border-0 mx-3'name="remove_cart">
                <tr> 
                    <?php
                    }}}
                    else{
                      echo"<h2 class='text-center text-danger'>cart is empty</h2>";}?>        
            </tbody>
           
        </table>
        <div class='d-flex mb-5'>
        <?php
            global $con;
            $get_ip = getIPAddress();
            $carts_query="select * from `cart_details` where ip_address = '$get_ip'";
            $carts_query=mysqli_query($con,$carts_query);
            $result_count=mysqli_num_rows($carts_query);
            if($result_count>0){
            echo "<h4 class='px-3'>subtotal:<strong class='text-success'>$total_price EGP</strong></h4>
                <input type='submit' value='continue shooping'class='bg-success px-3  py-2 border-0 mx-3'name='continue_shooping'>
                <button class='bg-secondary p-3 py-2 border-0'><a href='./usersarea/checkout.php'
                class='text-black text-decoration-none'>check out</button>";}
            else{
              echo "<input type='submit' value='continue shooping'class='bg-success px-3  py-2 border-0 mx-3'name='continue_shooping'>";
            }
            if(isset($_POST['continue_shooping'])){
              echo"<script>window.open('index.php','_self')</script>";
            }
            ?>
           
        </div>
    </div>
</div>
</form>

<?php  
function removeitem(){
  global $con;
  if(isset($_POST['remove_cart'])){
    foreach($_POST['removeitem'] as $remove_id){
      $delete_query="Delete from `cart_details`
                   where product_id=$remove_id";
      $run_delete=mysqli_query($con,$delete_query);
      if($run_delete){
        echo "<script>window.open('cart.php','_self')></script>";
      }
    }
  }
}
removeitem();


?>

<?php 
include("./include/footer.php");
// $meko = array(4,2,4,5);
// echo array_sum($meko);
?>

</body>
</html>