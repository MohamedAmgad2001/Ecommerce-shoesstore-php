
    <h3 class="text-center text-danger mb-4">Deleting Account</h3>
    <form action="" method="post" class="mt-5">
        <div class="form-outline mb-4">
            <input type="submit" class='form-control w-50 m-auto' name="delete" value="delete_account">
        </div>
        <div class="form-outline mb-4">
            <input type="submit" class='form-control w-50 m-auto' name="dont_delete" value="don't delete account">
        </div>
    </form>
    <?php
    $usernmae_seesion=$_SESSION['username'];
    if(isset($_POST['delete'])){
        $delete_query="delete from user_table where username='$usernmae_seesion'";
        $result=mysqli_query($con,$delete_query);
        if($result){
            session_destroy();
            echo "<script>alert('the account is deleted')</script>";
            echo "<script>window.open('../index.php','_self')</script>";
        }
    }
    if(isset($_POST['dont_delete'])){
        echo "<script>window.open('profile.php','_self')</script>";
    }
