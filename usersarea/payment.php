<?php
include('../include/connect.php');
include('../functions/common_function.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
.payment_image{
    width:90%;
    margin:auto;
    display:block;
}
</style>
</head>
<body>


<?php
$user_ip=getIPAddress();
$get_user="select * from user_table where user_ip = '$user_ip'";
$results=mysqli_query($con,$get_user);
$run_query=mysqli_fetch_array($results);
$user_id=$run_query['id']

?>
    <div class="container">
        <h2 class="text-center text-success">payment option</h2>
        <div class="row d-flex justify-content-center align-items-center my-5">
            <div class="col-md-6">
            <a href="https://www.qnb.com" target="_blank"><img src="../images/unnamed.png" alt="" class="payment_image"></a>
            </div>
            <div class="col-md-6">
            <a href="order.php?user_id=<?php echo"$user_id" ?>" ><h2 class="text-center">pay offline</h2></a>
            </div>
        </div>
    </div>
</body>
</html>