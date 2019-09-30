<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Welcome Back! - Login</title>

  <!-- Custom fonts for this template-->
  <link href="style/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="style/css/sb-admin-2.min.css" rel="stylesheet">
<style>
.bg-login-image {
    background: url(style/img/nasa.jpg);
        background-position-x: 100%;
        background-position-y: 100%;
        background-size: auto;
    background-position: center;
    background-size: cover;
}

</style>
</head>

<body  id="page-top">
<?php
	session_start();

	//redirect to home if session has been set
	if(isset($_SESSION['user'])){
		header('location:index.php');
		exit();
	}
	
?>





  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>


                  <form class="user" action="process/process_login.php" method="post">
                    <div class="form-group">
                      <input type="text" name="username" class="form-control form-control-user"  aria-describedby="emailHelp" placeholder="Enter User Name">
                    </div>
                    <div class="form-group">
                      <input type="password"  name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <button  type="submit" name="login" class="btn btn-primary btn-user btn-block"> Login</button>
              
                    <hr>
                    <a href="register.php" class="btn btn-google btn-user btn-block">
                     register
                    </a>
                    
                  </form>
                  <hr>

                  <div class="text-center">
                    <a class="small" href="register.php">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>



</body>

</html>
