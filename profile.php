<?php
include './inc/function_session.php';
include_once 'inc/header.php';
echo '<body id="page-top">';
include_once 'inc/dbconnected.php';
include_once 'inc/navbar.php';
?>
<style>
div.scroll {
    background-color: #f6f6f6;
    height: 570px;
    width: 100%;
    overflow-y: auto;
    padding: 40px;
}


</style>

<div class="container">
    <div class="row">
   
    <?php
        $sql = "SELECT * FROM users WHERE id = '".$_SESSION['user']."'";
        $query = $conn->query($sql);
        $row2 = $query->fetch_assoc();
    ?>




 <!-- start col-12 -->
      <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">

      <figure class="movie">
  <div class="movie__hero">
  <div class="profile__avatar">
  <img  src="upload/avatar/<?php echo $row2['avatar']; ?>" alt="Movie poster" class="movie__img">

          <?php

          if(isset($_POST['update'])){

          $name =  strip_tags($_FILES['avatar']['name']);
          $type =  strip_tags($_FILES['avatar']['type']);
          $tmp  =  strip_tags($_FILES['avatar']['tmp_name']);
          $size =  strip_tags($_FILES['avatar']['size']);

          $allowed = array("jpg","jpeg","png","gif"); 

          $explode  = explode('.',$name) ;
          $filetype = strtolower(end($explode));

          if(!in_array($filetype,$allowed)){
          $error = "This file is not supported";

          }

          $neName  = rand( 0, 1000000 );
            move_uploaded_file($tmp ,'upload/avatar/' . $neName );
            
            $sql ="UPDATE `users` SET `avatar` = '$neName' WHERE `users`.`id` = '".$_SESSION['user']."'";
          $conn->query($sql);
          echo '<script>window.location.assign("profile.php")</script>';
          }
          // 
            ?>

              
 
              <div>

              </div>


              </form>
  
            </div>
            
  </div>

  <div class="movie__content">
        <!-- User profile -->
        <div class="panel panel-default">
          <div class="panel-heading">
          <h4 class="panel-title"><?php echo $row2['full_name']; ?></h4>


          </div>
          <div class="panel-body">

            <div class="profile__header">
              <h4><?php echo $row2['email']; ?> <small></small></h4>
              <p class="text-muted"><?php echo $row2['about']; ?></p>
              <p>

              <div class="flex-container">
              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Change Photo</button>
              <!-- Modal -->
              <div class="modal fade" id="myModal" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                   
                    <h4 class="modal-title">Change Photo</h4>
                  </div>
                  <div class="modal-body">

                   <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data">
                   <input type="file" name="avatar">
               
                   <?php echo $success ;?>
                  </div>
                  <div class="modal-footer">
                  <button type="submit" name="update" class="btn btn-primary">Change</button>
                   </form>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
                
              </div>
              </div>


              <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal2">Edit Profile</button>
              <!-- Modal -->
              <div class="modal fade" id="myModal2" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                  <?php
                    
                    if(isset($_POST['editprofile'])){

                              $full_name = strip_tags($_POST['full_name']);
                              $username   = strip_tags($_POST['username']);
                              $email   = strip_tags($_POST['email']);
                              $aboutuser   = strip_tags($_POST['aboutuser']);
                              $country   = strip_tags($_POST['country']);
                              $city   = strip_tags($_POST['city']);
                              $birthday   = strip_tags($_POST['birthday']);
                            
                             $sql= "UPDATE `users` SET `full_name` = '$full_name', `aboutuser` = '$aboutuser', `email` = '$email', `username` = '$username', `country` = '$country', `city` = '$city', `birthday` = '$birthday' WHERE `users`.`id` = '".$_SESSION['user']."';";
                             $conn->query($sql);
                             echo '<script>window.location.assign("profile.php")</script>';

                    }
                   
                    ?>
                    <h4 class="modal-title">Edit Profile</h4>
                  </div>
                  <div class="modal-body">
 

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST"  class="needs-validation" novalidate>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom01">Full Name</label>
      <input type="text" name="full_name" class="form-control" id="validationCustom01"  value="<?php echo $row['full_name']; ?>" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationCustom02">User Name</label>
      <input type="text" name="username" class="form-control" id="validationCustom02"  value="<?php echo $row['username']; ?>" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-12 mb-3">
      <label for="validationCustomUsername">Email</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">@</span>
        </div>
        <input type="text" name="email" class="form-control" id="validationCustomUsername" placeholder="Username" aria-describedby="inputGroupPrepend" value="<?php echo $row['email']; ?>" required>
        <div class="invalid-feedback">
          Please choose a username.
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-12 mb-3">
      <label for="validationCustom02">About</label>
      <textarea name="aboutuser"  cols="30" rows="4"  class="form-control" id="validationCustom02"  value="<?php echo $row['aboutuser']; ?>" required><?php echo $row['aboutuser']; ?></textarea>
    
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationCustom03">Country</label>
      <input type="text" name="country" class="form-control" id="validationCustom03" placeholder="Country" value="<?php echo $row['country']; ?>" required>
      <div class="invalid-feedback">
        Please provide a valid city.
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom04">City</label>
      <input type="text" name="city" class="form-control" id="validationCustom04" placeholder="City" value="<?php echo $row['city']; ?>" required>
      <div class="invalid-feedback">
        Please provide a valid state.
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom05">Birthday</label>
      <input type="text" name="birthday" class="form-control" id="validationCustom05" placeholder="Birthday" value="<?php echo $row['birthday']; ?>" required>
      <small>01-01-2019ضع بهذا الشكل</small>
      <div class="invalid-feedback">
        Please provide a valid zip.
      </div>
    </div>
  </div>
 
  <button class="btn btn-primary" type="submit" name="editprofile">Change</button>
</form>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
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
</script>
                  </div>
                  <div class="modal-footer">
 
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
                
              </div>
              </div>


              <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal3">Change Password</button>
              <!-- Modal -->
              <div class="modal fade" id="myModal3" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                   
                    <h4 class="modal-title">Change Password</h4>
                  </div>
                  <div class="modal-body">

                <?php
              

                if(isset($_POST['changepassword'])){
                  //get POST data
                  $old = strip_tags($_POST['old']);
                  $new = strip_tags($_POST['new']);
                  $retype = strip_tags($_POST['retype']);

                  //create a session for the data incase error occurs
                  $_SESSION['old'] = $old;
                  $_SESSION['new'] = $new;
                  $_SESSION['retype'] = $retype;


                  //get user details
                  $sql = "SELECT * FROM users WHERE id = '".$_SESSION['user']."'";
                  $query = $conn->query($sql);
                  $row = $query->fetch_assoc();

                  //check if old password is correct
                  if(password_verify($old, $row['password'])){
                    //check if new password match retype
                    if($new == $retype){
                      //hash our password
                      $password = password_hash($new, PASSWORD_DEFAULT);

                      //update the new password
                      $sql = "UPDATE users SET password = '$password' WHERE id = '".$_SESSION['user']."'";
                      if($conn->query($sql)){
                        $_SESSION['success'] = "Password updated successfully";
                        echo '<script>window.location.assign("profile.php")</script>';
                        //unset our session since no error occured
                        unset($_SESSION['old']);
                        unset($_SESSION['new']);
                        unset($_SESSION['retype']);
                      }
                      else{
                        $_SESSION['error'] = $conn->error;
                      }
                    }
                    else{
                      $_SESSION['error'] = "New and retype password did not match";
                    }
                  }
                  else{
                    $_SESSION['error'] = "Incorrect Old Password";
                  }
                }
                else{
                  $_SESSION['error'] = "Input needed data to update first";
                 
                }

       

                ?>
              <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
              <div class="form-row">
                <div class="col-md-12 mb-3">
                  <label for="validationCustom01">Old Password</label>
                  <input type="password" name="old" class="form-control" id="validationCustom01" placeholder="Old Password" value="<?php echo (isset($_SESSION['old'])) ? $_SESSION['old'] : ''; ?>" required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
                <div class="col-md-12 mb-3">
                  <label for="validationCustom02">New Password</label>
                  <input type="password" name="new" class="form-control" id="validationCustom02" placeholder="New Password" value="<?php echo (isset($_SESSION['new'])) ? $_SESSION['new'] : ''; ?>" required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
                <div class="col-md-12 mb-3">
                  <label for="validationCustom02">Re New Password</label>
                  <input type="password" name="retype" class="form-control" id="validationCustom02" placeholder="Re New Password" value="<?php echo (isset($_SESSION['retype'])) ? $_SESSION['retype'] : ''; ?>" required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
              </div>
           
              <button class="btn btn-primary" type="submit"  name="changepassword" >Change Password</button>
              </form>

              <script>
              // Example starter JavaScript for disabling form submissions if there are invalid fields
              (function() {
                'use strict';
                window.addEventListener('load', function() {
                  // Fetch all the forms we want to apply custom Bootstrap validation styles to
                  var forms = document.getElementsByClassName('needs-validation');
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
              </script>
				</div>
	
	
                  <div class="modal-footer">
 
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
                
              </div>
              </div>




              </div>

              </p>
            </div>
          </div>
        </div>

        <!-- User info -->
        <div class="panel panel-default">
          <div class="panel-heading">
     



          <h4 class="panel-title">User info</h4>
          </div>
          <div class="panel-body">
            <table class="table profile__table">
              <tbody>
                <tr>
                  <th><strong>country</strong></th>
                  <td>  <?php echo $row2['country']; ?></td>
                </tr>
                <tr>
                  <th><strong>city</strong></th>
                  <td><?php echo $row2['city']; ?></td>
                </tr>
                <tr>
                  <th><strong>Birth Day</strong></th>
                  <td><?php echo $row2['birthday']; ?></td>
                </tr>
              </tbody>
            </table>

          </div>
        </div>



       

  </div>
    <div class="movie__type">PROFILE </div>
</figure>
 </div> 
   
 <!-- end col-12 -->
 <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
   <br>
 <figure class="movie">
  <div class="movie__content">
        <!-- User profile -->
         <!-- Latest posts -->
         <div class="panel panel-default">
          <div class="panel-heading">
          <h4 class="panel-title">Publications</h4>
          </div>
          <div  class="scroll">
          <?php
       $mysql = "SELECT * FROM movies WHERE `userid` ='".$_SESSION['user']."' ORDER BY mov_id DESC";
        $result = $conn->query($mysql);

        if ($result->num_rows > 0) {
          while($row = $result->fetch_array()) {
            echo '  <div class="panel-body">
            <div class="profile__comments">
              <div class="profile-comments__item">
                <div class="profile-comments__controls">
               
                <a href="trash.php?edit_id='.$row['mov_id'].'"> <i class="fa fa-trash-alt"></i></a>
                <a href="edit.php?edit_id='.$row['mov_id'].'"> <i class="fa fa-edit"></i></a>
                </div>
              
                <a href="watch.php?uid='.$row['mov_id'].'">
                <div class="profile-comments__avatar">
                  <img src="./upload/'.$row['img_name'].'" alt="...">
                </div>
                <div class="profile-comments__body">
                  <h5 class="profile-comments__sender">
                  '.$row['name_movies'].' <small> '.$row['year'].'</small>
                  </h5>
                  <div class="profile-comments__content">
                  '.$row['about'].'
                  
                  </div><small> '.$row['data-time'].'</small>
                  </a>
                </div>
              </div>
             
            </div>
        
          </div>
         <br>';
          } 
    
        } else {
          echo '

          <div class="panel-body">
            <div class="profile__comments">
            
              <div class="profile-comments__item">
              
                <div class="profile-comments__controls">
                  
                 

                </div>
               
                <div class="profile-comments__avatar">
                
                </div>
                <div class="profile-comments__body">

                  <div class="profile-comments__content">
                  No posts to display ..
                 لا توجد منشورات 
                
                  </div>
              
                </div>
              </div>
             
            </div>
        
          </div>
         <br>';
        }
?>
         
       
        </div>
        </div>
  </div>


  <div class="movie__type">Publications</div>


</figure>

 </div> 

 

<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
<?php
       $mysql = "SELECT * FROM ads ORDER BY RAND() LIMIT 2";
        $result = $conn->query($mysql);

        if ($result->num_rows > 0) {
          while($row = $result->fetch_array()) {
            echo '<div class="media g-mb-30 media-comment"> 
            <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">

        <img src="upload/ads/'.$row['img_name'].'" alt="" width="370" height="300">
            </div>
 </div>';
          } 
    
        } else {
          echo ' <div class="media g-mb-30 media-comment"> 
          <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
            <div class="g-mb-15">
            <img src="/upload/ads/no-ads.png" alt="" width="370" height="300">
            </div>

          </div>
</div>';
        }
?>

</div>


      <!-- END container-fluid & ROW -->
    </div>
  </div>



<?php include_once 'footer.php' ; ?>