<h3 class="text-center text-success">All Users</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">

    <?php
    $get_users="select * from user_table";
    $result=mysqli_query($con,$get_users);
    $row_count_users=mysqli_num_rows($result);
    if($row_count_users==0){
        echo"<h2 class='text-danger text-center mt-5'>No users yet</h2>";
    }else{
        echo "<tr>
        <th>seriel no.</th>
        <th>username</th>
        <th>user email</th>
        <th>user image</th>
        <th>user address</th>
        <th>user phone</th>
        <th>delete</th>
    </tr>
</thead>
<tbody class='text-center'>";
        $num=0;
        while($row_data=mysqli_fetch_assoc($result)){
            $user_id=$row_data['id'];
            $username=$row_data['username'];
            $user_email=$row_data['user_email'];
            $user_image=$row_data['user_image'];
            $user_address=$row_data['user_address'];
            $user_phone=$row_data['user_phone'];
            $num++;
            ?>
            <tr>
            <td><?php echo $num;?></td>
            <td><?php echo $username;?></td>
            <td><?php echo $user_email;?></td>
            <td> <img src="../usersarea/user_images/<?php echo $user_image; ?>" class="product_image" alt="<?php echo $user_image?>"></td>
            <td><?php echo $user_address;?></td>
            <td><?php echo $user_phone;?></td>
            <td class="text-dark"><a href="index.php?delete_user=<?php echo $user_id ;?> " type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">delete</a></td>       
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
        <button type="button" class="btn btn-danger"><a href="index.php?delete_user=<?php echo $user_id ;?> " class="text-light text-decoration-none" >Yes</a></button>
      </div>
    </div>
  </div>
</div>