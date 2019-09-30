<?php
include './inc/function_session.php';
include_once 'inc/header.php';
echo '<body id="page-top">';
include_once 'inc/dbconnected.php';
include_once 'inc/navbar.php';
?>
<style>


</style>

<div class="container">
    <div class="row">
    
    <?php


if(isset($_POST['upload'])){
  $name_movies = strip_tags($_POST['name_movies']);
  $about = strip_tags($_POST['about']);
  $year1 = strip_tags($_POST['year1']);
  $imdb = strip_tags($_POST['imdb']);
  $sections = strip_tags($_POST['sections']);
  $category = strip_tags($_POST['category']);
  $tag = strip_tags($_POST['tags']);
  $userid = strip_tags($_SESSION['user']);
  $tags = "#".$tag;
 
  $datayear = strip_tags($_POST['datayear']);
  $datamonth = strip_tags($_POST['datamonth']);

  $image_name = $_FILES['image']['name'];
  $image_loc = $_FILES['image']['tmp_name'];
  $image_size = $_FILES['image']['size'];
  $image_type = $_FILES['image']['type'];
  $img_error = $_FILES ['image']['error'];

  $video_name = $_FILES['file']['name'];
  $video_loc = $_FILES['file']['tmp_name'];
  $video_size = $_FILES['file']['size'];
  $video_type = $_FILES['file']['type'];
  $vid_error = $_FILES ['file']['error'];

  $folder="upload/";

  $new_image_size = $image_size/7024;
  $new_video_size = $image_size/302400;

  $allowed_image = array("jpg","jpeg","png","gif");
  $allowed_video = array("mp4","mpg","wma","wmv","mov","avi","flv");

  $explode  = explode('.',$image_name);
  $new_image_name = strtolower(end($explode));
  $final_image = str_replace(' ','-imovies-image-',$new_image_name);

  $explodev  = explode('.',$video_name);
  $new_video_name = strtolower(end($explodev));
  $final_video = str_replace(' ','-imovies-video-',$new_video_name);


  if (!in_array($final_image,$allowed_image ) || !in_array($final_video,$allowed_video) ) {
      $errorimg = '<div class="alert alert-danger" role="alert">This Type of Image File or video file is Not Supported</div>';
  } elseif (in_array($final_image,$allowed_image ) || in_array($final_video,$allowed_video) ) {
      $image_rand = rand(10,10000000)."-mediabox.com-image-";
      move_uploaded_file($image_loc,$folder.$image_rand);
      $video_rand = rand(10,100000000)."-mediabox.com-video-";
      move_uploaded_file($video_loc,$folder.$video_rand);
  
        $sql="INSERT INTO `movies` (`name_movies`, `about`, `sections`, `category`, `year`, `imdb`, `tags`, `userid`, `img_name`, `img_type`, `img_size`, `vid_name`, `vid_type`, `vid_size`, `data-year`, `month`) VALUES ('$name_movies', '$about', '$sections', '$category', '$year1', '$imdb', '$tags', '$userid', '$image_rand', '$image_type', '$new_image_size', '$video_rand', '$video_type', '$new_video_size', '$datayear', '$datamonth')";
        if (mysqli_query($conn,$sql)){
            $success = '<div class="alert alert-success" role="alert">  شكراً لك لقد  تم تحميل الفلم بنجاح</div>';
                      echo '<script>window.location.assign("index.php")</script>';
        }

       
    }


}



?>


   <!-- start col-12 -->
<div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
<br>
  <figure class="movie">
    <div class="movie__content">
       <div class="panel panel-default">
          <div class="panel-heading"><h4 class="panel-title">Upload Movie</h4></div>
          <br>
            <div class="panel-body">
            <form  class="user" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data"  novalidate>
    <div class="form-group">
      <input type="text" class="form-control form-control-user" id="title" placeholder="Enter Title" name="name_movies" minlength="4" maxlength="70" required>
        <div class="valid-feedback">احسنت : رجاءاً يجب أن  لا يتجاوز 30 حرف وأن لايقل عن 4 حروف </div>
        <div class="invalid-feedback"> عذراً : يجب وضع الاسم الفلم رجاءاً ً و يجب أن  لا يتجاوز 30 حرف وأن لايقل عن 4 حروف </div>
    </div>
    <div class="form-group">
      <input type="text" class="form-control form-control-user" id="about" placeholder="Enter About" name="about" minlength="50" maxlength="300" required>
        <div class="valid-feedback">احسنت : رجاءاً يجب أن  لا يتجاوز 300 حرف وأن لايقل عن 50 حروف </div>
        <div class="invalid-feedback"> عذراً : يجب وضع قصة الفلم او نبذا عنه رجاءاً ً و يجب أن  لا يتجاوز 300 حرف وأن لايقل عن 50 حروف </div>
    </div>
    <div class="form-group">
        <select  class="form-control form-control-user" type="text" id="sections" name="sections" required >
            <option></option>
            <option>Popular</option>
            <option>Action</option>
            <option>Family</option>
            <option>Drama</option>
            <option>Comedy</option>

            <option>Fantasy</option>
            <option>Horror</option>
            <option>War</option>
            <option>Mystery</option>
            <option>Romance</option>

            <option>History</option>
            <option>Westerm</option>
            <option>Animation</option>
            <option>Musical</option>
            <option>Indian</option>

            <option>Türkçe</option>
            <option>Arabic</option>
            <option>Kurdish</option>
        </select>
    </div>

       <div class="form-group">
           <select  class="form-control form-control-user" type="text" id="category"  name="category" required >
               <option></option>
               <option>movies</option>
               <option>tv series</option>
           </select>

       </div>
    <div class="form-group">
      <input type="text" class="form-control form-control-user" id="imdb" placeholder="Enter IMDb" name="imdb" minlength="3" maxlength="6" required>
        <div class="valid-feedback">احسنت : رجاءاً يجب أن  لا يتجاوز 6 حرف وأن لايقل عن 3 حروف </div>
        <div class="invalid-feedback"> عذراً : يجب وضع تصنيفه الفلم على موقع "أ دي ام اي" رجاءاً ً و يجب أن  لا يتجاوز 6 حرف وأن لايقل عن 5 حروف </div>
    </div>
    <div class="form-group">
      <input type="text" class="form-control form-control-user" id="year" placeholder="Enter year" name="year1" minlength="4" maxlength="4" required>
        <div class="valid-feedback">احسنت : رجاءاً يجب أن  لا يتجاوز 4 حرف وأن لايقل عن 4 حروف </div>
        <div class="invalid-feedback"> عذراً : يجب وضع سنة اﻷنتاج رجاءاً ً و يجب أن  لا يتجاوز 4 حرف وأن لايقل عن 4 حروف </div>
    </div>
    <div class="form-group">
      <small>يجب وضع كلمة دلائلية للمسلسل او ضع نفس الهاش تاك الموجود في الحلقات المرفوعه مسبقاً مع مراعات حذف الهاش تاك أو ضع اسم المسلسل فقط بدون ذكر الحلقة</small>
      <input type="text" class="form-control form-control-user" id="tags" placeholder="Enter tags" name="tags" minlength="2" maxlength="200" required>
        <div class="valid-feedback">احسنت : رجاءاً يجب أن  لا يتجاوز 200 حرف وأن لايقل عن 2 حروف </div>
        <div class="invalid-feedback"> عذراً : يجب وضع كلمة دلائلية للمسلسل على سبيل المثال فقط اسم المسلسل بدون ذكر الحلقة  رجاءاً ً و يجب أن  لا يتجاوز 4 حرف وأن لايقل عن 4 حروف </div>
    </div>
    <div class="form-group">
    <label for="pwd">image :</label>
      <input  type="file" id="image"  name="image"  required>

    </div>

    <div class="form-group">
    <label for="pwd">video :</label>
      <input type="file"  id="file" name="file"  required>

    </div>
    <input type="hidden" name="datayear" value="<?php echo date('Y');?>">
    <input type="hidden" name="datamonth" value="<?php echo date('m');?>">
       <?php echo $errorimg ; ?>
       <?php echo $errorvid ; ?>
       <?php echo $success; ?>

    <button id="btnup"  type="submit" name="upload"  class="btn btn-primary">Save</button>
  </form>

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
</script>


             
            </div>
          </div>
        </div>
        <div class="movie__type">Upload Movie</div>
  </figure>
<!-- END container-fluid & ROW -->
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