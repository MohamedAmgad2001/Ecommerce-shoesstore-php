<?php
include('../include/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid m-3">
    <h2 class="text-center">new user registration</h2>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6 ">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-outline mb-4">
                    <label for="user_username"class="form-label">username</label>
                    <input type="text" name="user_username" id="user_username"class="form-control"placeholder="enter your username"autocomplete="off"required="required">
                </div>
                <div class="form-outline mb-4">
                    <label for="user_email"class="form-label">email</label>
                    <input type="email" name="user_email" id="user_email"class="form-control"placeholder="enter your email"autocomplete="off"required="required">
                </div>
                <div class="form-outline mb-4">
                    <label for="user_image"class="form-label">image</label>
                    <input type="file" name="user_image" id="user_image"class="form-control"required="required">
                </div>
                <div class="form-outline mb-4">
                    <label for="user_password"class="form-label">password</label>
                    <input type="password" name="user_password" id="user_password"class="form-control"placeholder="enter your password"autocomplete="off"required="required">
                </div>
                <div class="form-outline mb-4">
                    <label for="user_confirm_password"class="form-label">confirm password</label>
                    <input type="password" name="user_confirm_password" id="user_confirm_password"class="form-control"placeholder="confirm password"autocomplete="off"required="required">
                </div>
                <div class="form-outline mb-4">
                    <label for="user_address"class="form-label">address</label>
                    <input type="text" name="user_address" id="user_address"class="form-control"placeholder="enter your address"autocomplete="off"required="required">
                </div>
                <div class="form-outline mb-4">
                    <label for="user_contact"class="form-label">contact</label>
                    <input type="text" name="user_contact" id="user_contact"class="form-control"placeholder="enter your contact"autocomplete="off"required="required">
                </div>
                <div class="mt-4 pt-2">
                    <input type="submit" value="register" class="bg-success py-2 px-3 border-0 mb-0" name="user_register">
                    <p class = "small fw-bold mt-2 pt-1">Already have an account ?<a href="userlogin.php" class = "text-danger"> Login </a> </p>
                </div>
            </form>

        </div>
    </div>
</div>
</body>
</html>

<?php
if(isset($_POST["user_register"])){
  $username=$_POST["user_username"];
  $email=$_POST["user_email"];
  $user_image=$_FILES["user_image"]["name"];
  $user_temp_image=$_FILES["user_image"]["tmp_name"];
  $password=$_POST["user_password"];
  $user_conf_password=$_POST["user_confirm_password"];
  $address=$_POST["user_address"];
  $contact=$_POST["user_contact"];
  $user_ip=getIPAddress();


  $select_query="select * from user_table where username='$username' or 
  user_email='$email'";
  $results=mysqli_query($con, $select_query);
  $rows_count=mysqli_num_rows($results);
    
    if ($password !== $user_conf_password) {
        echo "<script>alert('Passwords do not match!');</script>";
    }elseif($rows_count>0){
        echo "<script>alert('user already exist');</script>";
    } else {
        move_uploaded_file($user_temp_image,"user_images/$user_image");
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $insert_user = "INSERT INTO user_table (username, user_email,user_password, user_image,	user_address,user_phone,user_ip) 
        VALUES ('$username', '$email', '$hashed_password', '$user_image', '$address', '$contact','$user_ip')";

        $result = mysqli_query($con, $insert_user);

        if ($result) {
        echo "<script>alert('user inserted succesfully')</script>";
        echo "<script>window.open('userlogin.php','_self')</script>";
    } else {
        echo "<script>alert('user can not inserted')</script>";
    }
    
    }
    $select_carts_items="select * from `cart_details` 
    where ip_address = '$user_ip'";
    $result_cart=mysqli_query($con,$select_carts_items);
    $rows_counts=mysqli_num_rows($result_cart);
    if($rows_counts>0){
      $_SESSION['username']=$username;
      echo "<script>alert('you have item in your cart')</script>";
            echo "<script>window.open('checkout.php','_self')</script>";
      
      
    }else{
      echo "<script>window.open('../index.php','_self')</script>";
    }
    }


?>