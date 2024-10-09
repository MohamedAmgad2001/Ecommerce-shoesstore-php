<?php
if(isset($_GET['edit_products'])){
    $edit_id=$_GET['edit_products'];
    $get_data="select * from product where product_id=$edit_id";
    $result=mysqli_query($con,$get_data);
    $row=mysqli_fetch_array($result);
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_keywords=$row['product_keywords'];
    $cat_id=$row['cat_id'];
    $brand_id=$row['brand_id'];
    $product_image1=$row['product_image1'];
    $product_image2=$row['product_image2'];
    $product_price=$row['product_price'];
    $datee=$row['datee'];
    $statuss=$row['statuss'];



    $select_category="select * from categories where cat_id =$cat_id";
    $result_cat=mysqli_query($con,$select_category);
    $row_cat=mysqli_fetch_array($result_cat);
    $cats_title=$row_cat['cats_title'];
    $cats_ids=$row_cat['cat_id'];


    $select_brands="select * from brands where brand_id=$brand_id";
    $result_brands=mysqli_query($con,$select_brands);
    $row_brands=mysqli_fetch_array($result_brands);
    $brand_title=$row_brands['brand_title'];

}

?>
<div class="container mt-5">
    <h1 class="text-center">edit products</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_title" class="form-label">product title</label>
            <input type="text" id="product_title" value="<?php echo $product_title ?> " name="product_title" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_desc" class="form-label">product description</label>
            <input type="text" id="product_desc" value="<?php echo $product_description ?> "name="product_desc" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_keywords" class="form-label">product keywords</label>
            <input type="text" id="product_keywords" value="<?php echo $product_keywords ?> "name="product_keywords" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_cat" id="product_cat" class="form-label">product categories</label>
            <select name="product_cat" class="form-select">
                <option value="<?php echo $cats_ids ?>"><?php echo $cats_title ?></option>
               <?php 
               $select_category_all="select * from categories";
               $result_cat_all=mysqli_query($con,$select_category_all);
               while($row_cat_all=mysqli_fetch_assoc($result_cat_all)){
                   $cats_title_all=$row_cat_all['cats_title'];
                   $cats_id=$row_cat_all['cats_id'];
                   echo "<option value='$cats_id'>$cats_title_all</option>";

               }?>
               </select>
        </div>
        <!-- <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id=""class="form-select">
                    <option value="">select a category</option>
                    <?php
                    // $select_categoryy="Select * from `categories`";
                    // $result_categoryy=mysqli_query($con,$select_categoryy);
                    // while($row_data=mysqli_fetch_assoc($result_categoryy)){
                    //     $cat_title= $row_data['cats_title'];
                    //     $cat_id=$row_data['cat_id'];
                    //    echo "<option value='$cat_id'>$cat_title</option>";
                    // }

                    ?>
                </select>
            </div> -->
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_brands" id="product_brands" class="form-label">product brands</label>
        <select name="product_brands" class="form-select">
        <option value="<?php echo $brand_title ?>"><?php echo $brand_title ?></option>
        <?php 
               $select_brands_all="select * from brands";
               $result_brands_all=mysqli_query($con,$select_brands_all);
               while($row_brands_all=mysqli_fetch_assoc($result_brands_all)){
                $brands_title_all=$row_brands_all['brand_title'];
                $brands_id=$row_brands_all['brand_id'];
                echo "<option value='brands_id'>$brands_title_all</option>";
               };?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image1" class="form-label">product image1</label>
            <div class="d-flex">
            <input type="file" id="product_image1"  name="product_image1" 
            class="form-control w-90 m-auto" required="required">
            <img src="./product-images/<?php echo $product_image1 ?>"  alt="" class="product_image">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image2" class="form-label">product image2</label>
            <div class="d-flex">
            <input type="file" id="product_image2"
             name="product_image2" 
            class="form-control w-90 m-auto" required="required">
            <img src="./product-images/<?php echo $product_image2 ?>"  alt="" class="product_image">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_price" class="form-label">product price</label>
            <input type="text" value="<?php echo $product_price ?> " id="product_price" name="product_price" class="form-control" required="required">
        </div>
        <div class=" w-50 m-auto">
            <input type="submit"  name="edit_product" value="update product" 
            class="btn btn-success px-3 mb-3">
        </div>
    </form>
</div>



<?php
if(isset($_POST['edit_product'])){
    $product_title=$_POST['product_title'];
    $product_desc=$_POST['product_desc'];
    $product_keywords=$_POST['product_keywords'];
    $product_cat=$_POST['product_cat'];
    $product_brands=$_POST['product_brands'];
    $product_price=$_POST['product_price'];
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $tmp_image1=$_FILES['product_image1']['tmp_name'];
    $tmp_image2=$_FILES['product_image2']['tmp_name'];



    if($product_title==''or $product_desc==''or $product_keywords==''
    or $product_desc=='' or $product_image1=='' or
    $product_image2=='' or $product_price==''){
        echo"<script>alert('please fill the field' </script>";
    }else{
        move_uploaded_file($tmp_image1,"./product-images/$product_image1");
        move_uploaded_file($tmp_image2,"./product-images/$product_image2");




        $update_product="update product set cat_id='$product_cat',product_title='$product_title',
        product_description='$product_desc', brand_id='$product_brands', product_keywords='$product_keywords',product_image1='$product_image1',product_image2='$product_image2',
        product_price='$product_price',datee=NOW()
        where product_id =$edit_id";
        $result_update=mysqli_query($con,$update_product);
        if($result_update){
            echo"<script>alert('product updated succesfully' </script>";
            echo"<script>window.open('insert_product.php','_self' </script>";
        }
    }
    
}


?>