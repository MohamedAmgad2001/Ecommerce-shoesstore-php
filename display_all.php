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
    <title>shoes website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="style.css">

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
        <li class="nav-item">
        <a class="nav-link" href="/">price=<?php total_sum()?></a>
        </li>
      </ul>
      <form class="d-flex" action="search_product.php"method="get">
        <input class="form-control me-2" type="search"name="search_data" placeholder="Search" aria-label="Search">
        <input type="submit"value="search"class="btn btn-outline-dark"
        name="search_data_product">  
      </form>
    </div>
  </div>
</nav>

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


<div class="row">
    <div class="col-md-10">

    <div class="row">
    <?php 
get_all_products();
get_unique_cat();
get_unique_brand();

      ?>
    </div>
    </div>
    <div class="col-md-2 bg-success p-0">
        <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-info">
                <a href="#" class="nav-link text-light"><h4>brands</h4></a>
            </li>
            <?php
            getbrand();
            ?>
        </ul>
        <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-info">
                <a href="#" class="nav-link text-light"><h4>categories</h4></a>
            </li>
            <?php
            getcat();
            ?>
            </li>
        </ul>
    </div>
    </div>
</div>

<?php 
include("./include/footer.php")
?>

</body>
</html>