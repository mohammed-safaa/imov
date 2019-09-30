<?php
include './inc/function_session.php';
include_once 'inc/header.php';
echo '<body id="page-top">';
include_once 'inc/dbconnected.php';
include_once 'inc/navbar.php';
$user_id=$_SESSION['user'];
?>

<style>

</style>

<div class="container">
    <div class="row">
   
	<?php
    $ID = $_GET['edit_id'];
 		$sql = "SELECT * FROM movies where mov_id='$ID'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

	?>

<?php
   
   if(isset($_POST['editmovie'])){
     
     $title = strip_tags($_POST['title']);
     $about = strip_tags($_POST['about']);
     $sections = strip_tags($_POST['sections']);
     $category = strip_tags($_POST['category']);
     $year = strip_tags($_POST['year']);
     $imdb = strip_tags($_POST['imdb']);
     $tag = strip_tags($_POST['tags']);
     $tags = "#".$tag;
     $user_id = $_SESSION['user'];
     $movid = strip_tags($_POST['movid']);
     
$sql ="UPDATE `movies` SET `name_movies` = '$title', `about` = '$about', `sections` = '$sections', `category` = '$category', `year` = '$year', `imdb` = '$imdb', `tags` = '$tag', `userid` = '$user_id' WHERE `movies`.`mov_id` = '$movid'";
   
     $conn->query($sql);
     $success ='<div class="alert alert-success" role="alert">شكراً تم تعديل بنجاح</div>';
     echo '<script>window.location.assign("profile.php")</script>';
   }
   ?>

 <!-- start col-6 -->
<div class="col-md-8">
      <!-- Basic Card Example -->
      <div class="shadow">
       
                <div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">Edit Movie </h6></div>
                <div class="card-body">
   <form class="user" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data"  novalidate>
    <div class="form-group">
      <input type="text" value="<?php echo $row['name_movies']; ?>" class="form-control form-control-user" id="uname" placeholder="Enter Title" name="title" minlength="3" maxlength="80" required>
        <div class="valid-feedback">احسنت : رجاءاً يجب أن  لا يتجاوز 30 حرف وأن لايقل عن 4 حروف </div>
        <div class="invalid-feedback"> عذراً : يجب وضع الاسم الفلم رجاءاً ً و يجب أن  لا يتجاوز 30 حرف وأن لايقل عن 4 حروف </div>
    </div>
    <div class="form-group">
      <textarea type="text" value="<?php echo $row['about']; ?>" class="form-control" id="uname" placeholder="Enter About" name="about" minlength="50" maxlength="400" cols="30" rows="4" required><?php echo $row['about']; ?></textarea>
        <div class="valid-feedback">احسنت : رجاءاً يجب أن  لا يتجاوز 300 حرف وأن لايقل عن 50 حروف </div>
        <div class="invalid-feedback"> عذراً : يجب وضع قصة الفلم او نبذا عنه رجاءاً ً و يجب أن  لا يتجاوز 300 حرف وأن لايقل عن 50 حروف </div>
    </div>
    <div class="form-group">
        <select value="<?php echo $row['sections']; ?>" class="form-control form-control-user" type="text"  name="sections" required >
            <option><?php echo $row['sections']; ?></option>
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
           <select value="<?php echo $row['category']; ?>" class="form-control form-control-user" type="text"  name="category" required >
               <option><?php echo $row['category']; ?></option>
               <option>movies</option>
               <option>tv series</option>
           </select>

       </div>
    <div class="form-group">
      <input type="text" value="<?php echo $row['imdb']; ?>" class="form-control form-control-user" id="uname" placeholder="Enter IMDb" name="imdb" minlength="3" maxlength="6" required>
        <div class="valid-feedback">احسنت : رجاءاً يجب أن  لا يتجاوز 6 حرف وأن لايقل عن 3 حروف </div>
        <div class="invalid-feedback"> عذراً : يجب وضع تصنيفه الفلم على موقع "أ دي ام اي" رجاءاً ً و يجب أن  لا يتجاوز 6 حرف وأن لايقل عن 5 حروف </div>
    </div>
    <div class="form-group">
      <input type="text" value="<?php echo $row['year']; ?>" class="form-control form-control-user" id="uname" placeholder="Enter year" name="year" minlength="4" maxlength="4" required>
        <div class="valid-feedback">احسنت : رجاءاً يجب أن  لا يتجاوز 4 حرف وأن لايقل عن 4 حروف </div>
        <div class="invalid-feedback"> عذراً : يجب وضع سنة اﻷنتاج رجاءاً ً و يجب أن  لا يتجاوز 4 حرف وأن لايقل عن 4 حروف </div>
    </div>
    <div class="form-group">
      <small>يجب وضع كلمة دلائلية للمسلسل او ضع نفس الهاش تاك الموجود في الحلقات المرفوعه مسبقاً مع مراعات حذف الهاش تاك أو ضع اسم المسلسل فقط بدون ذكر الحلقة</small>
      <input type="text" class="form-control form-control-user" id="tags" value="<?php echo $row['tags']; ?>" placeholder="Enter tags" name="tags" minlength="2" maxlength="200" required>
        <div class="valid-feedback">احسنت : رجاءاً يجب أن  لا يتجاوز 200 حرف وأن لايقل عن 2 حروف </div>
        <div class="invalid-feedback"> عذراً : يجب وضع كلمة دلائلية للمسلسل على سبيل المثال فقط اسم المسلسل بدون ذكر الحلقة  رجاءاً ً و يجب أن  لا يتجاوز 4 حرف وأن لايقل عن 4 حروف </div>
    </div>
    <input type="hidden" name="movid" value="<?php echo $_GET['edit_id']; ?>">
       <?php echo $errorimg ; ?>
       <?php echo $errorvid ; ?>
       <?php echo $success; ?>

    <button   type="submit"  name="editmovie" class="btn btn-primary"  >Save</button>
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
 <!-- end col-6 -->



 
      <!-- END container-fluid & ROW -->
    </div>
  </div>


  <?php include_once 'footer.php' ; ?>