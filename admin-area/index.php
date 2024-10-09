<?php
include('../include/connect.php');
include('../functions/common_function.php');
session_name('admin_session');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- <link rel="stylesheet" href=
"https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />

    Bootstrap Font Icon CSS -->
    <!-- <link rel="stylesheet" href=
"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" /> -->


  <style>.adminimage {
  width: 100px;
  object-fit: contain;
}
body{
    overflow-x:hidden;

}
.product_image{
    width:100px;
    object-fit:contain;

}

</style>  

</head>
<body>
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-success">
        <div class="container-fluid">
            <img src="../images/1.png" alt="" class="logo">
            <nav class="navbar navbar-expand-lg">
                <ul class="navbar-nav ">
                <?php
                     if(!isset($_SESSION['usrname'])){
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='#'>welcome</a>
                              </li>";
                     }else{
                       echo "<li class='nav-item'>
                               <a class='nav-link' href='#'><h5>welcome ".$_SESSION['usrname']."</h5></a>
                            </li>";
                     }?>
                </ul>
            </nav>
        </div>
    </nav>
    <div class="bg-light">
        <h3 class="text-center p-2">manage</h3>
    </div>
    <div class="row">
        <div class="com-md-12 bg-secondary p-1 d-flex align-items-center">
            <div class="p-3">
                <a href="#"><img src="../images/2.jpg" alt=""class="adminimage"></a>
                <p class="text-light text-center">admin page</p>
            </div>
            <div class="button text-center ">
            <!-- <button><a href="insert_product.php" class="nav-link text-light bg-success my-1">insert products</a></button>
            <button><a href="index.php?view_products" class="nav-link text-light bg-success my-1">veiw products</a></button>
            <button><a href="index.php?insert_category" class="nav-link text-light bg-success my-1">insert categories </a></button>
            <button><a href="index.php?view_categories" class="nav-link text-light bg-success my-1">veiw categouries</a></button>
            <button><a href="index.php?insert_brands" class="nav-link text-light bg-success my-1">insert brands</a></button>
            <button><a href="index.php?view_brands" class="nav-link text-light bg-success my-1">veiw brands</a></button>
            <button><a href="index.php?list_orders" class="nav-link text-light bg-success my-1">all orders</a></button>
            <button><a href="index.php?list_payment" class="nav-link text-light bg-success my-1">all payments</a></button>
            <button><a href="index.php?list_users" class="nav-link text-light bg-success my-1">list users</a></button> -->
            <?php if(!isset($_SESSION['usrname'])){
                 echo "<button ><a href='admin_login.php' class='nav-link text-light bg-success my-1'>login</a></button>";
                  }else{
                   echo "<button><a href='insert_product.php' class='nav-link text-light bg-success my-1'>insert products</a></button>
                   <button><a href='index.php?view_products' class='nav-link text-light bg-success my-1'>veiw products</a></button>
                   <button><a href='index.php?insert_category' class='nav-link text-light bg-success my-1'>insert categories </a></button>
                   <button><a href='index.php?view_categories' class='nav-link text-light bg-success my-1'>veiw categouries</a></button>
                   <button><a href='index.php?insert_brands' class='nav-link text-light bg-success my-1'>insert brands</a></button>
                   <button><a href='index.php?view_brands' class='nav-link text-light bg-success my-1'>veiw brands</a></button>
                   <button><a href='index.php?list_orders' class='nav-link text-light bg-success my-1'>all orders</a></button>
                   <button><a href='index.php?list_payment' class='nav-link text-light bg-success my-1'>all payments</a></button>
                   <button><a href='index.php?list_users' class='nav-link text-light bg-success my-1'>list users</a></button>
                   <button><a href='logout_admin.php' class='nav-link text-light bg-success my-1'>logout</a></button>";
                  }?>
            <!-- <button><a href="logout_admin.php" class="nav-link text-light bg-success my-1">logout</a></button></div> -->
        </div>
</div>

<div class="container my-3">
    <?php 
    if(isset($_GET['insert_category'])){
        include('insert-categories.php');
    }
    if(isset($_GET['insert_brands'])){
        include('insert_brands.php');
    }
    if(isset($_GET['view_products'])){
        include('view_products.php');
    }
    if(isset($_GET['edit_products'])){
        include('edit_products.php');
    }
    if(isset($_GET['delete_product'])){
        include('delete_product.php');
    }
    if(isset($_GET['view_categories'])){
        include('view_categories.php');
    }
    if(isset($_GET['view_brands'])){
        include('view_brands.php');
    }
    if(isset($_GET['edit_category'])){
        include('edit_category.php');
    } 
    if(isset($_GET['edit_brands'])){
        include('edit_brands.php');
    }
    if(isset($_GET['delete_category'])){
        include('delete_category.php');
    }
    if(isset($_GET['delete_brands'])){
        include('delete_brands.php');
    }
    if(isset($_GET['list_orders'])){
        include('list_orders.php');
    }
    if(isset($_GET['delete_order'])){
        include('delete_order.php');
    }
    if(isset($_GET['list_payment'])){
        include('list_payment.php');
    }
    if(isset($_GET['delete_payment'])){
        include('delete_payment.php');
    }
    if(isset($_GET['list_users'])){
        include('list_users.php');
    }
    // if(isset($_GET['admin_login'])){
    //     include('admin_login.php');
    // }
    // if(isset($_GET['logout_admin'])){
    //     include('logout_admin.php');
    // }
    ?>
    
</div>
<div>
<?php 
include("../include/footer.php");
?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>