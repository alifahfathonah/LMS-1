
<?php include "../db.php";
include "layout/header.php";
$error='d-none';
error_reporting(0);
if(isset($_POST['submit']))
  {
    $email =  $_POST['email'];
    $password = $_POST['password'];
    $v_data = "SELECT * FROM student WHERE email = '$email'  and Password = '$password'";
    $result = mysqli_query($conn,$v_data);
    $final = mysqli_fetch_assoc($result);
    $name=$final['name'];
     $email=$final['email'];
        if(mysqli_num_rows($result)>0)
        {session_start();
            $_SESSION['email']=$email;
            $_SESSION['name']=$name;
          echo "<script> alert('Congratulations $name! you are successfully login.');window.location.href='dashboard.php' </script>";
           
        }
    else{ $error="d-block";
       $msg="Email and Password not matched. Try Again";
    }
}
?>
?>
<body class="bg-gradient-primary">
    <div class="bg-color">
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">
            <h1 class='text-light text-center mt-5'>LMS- Student Login</h1> 
                <div class="card o-hidden border-0 shadow-lg my-3">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image">
                                <img src="../img/login.jpg" width="550" class='mt-5 pt-5'alt="" srcset="">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-3">Welcome Back!</h1>
                                        <h5 class='mb-3'>Login to your Account</h5>
                                    </div>
                                     <!--Display error message -->
            <h6 class=" text-danger p-3   <?php echo $error ?> " style="background-color:rgba(255,0,0,0.1)">*  <?php echo $msg ?> *
                </h6>
                                    <form class="user" action="" method="POST">
                                        <div class="form-group">
                                            <input type="email"   class="form-control form-control-user"  id="exampleInputEmail" aria-describedby="emailHelp"
                                             name="email"  placeholder="Enter Your Email" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password"
                                                id="exampleInputPassword" placeholder="Password"  pattern=".{8,}" required  title="Passwod must contain 8 characters">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <input type="submit" name="submit" value="Login" href="index.html" class="btn btn-primary btn-user btn-block">
                                      </form>
                                        <hr>
                                        <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a> -->
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>