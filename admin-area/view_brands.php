<h3 class="text-center text-success">All brands</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-success">
        <tr class="text-center">
            <th>Serial no.</th>
            <th>Category title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $select_brand="select * from brands";
        $result=mysqli_query($con,$select_brand);
        $number=0;
       while($rows_brand=mysqli_fetch_array($result)){
        $get_brand_id=$rows_brand['brand_id'];
        $get_brand_title=$rows_brand['brand_title'];
        $number++;
       
        ?>
        <tr class="text-center text-dark">
            <td><?php echo $number; ?></td>
            <td><?php echo $get_brand_title; ?></td>
            <td class="text-dark"><a href="index.php?edit_brands=<?php echo $get_brand_id; ?> " type="button" class="btn btn-success" >edit</a></td>
            <td class="text-dark"><a href="index.php?delete_brands=<?php echo $get_brand_id; ?> " type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">delete</a></td>
        </tr>
        <?php }?>
    </tbody>
</table>


<!-- Button trigger modal
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
         <h4>Are you sure you want to delete?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?view_brands" class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-danger"><a href="index.php?delete_brands=<?php echo $get_brand_id; ?> " class="text-light text-decoration-none" >Yes</a></button>
      </div>
    </div>
  </div>
</div>