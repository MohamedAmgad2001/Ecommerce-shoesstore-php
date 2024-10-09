<h3 class="text-center text-success">All Payments</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">

    <?php
    $get_payments="select * from user_payments";
    $result=mysqli_query($con,$get_payments);
    $row_count_payments=mysqli_num_rows($result);
    if($row_count_payments==0){
        echo"<h2 class='text-danger text-center mt-5'>No payments yet</h2>";
    }else{
        echo "<tr>
        <th>seriel no.</th>
        <th>invoice num</th>
        <th>amount</th>
        <th>payment mode</th>
        <th>payment date</th>
        <th>delete</th>
    </tr>
</thead>
<tbody class='text-center'>";
        $num=0;
        while($row_data=mysqli_fetch_assoc($result)){
            $order_id=$row_data['order_id'];
            $payment_id=$row_data['payment_id'];
            $amount=$row_data['amount'];
            $invoice_num=$row_data['invoice_num'];
            $payment_mode=$row_data['payment_mode'];
            $payment_date=$row_data['date'];
            $num++;
            ?>
            <tr>
            <td><?php echo $num;?></td>
            <td><?php echo $invoice_num;?></td>
            <td><?php echo $amount;?></td>
            <td><?php echo $payment_mode;?></td>
            <td><?php echo $payment_date;?></td>
            <!-- <td><a href="index.php?delete_payment=<?php echo $payment_id ;?>"  type='button' class='btn btn-success'>delete</a></td>  -->
            <td class="text-dark"><a href="index.php?delete_payment=<?php echo $payment_id ;?>" type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">delete</a></td>
       
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
        <button type="button" class="btn btn-danger"><a href="index.php?delete_payment=<?php echo $payment_id ;?>" class="text-light text-decoration-none" >Yes</a></button>
      </div>
    </div>
  </div>
</div>