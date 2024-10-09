<?php
include('../include/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
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
<h2 class="text-center mb-5">Admin Registration</h2>
<div class="row d-flex justify-content-center ">
    <div class="col-lg-6 col-xl-5 ">
        <img src="../images/member-log-membership-username-password-concept_53876-124420.jpg" alt="admin registration" 
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
                <label for="useremail" class="form-label">Email</label>
                <input type="email" name="useremail" id="useremail"
                placeholder="enter your email" required="required" class="form-control">
            </div>
            <div class="form-outline mb-4">
                <label for="userpassword" class="form-label">Password</label>
                <input type="password" name="userpassword" id="userpassword"
                placeholder="enter your password" required="required" class="form-control">
            </div>
            <div class="form-outline mb-4">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm_password"
                placeholder="confirm your password" required="required" class="form-control">
            </div>
            <div>
                <input type="submit" class="bg-success py-2 px-3 border-0" 
                name="admin_registration" value="Register">
                <p class="small fw-bold mt-2 pt-1">Already have an account ? <a href="admin_login.php" class="text-danger text-decoration-none">Login</a></p>
            </div>
        </form>
    </div>
</div>
    </div>
</body>
</html>



<?php
if(isset($_POST["admin_registration"])){
  $username=$_POST["username"];
  $email=$_POST["useremail"];
  $password=$_POST["userpassword"];
  $conf_password=$_POST["confirm_password"];

  $select_query="select * from admin_table where admin_name='$username' or 
  admin_email='$email'";
  $results=mysqli_query($con, $select_query);
  $rows_count=mysqli_num_rows($results);
    
    if ($password !== $conf_password) {
        echo "<script>alert('Passwords do not match!');</script>";
    }elseif($rows_count>0){
        echo "<script>alert('user already exist');</script>";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $insert_user = "INSERT INTO admin_table (admin_name, admin_email,admin_password) 
        VALUES ('$username', '$email', '$hashed_password')";

        $result = mysqli_query($con, $insert_user);

        if ($result) {
        echo "<script>alert('admin inserted succesfully')</script>";
        echo "<script>window.open('admin_login.php','_self')</script>";
    } else {
        echo "<script>alert('user can not inserted')</script>";
    }
  }
}