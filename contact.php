<?php
include './inc/function_session.php';
include_once 'inc/header.php';
echo '<body id="page-top">';
include_once 'inc/dbconnected.php';
include_once 'inc/navbar.php';

?>
<style>
.logo__img {
    width: 60px;
    display: flex;
    height: 60px;
}
.center {
  margin: auto;
  width: 30%;
  border: 1px solid #e6e6e6;
  padding: 12px;
  /* font-size: 15px; */
}
</style>
      
      <?php
        $sql = "SELECT * FROM `setting` WHERE `id` = 1 ";
        $query = $conn->query($sql);
        $row2 = $query->fetch_assoc();
    ?>

<div class="container" >
<div class="row">





  <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
  <figure class="movie">
<div class="movie__content">
<div class="panel panel-default">
<h3 class="font-weight-bold text-uppercase"><img src="upload/logo/<?php echo $row2['img_name']; ?>" class="img-circle" alt="Cinque Terre" width="104" height="106"> 
 <?php echo $row2['name_website']; ?></h3>
<hr>
<p class="font-weight-light"> <?php echo $row2['about']; ?></p>
  <hr>
  <p class="font-weight-light">Address : <?php echo $row2['address']; ?></p>
    
  <p class="font-weight-light">Email : <?php echo $row2['email']; ?></p>
  <p class="font-weight-light">Phone : <?php echo $row2['phone1']; ?></p>
  <p class="font-weight-light">Phone : <?php echo $row2['phone2']; ?></p>

  <a target="_blank" rel="noopener noreferrer" href="http://<?php echo $row2['facebook']; ?>/"><p class="font-weight-light">Facebook : <?php echo $row2['facebook']; ?></p></a>

  <a target="_blank" rel="noopener noreferrer" href="http://<?php echo $row2['youtube']; ?>/"><p class="font-weight-light">Youtube : <?php echo $row2['youtube']; ?></p></a>
  <a target="_blank" rel="noopener noreferrer" href="http://<?php echo $row2['twitter']; ?>/"><p class="font-weight-light">Twitter : <?php echo $row2['twitter']; ?></p></a>
 
  <div class="center">
  
    <small style="text-align: center;">Get Started With <?php echo $row2['name_website']; ?> On iOS & Android . <br></small>
   
  <a target="_blank" rel="noopener noreferrer" href="http://<?php echo $row2['app-iso']; ?>/">
  <img src="style/img/apple-app-badge-150x44.png" class="img-circle" alt="Cinque Terre" width="130" height="40">
  </a>
  <a target="_blank" rel="noopener noreferrer" href="http://<?php echo $row2['app-android']; ?>/">
  <img src="style/img/android-app-badge-150x44.png" class="img-circle" alt="Cinque Terre" width="130" height="40">
  </a>

  </div>
</div>
</div>
<div class="movie__type">CONTACT</div>
</figure>
 </div>





</div> 





    <!-- END container-md-12 -->
 

    <!-- END container-fluid & ROW -->
</div>



  <?php include_once 'footer.php' ; ?>