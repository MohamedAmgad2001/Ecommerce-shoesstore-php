<?php
// include('./include/connect.php');

function getproducts(){
    global $con;
    if(!isset($_GET['cats'])){
        if(!isset($_GET['brand'])){
    $select_products="select * from `product` order by rand() LIMIT 0,6";
      $result_products=mysqli_query($con,$select_products);
      while($row_data=mysqli_fetch_assoc($result_products)){
        $products_id = $row_data['product_id'];
        $products_img = $row_data['product_image1'];
        $products_titl = $row_data['product_title'];
        $products_disc = $row_data['product_description'];
        $products_price = $row_data['product_price'];
        $cat_id = $row_data['cat_id'];
        $brand_id = $row_data['brand_id'];
 echo "<div class='col-md-4 mb-2'><div class='card'>
<img src='./admin-area/product-images/$products_img' class='card-img-top' alt='$products_titl'>
<div class='card-body'>
  <h5 class='card-title'>$products_titl</h5>
  <p class='card-text'>$products_disc</p>
  <p class='card-text'>price = $products_price</p>
  <a href='index.php?add_to_cart=$products_id' class='btn btn-success'>Add To Cart</a>
  <a href='product_details.php?product_id=$products_id' class='btn btn-secondary'>More Info</a>
</div>
</div>
</div>"
    ;}
}
}
}

function get_all_products(){
  global $con;
  if(!isset($_GET['cats'])){
      if(!isset($_GET['brand'])){
  $select_products="select * from `product` order by rand() ";
    $result_products=mysqli_query($con,$select_products);
    while($row_data=mysqli_fetch_assoc($result_products)){
      $products_id = $row_data['product_id'];
      $products_img = $row_data['product_image1'];
      $products_titl = $row_data['product_title'];
      $products_disc = $row_data['product_description'];
      $products_disc = $row_data['product_description'];
      $products_price = $row_data['product_price'];
      $cat_id = $row_data['cat_id'];
      $brand_id = $row_data['brand_id'];
echo "<div class='col-md-4 mb-2'><div class='card'>
<img src='./admin-area/product-images/$products_img' class='card-img-top' alt='$products_titl'>
<div class='card-body'>
<h5 class='card-title'>$products_titl</h5>
<p class='card-text'>$products_disc</p>
  <p class='card-text'>price = $products_price</p>
  <a href='index.php?add_to_cart=$products_id' class='btn btn-success'>Add To Cart</a>
  <a href='product_details.php?product_id=$products_id' class='btn btn-secondary'>More Info</a>
</div>
</div>
</div>"
  ;}
}
}
}

function get_unique_cat(){
    global $con;
    if(isset($_GET['cats'])){
      $cat_id=$_GET['cats'];
      
    $select_products="select * from `product` where cat_id =$cat_id";
      $result_products=mysqli_query($con,$select_products);
      $num_of_rows=mysqli_num_rows($result_products);
      if($num_of_rows==0){
        echo "<h4 class='text-center text-danger'>no something here</h4>";
      }
      while($row_data=mysqli_fetch_assoc($result_products)){
        $products_id = $row_data['product_id'];
        $products_img = $row_data['product_image1'];
        $products_titl = $row_data['product_title'];
        $products_disc = $row_data['product_description'];
        $products_disc = $row_data['product_description'];
        $products_price = $row_data['product_price'];
        $cat_id = $row_data['cat_id'];
        $brand_id = $row_data['brand_id'];
 echo "<div class='col-md-4 mb-2'><div class='card'>
<img src='./admin-area/product-images/$products_img' class='card-img-top' alt='$products_titl'>
<div class='card-body'>
<h5 class='card-title'>$products_titl</h5>
<p class='card-text'>$products_disc</p>
<p class='card-text'>price = $products_price</p>
<a href='index.php?add_to_cart=$products_id' class='btn btn-success'>Add To Cart</a>
<a href='product_details.php?product_id=$products_id' class='btn btn-secondary'>More Info</a>
</div>
</div>
</div>";
}
}
}



function getbrand(){
    global $con;
    $select_brands="Select * from `brands`";
            $result_brands=mysqli_query($con,$select_brands);
            while($row_data=mysqli_fetch_assoc($result_brands)){
              $brand_title= $row_data['brand_title'];
              $brand_id=$row_data['brand_id'];
              echo "<li class='nav-item '>
              <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
          </li>";
            }
}

function get_unique_brand(){
    global $con;
    if(isset($_GET['brand'])){
      $brand_id=$_GET['brand'];
      
    $select_products="select * from `product` where brand_id =$brand_id";
      $result_products=mysqli_query($con,$select_products);
      $num_of_rows=mysqli_num_rows($result_products);
      if($num_of_rows==0){
        echo "<h4 class='text-center text-danger'>no something here</h4>";
      }
      while($row_data=mysqli_fetch_assoc($result_products)){
        $products_id = $row_data['product_id'];
        $products_img = $row_data['product_image1'];
        $products_titl = $row_data['product_title'];
        $products_disc = $row_data['product_description'];
        $products_disc = $row_data['product_description'];
        $products_price = $row_data['product_price'];
        $cat_id = $row_data['cat_id'];
        $brand_id = $row_data['brand_id'];
 echo "<div class='col-md-4 mb-2'><div class='card'>
<img src='./admin-area/product-images/$products_img' class='card-img-top' alt='$products_titl'>
<div class='card-body'>
<h5 class='card-title'>$products_titl</h5>
<p class='card-text'>$products_disc</p>
<p class='card-text'>price = $products_price</p>
<a href='index.php?add_to_cart=$products_id' class='btn btn-success'>Add To Cart</a>
<a href='product_details.php?product_id=$products_id' class='btn btn-secondary'>More Info</a>
</div>
</div>
</div>";
}
}
}

function getcat(){
    global $con;
    $select_cat="Select * from `categories`";
            $result_cat=mysqli_query($con,$select_cat);
            while($row_data=mysqli_fetch_assoc($result_cat)){
              $cat_title= $row_data['cats_title'];
              $cat_id=$row_data['cat_id'];
              echo "<li class='nav-item '>
              <a href='index.php?cats=$cat_id' class='nav-link text-light'>$cat_title</a>
          </li>";
            }
            
}

function product_search(){
    global $con;
    if(isset($_GET['search_data_product'])){
      $search_data_value=$_GET['search_data'];
      $search_query="select * from `product` where product_keywords like '%$search_data_value%'";
      $result_products=mysqli_query($con,$search_query);
      $num_of_rows=mysqli_num_rows($result_products);
      if($num_of_rows==0){
        echo "<h4 class='text-center text-danger'>no result match</h4>";
      }
      
      while($row_data=mysqli_fetch_assoc($result_products)){
        $products_id = $row_data['product_id'];
        $products_img = $row_data['product_image1'];
        $products_titl = $row_data['product_title'];
        $products_disc = $row_data['product_description'];
        $products_disc = $row_data['product_description'];
        $products_price = $row_data['product_price'];
        $cat_id = $row_data['cat_id'];
        $brand_id = $row_data['brand_id'];
 echo "<div class='col-md-4 mb-2'><div class='card'>
<img src='./admin-area/product-images/$products_img' class='card-img-top' alt='$products_titl'>
<div class='card-body'>
  <h5 class='card-title'>$products_titl</h5>
  <p class='card-text'>$products_disc</p>
  <p class='card-text'>price = $products_price</p>
  <a href='index.php?add_to_cart=$products_id' class='btn btn-success'>Add To Cart</a>
  <a href='product_details.php?product_id=$products_id' class='btn btn-secondary'>More Info</a>
</div>
</div>
</div>"
    ;}
}
}

function veiw_more(){
  global $con;
  if(isset($_GET['product_id']))
  if(!isset($_GET['cats'])){
    if(!isset($_GET['brand'])){{
    $products_id=$_GET['product_id']; 
    $select_products="select * from `product` where product_id = $products_id";
    $result_products=mysqli_query($con,$select_products);
    while($row_data=mysqli_fetch_assoc($result_products)){
      $products_id = $row_data['product_id'];
      $products_img1 = $row_data['product_image1'];
      $products_img2 = $row_data['product_image2'];
      $products_titl = $row_data['product_title'];
      $products_disc = $row_data['product_description'];
      $products_price = $row_data['product_price'];
      $cat_id = $row_data['cat_id'];
      $brand_id = $row_data['brand_id'];
echo "<div class='col-md-4'>
        <div class='card'>
<img src='./admin-area/product-images/$products_img1' class='card-img-top' alt='$products_titl'>
<div class='card-body'>
  <h5 class='card-title'>$products_titl</h5>
  <p class='card-text'>$products_disc</p>
  <p class='card-text'>price = $products_price</p>
  <a href='index.php?add_to_cart=$products_id' class='btn btn-success'>Add To Cart</a>
  <a href='index.php' class='btn btn-secondary'name='more_info'>Go Home</a>
</div>
</div>
        </div>
        <div class='col-md-8'>
            <div class='row'>
                <div class='col-md-12'>
                    <h4 class='text-center text-success mp-5'>related products</h4>
                </div>
                <div class='col-md-6'>
                <img src='./admin-area/product-images/$products_img2' class='card-img-top' alt='$products_titl'>
                </div>
            </div>
        </div>"
  ;}
}
}
  }
}

function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  

function cart(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $get_ip = getIPAddress();
    $get_product_id=$_GET['add_to_cart']; 
    $select_products="select * from `cart_details` where ip_address = '$get_ip' and product_id ='$get_product_id' ";
    $result_products=mysqli_query($con,$select_products);
    $num_of_rows=mysqli_num_rows($result_products);
    if($num_of_rows>0){
      echo "<script>alert('this item is already in cart')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }else{
    $insert_query="INSERT INTO `cart_details` (product_id,ip_address,quantity) VALUES ('$get_product_id','$get_ip','0')";
    $result = mysqli_query($con,$insert_query);
    echo "<script>alert('this item is added to cart')</script>";
    echo "<script>window.open('index.php','_self')</script>";
    // if($result){
    //  echo "<script>alert('brand has been inserted success')</>";
    // }
    }
  }
}


function cart_item(){
  // if(isset($_GET['add_to_cart'])){
  //   global $con;
  //   $get_ip = getIPAddress();
  //   $select_products="select * from `cart_details` where ip_address = '$get_ip'";
  //   $result_products=mysqli_query($con,$select_products);
  //   $count_cart_items=mysqli_num_rows($result_products);
  //   }else{
      global $con;
      $get_ip = getIPAddress();
      $select_products="select * from `cart_details` where ip_address = '$get_ip'";
      $result_products=mysqli_query($con,$select_products);
      $count_cart_items=mysqli_num_rows($result_products);
      echo $count_cart_items;
  }

function total_sum(){
  global $con;
  $get_ip = getIPAddress();
  $total_price=0;
  $cart_query="select * from `cart_details` where ip_address = '$get_ip'";
  $carts_query=mysqli_query($con,$cart_query);
  while($row_data=mysqli_fetch_array($carts_query)){
    $product_id = $row_data['product_id'];
    $select_products = "select * from `product` where product_id = '$product_id'";
    $products_query=mysqli_query($con,$select_products);
    while($row_data_products=mysqli_fetch_array($products_query)){
      $prod_price = array($row_data_products['product_price']);
      $prod_value = array_sum($prod_price);
      $total_price+=$prod_value;
    }
  }echo $total_price; 

function get_user_order_details(){
  global $con;
  $username=$_SESSION['username'];
  $get_details="select * from user_table where username = '$username'";
  $result_query=mysqli_query($con,$get_details);
  while($row_query=mysqli_fetch_array($result_query)){
    $user_id=$row_query['id'];
    if(!isset($_GET['edit_account'])){
      if(!isset($_GET['my_orders'])){
        if(!isset($_GET['delete_account'])){
          $get_orders="select * from user_orders where user_id = '$user_id'
          and order_status='pending'";
          $result_orders_query=mysqli_query($con,$get_orders);
          $row_count=mysqli_num_rows($result_orders_query);
          if($row_count>0){
            echo"<h3 class='text-center text-success my-5'> you have <span class='text-danger'>$row_count</span> pending orders</h3>
           <p class='text-center'><a href='profile.php?my_orders' class='text-dark'
            >order details</a></p>";
          }else{
            echo"<h3 class='text-center text-success my-5'> you have 0 pending orders</h3>
           <p class='text-center'><a href='../index.php' class='text-dark'
            >explore products</a></p>";
          }
        }
      }
    }
  }
}
}


