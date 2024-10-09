<?php
if(isset($_GET['edit_account'])){
    $user_ssession_name=$_SESSION['username'];
    $select_query="select * from user_table where username = '$user_ssession_name'";
    $result_query=mysqli_query($con,$select_query);
    $row_fetch=mysqli_fetch_assoc($result_query);
    $user_id=$row_fetch['id'];
    $user_username=$row_fetch['username'];
    $user_email=$row_fetch['user_email'];
    $user_mobile=$row_fetch['user_phone'];
    $user_address=$row_fetch['user_address'];

    if(isset($_POST['user-update'])){
        $update_id=$user_id;
        $user_username=$_POST['user-username'];
        $user_email=$_POST['user-email'];
        $user_mobile=$_POST['user-mobile'];
        $user_address=$_POST['user-address'];
        $user_image1=$_FILES['user-image']['name'];
        $user_image_tmp=$_FILES['user-image']['tmp_name'];
        move_uploaded_file($user_image_tmp,"./user_images/$user_image1");


        $update_data="update `user_table` set username='$user_username',
        user_email='$user_email',user_phone='$user_mobile',user_address='$user_address',
        user_image='$user_image1'where id=$update_id";
        $update_query=mysqli_query($con,$update_data);
        if($update_query){
            echo "<script>alert('data updated successfully')</script>";
            echo "<script>window.open('logout.php','_self')</script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>

</head>
<body>
<h3 class="text-center text-success mb-4">Edit Account</h3>
<form action="" method="post" enctype="multipart/form-data" class="text-center">
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_username  ?>" name="user-username">
    </div>
    <div class="form-outline mb-4">
        <input type="email" class="form-control w-50 m-auto" value="<?php echo $user_email  ?>" name="user-email">
    </div>
    <div class="form-outline mb-4 d-flex w-50 m-auto">
        <input type="file" class="form-control m-auto" name="user-image">
        <img src="./user_images/<?php echo $get_user_image?>" class="edit_image" alt="">
    </div>
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto"  value="<?php echo $user_address  ?>" name="user-address">
    </div>
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto"  value="<?php echo $user_mobile ?>" name="user-mobile">
    </div>
    <input type="submit" value="update" class="bg-success py-2 px-3 border-0" name="user-update">

</form>
</body>
</html>