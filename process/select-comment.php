<?php

    session_start();
    include '../inc/dbconnected.php';
    $id_Movis = $_GET['uidcomment'];
    $id_Session =$_SESSION['user'];

    $mysql = "SELECT comment.* , users.* FROM comment INNER JOIN users ON comment.user_id = users.id WHERE comment.id_movies = $id_Movis";

      $resultt = $conn->query($mysql);


      $moh = mysqli_query($conn,"SELECT COUNT(*) FROM `comment` WHERE `id_movies` = $id_Movis");
      while ($rowcount = mysqli_fetch_array($moh)) {

echo '<p class="ont-weight-light text-sm-left"> <i class="fa fa-comment g-pos-rel g-top-1 g-mr-3"> </i> Comment :'.$rowcount['COUNT(*)'].' </p>
';

      }
      $moh = mysqli_query($conn,"SELECT COUNT(*) FROM `review` WHERE `id_movies` = $id_Movis");
      while ($rowcountre = mysqli_fetch_array($moh)) {
echo '<p style="margin-top: -40px;" class="ont-weight-light text-sm-right"> <i class="fa fa-eye g-pos-rel g-top-1 g-mr-3"></i> Views : '.$rowcountre['COUNT(*)'].' </p>';

      }

if ($resultt->num_rows > 0) {
  
    // output data of each row
    while($row = $resultt->fetch_array()) {
      echo '</div><div class="panel-body">';
      echo '<div class="media g-mb-30 media-comment">';
      echo '<img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" src="upload/avatar/'.$row['avatar'].'" alt="Image Description">';
      echo '<div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">';
      echo '<div class="g-mb-15">';
      echo '<a href="profile-uid.php?uid='.$row['id'].'"><h5 class="h5 g-color-gray-dark-v1 mb-0">'.$row['full_name'].'</h5></a>';
      echo '</div>';
      echo '<p class="text-lg-left">'.$row['comment'].'</p>';
      echo '<span class="g-color-gray-dark-v4 g-font-size-8"><i class="far fa-clock"></i> '.$row['data'].'</span>';
      echo '</div>';
      echo '</div>';
      echo '<br>';

    }
    
} else {
  echo '<div class="media g-mb-30 media-comment">
 
  <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
    <div class="g-mb-15">

    </div>

    <h6>No Comments For This Video  <br>    لا توجد تعليقات لهذا الفديو </h6>
  </div>
</div>
';
}









$conn->close();


?>



