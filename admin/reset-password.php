<?php
  require_once("functions/function.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="login-page bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                  <h3 class="mb-3">Reset Password</h3>
                    <div class="bg-white shadow rounded">
                        <div class="row">
                            <div class="col-md-7 pe-0">
                                <div class="form-left h-100 py-5 px-5">
                                    <?php
                                      $slug=$_GET['rp'];
                                      $sel="SELECT * FROM users NATURAL JOIN roles WHERE  user_slug='$slug'";
                                      $Q=mysqli_query($con,$sel);
                                      $data=mysqli_fetch_assoc($Q);
                                      $id=$data['user_id'];
                                     
                                      if($_POST){
                                       $pw=md5($_POST['pass']);
                                       $rpw=md5($_POST['repass']);
                                     
                                       $update="UPDATE users SET user_password='$pw' WHERE user_id='$id'";
                                     
                                         if(!empty($pw)){
                                           if(!empty($rpw)){
                                             if($pw===$rpw){
                                               if(mysqli_query($con,$update)){
                                                 header('Location: logout.php');
                                               }else{
                                                 echo "Opps! Password generate failed";
                                               }
                                             }else{
                                               echo "Password and Confirm password didn't match.";
                                             }
                                           }else{
                                             echo "Please enter confirm password";
                                           }
                                         }else{
                                           echo "Please enter password";
                                         }
                                      } 
                                    ?>
                                    <form action="" method="post" class="row g-4">
                                        <div class="col-12">
                                            <label>Password<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="fas fa-lock"></i></div>
                                                <input type="password" name="pass" class="form-control" placeholder="Enter Password">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label>Confirm Password<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="fas fa-lock"></i></div>
                                                <input type="password" name="repass" class="form-control" placeholder="Enter Confirm Password">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <a href="forgot-password.php" class="float-end text-primary">Back</a>
                                        </div>

                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary px-4 float-end mt-4">CHANGE</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-5 ps-0 d-none d-md-block">
                                <div class="form-right h-100 bg-primary text-white text-center pt-5">
                                    <i class="fas fa-user-shield"></i>
                                    <h2 class="fs-1">Welcome Back!!!</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>