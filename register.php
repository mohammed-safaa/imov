<?php
session_start();
session_regenerate_id();
if(isset($_SESSION['user'])){
    header('location:index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title> Register</title>
  <!-- Custom fonts for this template-->
  <link href="style/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
  <!-- Custom styles for this template-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link href="style/css/sb-admin-2.min.css" rel="stylesheet">
  <style>
.bg-register-image {
    background: url(style/img/space_planet_ship_art_star_73877_800x1280.jpg);
    background-position-x: 100%;
    background-position-y: 100%;
    background-size: auto;
    background-position: center;
    background-size: cover;
}
</style>
</head>
<body id="page-top">
  <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
                <?php
                include_once 'inc/dbconnected.php';
                if(isset($_POST["register"]))  {
                    if(empty($_POST["full_name"])) {  $erorr ='<div class="card mb-2 py-xl-1 border-bottom-danger">

                <div class="card-body">
                  عذراً !! يجب وضع الاسم الكامل او المستعار رجاءاً
                </div>
              </div>';  }
                    if(empty($_POST["username"])) {  $erorr ='<div class="card mb-2 py-xl-1 border-bottom-danger">

                <div class="card-body">
                  عذراً !! يجب وضع اسم المستخدم رجاءاً
                </div>
              </div>';  }
                    if(empty($_POST["email"])) {  $erorr ='<div class="card mb-2 py-xl-1 border-bottom-danger">

                <div class="card-body">
                  عذراً !! يجب وضع اﻷيميل رجاءاً
                </div>
              </div>';  }
                    if(empty($_POST["password"])) {  $erorr ='<div class="card mb-2 py-xl-1 border-bottom-danger">

                <div class="card-body">
                  عذراً !! يجب وضع كلمة المرور رجاءاً
                </div>
              </div>';  }
                    if(empty($_POST["password"] == $_POST["cpassword"])) {  $erorr ='<div class="card xl-2 py-xl-1 border-bottom-danger">

                <div class="card-body">
                  عذراً !! كلمة المرور غير متطابقتان
                </div>
              </div>';  }
                    else
                    {
                        $fullname = mysqli_real_escape_string($conn, $_POST["full_name"]);
                        $username = mysqli_real_escape_string($conn, $_POST["username"]);
                        $email = mysqli_real_escape_string($conn, $_POST["email"]);
                        $password = mysqli_real_escape_string($conn, $_POST["password"]);
                        $passwordhs = password_hash($password, PASSWORD_DEFAULT);
                        $query ="INSERT INTO `users` (`full_name`, `aboutuser`, `email`, `username`, `password`, `country`, `city`, `birthday`, `avatar`) VALUES ('$fullname', 'please enter about', '$email', '$username', '$passwordhs', 'please enter country', 'please enter city', '01-01-2019', 'no-images.jpeg');";
                        if(mysqli_query($conn, $query))
                        {

                            $success = '<div class="card xl-1 py-xl-1 border-bottom-success">
                <div class="card-body">
                 شكراً تم التسجيل بنجاح
                </div>
              </div>';

                         
                            header( "Refresh:2; url='login.php'");

                        }
                    }
                }

                ?>

              <form class="user" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" novalidate>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="text" class="form-control form-control-user" id="uname" name="full_name" placeholder="Full Name" minlength="4" maxlength="20" required >
                      <div class="valid-feedback">احسنت : رجاءاً يجب أن  لا يتجاوز 20 حرف وأن لايقل عن 4 حروف </div>
                      <div class="invalid-feedback"> عذراً : يجب وضع الاسم الكامل او المستعار رجاءاً ً و يجب أن  لا يتجاوز 20 حرف وأن لايقل عن 4 حروف </div>
                  </div>
                  <div class="col-sm-6">
                      <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="User Name" minlength="4" maxlength="20" required >
                      <div class="valid-feedback">احسنت : رجاءاً يجب أن  لا يتجاوز 20 حرف وأن لايقل عن 4 حروف </div>
                      <div class="invalid-feedback"> عذراً !! يجب وضع اسم المستخدم رجاءاًً ً و يجب أن  لا يتجاوز 20 حرف وأن لايقل عن 4 حروف   </div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" minlength="4" maxlength="30" required>
                    <div class="valid-feedback">احسنت : رجاءاً يجب أن  يكون الايميل صحيح</div>
                    <div class="invalid-feedback"> عذراً : يجب وضع اﻷيميل رجاءاًً و يجب أن  لا يتجاوز 20 حرف وأن لايقل عن 4 حروف </div>
                </div>

           <hr>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" minlength="4" maxlength="20" required>
                      <div class="valid-feedback"> احسنت : رجاءاً يجب أن  لا يتجاوز 20 حرف وأن لايقل عن 4 حروف </div>
                      <div class="invalid-feedback">  عذراً : يجب وضع كلمة المرور رجاءاً ً و يجب أن  لا يتجاوز 20 حرف وأن لايقل عن 4 حروف</div>
                  </div>
                  <div class="col-sm-6">
                      <input type="password" class="form-control form-control-user" id="cpassword" name="cpassword" placeholder="Repeat Password" minlength="4" maxlength="20" required >
                      <div class="valid-feedback">احسنت : رجاءاً يجب أن  لا يتجاوز 20 حرف وأن لايقل عن 4 حروف </div>
                      <div class="invalid-feedback">  عذراً : يجب اعادة كتابة كلمة المرور رجاءاً و يجب أن  لا يتجاوز 20 حرف وأن لايقل عن 4 حروف</div>
                      <p id="demo"></p>
                  </div>
                </div>

                <input type="hidden" name="location" value="">
                  <?php echo $erorr ; ?> <?php echo  $success ; ?>
                  <br>
                  <button type="submit" name="register"  class="btn btn-primary btn-user btn-block"  >Register Account</button>

              </form>
              <hr>

              <div class="text-center">
                <a  class="small" href="login.php">Already have an account ? Login!</a>
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>


  <script>
      // Disable form submissions if there are invalid fields
      (function() {
          'use strict';
          window.addEventListener('load', function() {
              // Get the forms we want to add validation styles to
              var forms = document.getElementsByClassName('user');
              // Loop over them and prevent submission
              var validation = Array.prototype.filter.call(forms, function(form) {
                  form.addEventListener('submit', function(event) {
                      if (form.checkValidity() === false) {
                          event.preventDefault();
                          event.stopPropagation();
                      }
                      form.classList.add('was-validated');
                  }, false);
              });
          }, false);
      })();
  </script>t>



  <!-- Bootstrap core JavaScript-->
  <script src="style/vendor/jquery/jquery.min.js"></script>
  <script src="style/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="style/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="style/js/sb-admin-2.min.js"></script>

</body>

</html>
