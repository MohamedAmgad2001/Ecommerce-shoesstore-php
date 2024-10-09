<h3 class="text-center text-success">All categories</h3>
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
        $select_cat="select * from categories";
        $result=mysqli_query($con,$select_cat);
        $number=0;
       while($rows_cat=mysqli_fetch_array($result)){
        $get_cat_id=$rows_cat['cat_id'];
        $get_cat_title=$rows_cat['cats_title'];
        $number++;
       
        ?>
        <tr class="text-center text-dark">
            <td><?php echo $number; ?></td>
            <td><?php echo $get_cat_title; ?></td>
            <td  class="text-dark"><a href="index.php?edit_category=<?php echo $get_cat_id; ?>" type="button" class="btn btn-success" >edit</a></td>
            <td class="text-dark"><a href="index.php?delete_category=<?php echo $get_cat_id; ?> " type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">delete</a></td>
        </tr>
        <?php }?>
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
        <button type="button" class="btn btn-danger"><a href="index.php?delete_category=<?php echo $get_cat_id; ?> " class="text-light text-decoration-none" >Yes</a></button>
      </div>
    </div>
  </div>
</div>
