<h3 class="text-center text-success">All Orders</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">

    <?php
    $get_orders="select * from user_orders";
    $result=mysqli_query($con,$get_orders);
    $row_count=mysqli_num_rows($result);
    if($row_count==0){
        echo"<h2 class='text-danger text-center mt-5'>No orders yet</h2>";
    }else{
        echo "<tr>
        <th>seriel no.</th>
        <th>due amount</th>
        <th>invoice num</th>
        <th>total products</th>
        <th>order date</th>
        <th>status</th>
        <th>delete</th>
    </tr>
</thead>
<tbody class='text-center'>";
        $num=0;
        while($row_data=mysqli_fetch_assoc($result)){
            $order_id=$row_data['order_id'];
            $user_id=$row_data['user_id'];
            $amount_due=$row_data['amount_due'];
            $invoice_num=$row_data['invoice_num'];
            $total_products=$row_data['total_products'];
            $order_date=$row_data['order_date'];
            $order_status=$row_data['order_status'];
            $num++;
            ?>
            <tr>
            <td><?php echo $num;?></td>
            <td><?php echo $amount_due;?></td>
            <td><?php echo $invoice_num;?></td>
            <td><?php echo $total_products;?></td>
            <td><?php echo $order_date;?></td>
            <td><?php echo $order_status;?></td>
            
            <!-- <td><a href="index.php?delete_order=<?php echo $order_id ;?>"  type='button' class='btn btn-success'>delete</a></td>  -->
            <td class="text-dark"><a href="index.php?delete_order=<?php echo $order_id ;?>" type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">delete</a></td>
       
        </tr>
        <?php
        }
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
        <button type="button" class="btn btn-danger"><a href="index.php?delete_order=<?php echo $order_id ;?>" class="text-light text-decoration-none" >Yes</a></button>
      </div>
    </div>
  </div>
</div>