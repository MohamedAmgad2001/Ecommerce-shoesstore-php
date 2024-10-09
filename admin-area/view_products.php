
<h3 class="text-center text-success">All Products</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-success ">
        <tr>
            <th>product id</th>
            <th>product title</th>
            <th>product image</th>
            <th>product price</th>
            <th>total sold</th>
            <th>status</th>
            <th>edit</th>
            <th>delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
    $get_products="select * from product";
    $result=mysqli_query($con,$get_products);
    $num=0;
    while($row=mysqli_fetch_array($result)){
        $products_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        $products_status=$row['statuss'];
        $num++;?>
         <tr class='text-center'>
        <td><?php echo $num;?></td>
        <td><?php echo $product_title;?></td>
        <td><img src="./product-images/<?php echo $product_image1;?>"
        class="product_image"</td>
        <td ><?php echo $product_price;?></td>
        <td ><?php
        $get_count="select * from orders_pending where product_id=$products_id";
        $result_count=mysqli_query($con,$get_count);
        $rows_count=mysqli_num_rows($result_count);
        echo $rows_count;
        ?></td>
        <td><?php echo $products_status;?></td>
        <td><a href='index.php?edit_products=<?php
        echo $products_id; ?>' type="button" class="btn btn-success" >edit</a></td>
        <!-- <td ><a href='index.php?delete_product=<?php
        echo $products_id; ?>' type='button' class='btn btn-success' >delete</a></td>
        </tr> -->
        <td class="text-dark"><a href="index.php?delete_product=<?php
        echo $products_id; ?> " type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">delete</a></td>

<?php
    }
        
        ?>
    </tbody>
</table>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
         <h4>Are you sure you want to delete?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?view_brands" class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-danger"><a href="index.php?delete_product=<?php
        echo $products_id; ?>  " class="text-light text-decoration-none" >Yes</a></button>
      </div>
    </div>
  </div>
</div>
