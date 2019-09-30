<?php
include './inc/function_session.php';
include_once 'inc/header.php';
echo '<body id="page-top">';
include_once 'inc/dbconnected.php';
include_once 'inc/navbar.php';

?>
<style>
div.scroll {
    background-color: #fff;
    height: 570px;
    width: 100%;
    overflow-y: auto;
    padding: 40px;
}
</style>
      


<div class="container" >
<div class="row" >
<div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
<br>
<figure class="movie">

<div class="movie__content">
      <!-- User profile -->
       <!-- Latest posts -->
       <div class="panel panel-default">
        <div class="panel-heading">
        <h4 class="panel-title">HISTORY سجل المشاهدات</h4>
        </div>

        <div  class="scroll">
        <?php

$mysql = "SELECT * FROM `review` WHERE `user_id` = ".$_SESSION["user"]." ORDER BY `data` DESC ";
$result = $conn->query($mysql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_array()) {
     $rowidmov = $row['id_movies'];
     $sql = "SELECT * FROM `movies` WHERE `mov_id` =  $rowidmov ORDER BY `data-time` DESC ";
     $query = $conn->query($sql);
     $row = $query->fetch_assoc();

          echo '  <div class="panel-body">
          <div class="profile__comments">
            <div class="profile-comments__item">
              <div class="profile-comments__controls">
             
              <a href="watch.php?uid='.$row['mov_id'].'"><i class="fas fa-expand-arrows-alt"></i></a>
              </div>
            
              <a href="watch.php?uid='.$row['mov_id'].'">
              <div class="profile-comments__avatar">
                <img src="./upload/'.$row['img_name'].'" alt="...">
              </div>
              <div class="profile-comments__body">
                <h5 class="profile-comments__sender">
                '.$row['name_movies'].' <small> '.$row['year'].'</small>
                </h5>
                </a>
                <div class="profile-comments__content">
                '.$row['about'].'
                
                </div><small> '.$row['data-time'].'</small>
               
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
                There Are No Record Views..
                لا يوجد سجل مشاهدات
              
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
<div class="movie__type">HISTORY</div>
</figure>
</div> 

<div class="col-md-4">
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

    
    <br>
    <hr>

    </div>

    </div>


  <?php include_once 'footer.php' ; ?>