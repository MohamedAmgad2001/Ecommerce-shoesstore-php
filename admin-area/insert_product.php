<?php
include('../include/connect.php');
if(isset($_POST['insert_product'])){
    $product_title = $_POST['product_title'];
    $product_description = $_POST['description'];
    $product_keywords = $_POST['keywords'];
    $product_category = $_POST['product_category'];
    $product_brands = $_POST['product_brands'];
    $products_image1 = $_FILES['products_image1']['name'];
    $products_image2 = $_FILES['products_image2']['name'];
    $temp_image1 = $_FILES['products_image1']['tmp_name'];
    $temp_image2 = $_FILES['products_image2']['tmp_name'];
    $products_price = $_POST['price'];
    $products_status = "TRUE";

    if($product_title=='' or $product_description=='' or $product_keywords=='' or $product_category=='' or $product_brands==''
     or $products_image1=='' or $products_image2=='' or $products_price==''){
        echo "<script>alert('you should fill the fields')</script>";
        exit();
     }else{
        move_uploaded_file($temp_image1,"product-images/$products_image1");
        move_uploaded_file($temp_image2,"product-images/$products_image2");
        $insert_products="INSERT INTO `product` (product_title,product_description,product_keywords,
        cat_id,brand_id,product_image1,product_image2,product_price,datee,statuss) 
        VALUES ('$product_title','$product_description','$product_keywords',
        '$product_category','$product_brands','$products_image1','$products_image2','$products_price',NOW(),'$products_status')";
        $result = mysqli_query($con,$insert_products);
        if($result){
            echo "<script>alert('products has been inserted success')</script>";
          }
     }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="container mt-3 ">
        <h1 class="text-center">insert products</h1>
        <form action=""method="post"enctype="multipart/form-data">
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title"class="form-label">product title</label>
                <input type="text"name="product_title"id="product_title"class="form-control"placeholder=" enter product title"autocomplete="off"required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description"class="form-label">product description</label>
                <input type="text"name="description"id="description"class="form-control"placeholder=" enter product description"autocomplete="off"required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="products_keywords"class="form-label">product keywords</label>
                <input type="text"name="keywords"id="products_keywords"class="form-control"placeholder=" enter product keywords"autocomplete="off"required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id=""class="form-select">
                    <option value="">select a category</option>
                    <?php
                    $select_categoryy="Select * from `categories`";
                    $result_categoryy=mysqli_query($con,$select_categoryy);
                    while($row_data=mysqli_fetch_assoc($result_categoryy)){
                        $cat_title= $row_data['cats_title'];
                        $cat_id=$row_data['cat_id'];
                       echo "<option value='$cat_id'>$cat_title</option>";
                    }

                    ?>
                </select>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brands" id=""class="form-select">
                    <option value="">select a brand</option>
                    <?php
                    $select_brand="Select * from `brands`";
                    $result_brand=mysqli_query($con,$select_brand);
                    while($row_data=mysqli_fetch_assoc($result_brand)){
                        $brand_title= $row_data['brand_title'];
                        $brand_id=$row_data['brand_id'];
                       echo "<option value='$brand_id'>$brand_title</option>";
                    }

                    ?>
                </select>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="products_image1"class="form-label">product image1</label>
                <input type="file"name="products_image1"id="products_image1"class="form-control"required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="products_image2"class="form-label">product image2</label>
                <input type="file"name="products_image2"id="products_image2"class="form-control"required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="products_price"class="form-label">product price</label>
                <input type="text"name="price"id="products_price"class="form-control"placeholder=" enter product price"autocomplete="off"required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product"class="btn btn-success mb-3 px-3" value="insert product">
            </div>
        </form>
    </div>
</body>
</html>
