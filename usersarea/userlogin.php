<?php
include('../include/connect.php');
include('../functions/common_function.php');
session_name('user_session');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body{
            overflow-x:hidden;
        }
    </style>
</head>
<body>
<div class="container-fluid m-3">
    <h2 class="text-center">User Login</h2>
    <div class="row d-flex align-items-center justify-content-center mt-5">
        <div class="col-lg-12 col-xl-6 ">
            <form action="" method="post">
                <div class="form-outline mb-4">
                    <label for="user-username"class="form-label">username</label>
                    <input type="text" name="user_username" id="user_username"class="form-control"placeholder="enter your username"autocomplete="off"required="required">
                </div>
                <div class="form-outline mb-4">
                    <label for="user-password"class="form-label">password</label>
                    <input type="password" name="user-password" id="user-password"class="form-control"placeholder="enter your password"autocomplete="off"required="required">
                </div>
                <div class="mt-4 pt-2">
                    <input type="submit" value="Login"name="user-login" 
                    class="bg-success py-2 px-3 border-0 mb-0" name ="user_regitser">
                    <p class = "small fw-bold mt-2 pt-1">don't have an account ?<a href="userregestration.php" class = "text-danger"> signup </a> </p>
                </div>
            </form>

        </div>
    </div>
</div>
</body>
</html>


<?php
if(isset($_POST["user-login"])){
$user_username=$_POST["user_username"];
$users_password=$_POST["user-password"];
$select_query="select * from user_table where username = '$user_username'";
$result = mysqli_query($con,$select_query);
$row_count=mysqli_num_rows($result);
$row_data=mysqli_fetch_assoc($result);
$user_ip=getIPAddress();

$select_query_cart="select * from cart_details where ip_address = '$user_ip'";
$select_cart=mysqli_query($con,$select_query_cart);
$row_count_cart=mysqli_num_rows($select_cart);

if($row_count>0){
    if(password_verify($users_password,$row_data['user_password'])){
        if($row_count==1 and $row_count_cart==0){
            $_SESSION['username']=$user_username;
            echo "<script>alert('login success')</script>";
            echo "<script>window.open('profile.php','_self')</script>";
        }else{
            $_SESSION['username']=$user_username;
            echo "<script>alert('login success')</script>";
            echo "<script>window.open('payment.php','_self')</script>";
        }
    }else{
        echo "<script>alert('invalid credentials')</script>";
    }
}else{
    echo "<script>alert('invalid credentials')</script>";
}
}