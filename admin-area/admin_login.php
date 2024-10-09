<?php
include('../include/connect.php');
include('../functions/common_function.php');
session_name('admin_session');
@session_start();
//if this page is active then the session will be active
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
            overflow:hidden;
        }
    </style>
</head>
<body>
    <div class="container-fluid m-3">
<h2 class="text-center mb-5">Admin Login</h2>
<div class="row d-flex justify-content-center ">
    <div class="col-lg-6 col-xl-5 ">
        <img src="../images/sign-concept-illustration_114360-28907.jpg" alt="admin registration" 
        class="img-fluid">
    </div>
    <div class="col-lg-6 col-xl-4">
        <form action="" method="post">
            <div class="form-outline mb-4">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username"
                placeholder="enter your username" required="required" class="form-control">
            </div>
            <div class="form-outline mb-4">
                <label for="userpassword" class="form-label">Password</label>
                <input type="password" name="adminpassword" id="userpassword"
                placeholder="enter your password" required="required" class="form-control">
            </div>
            <div>
                <input type="submit" class="bg-success py-2 px-3 border-0" 
                name="admin_login" value="Login">
                <p class="small fw-bold mt-2 pt-1">dont't have an account ? <a href="admin_registration.php" class="text-danger text-decoration-none">Register</a></p>
            </div>
        </form>
    </div>
</div>
    </div>
</body>
</html>

<?php
if(isset($_POST["admin_login"])){
$admin_username=$_POST["username"];
$admin_password=$_POST["adminpassword"];
$select_query="select * from admin_table where admin_name= '$admin_username'";
$result = mysqli_query($con,$select_query);
$row_count=mysqli_num_rows($result);
$row_data=mysqli_fetch_assoc($result);



if($row_count>0){
    if(password_verify($admin_password,$row_data['admin_password'])){
            $_SESSION['usrname']=$admin_username;
            echo "<script>alert('login success')</script>";
            echo "<script>window.open('index.php','_self')</script>";
}else{
    echo "<script>alert('invalid credentials')</script>";
}
}
}