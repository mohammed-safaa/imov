<?php
include './inc/function_session.php';
include_once 'inc/header.php';
echo '<body id="page-top">';
include_once 'inc/dbconnected.php';
include_once 'inc/navbar.php';
?>
<style>

    video {
        width: 100%;
        height: auto;
        color: #ff0000;
    }



</style>

<div class="container">
    <div class="row">
 <!-- start col-12 -->
      <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">


          <?php
          $ID = isset($_GET['uid']) && is_numeric($_GET['uid']) ? intval($_GET['uid']) : 0;

          $result = mysqli_query($conn,"SELECT * FROM movies where mov_id='$ID'");

while ($row2 = mysqli_fetch_array($result)) {
          ?>
      <figure class="movie">


  <div class="movie__content">
    <div class="movie__title">
        <video width="400" controls>
            <source src="./upload/<?php echo $row2['vid_name']; ?>" type="video/mp4">
            
        </video>

    </div>

    <div class="movie__details">

    </div>
  </div>
    <div class="movie__type">WATCH </div>
</figure>
 </div> 
 <?php 
 $idMovie= $row2['mov_id'];
 $sesson = $_SESSION['user']; 
  ?>
 <!-- end col-12 -->
        <?php } ?>

   
      <!-- END  ROW -->
    </div>
 




<br>

<div class="row">
<div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
<script>

setInterval (function(){
$('#showcomments').load("process/select-comment.php?uidcomment=<?php echo $_GET['uid']; ?>").fadeIn("slow");

// ajax select sentcomment system  time 15m
$('#showcomments').animate({scrollTop: height});
},900000);




// ajax select sentcomment system 

  $.ajax({
    url: "process/select-comment.php?uidcomment=<?php echo $_GET['uid']; ?>",
     success: function(result){
       $("#showcomments").html(result);
    }
  });


// ajax select sentcomment system  oncilke
$(document).ready(function(){ $("#sentcomment").click(function(){
  $.ajax({
      url: "process/select-comment.php?uidcomment=<?php echo $_GET['uid']; ?>",
     success: function(result){
       $("#showcomments").html(result);
    }

  });

});
});

 </script>
<figure class="movie">
    <div class="movie__content">
       <div class="panel panel-default">
          <div class="panel-heading"><h4 class="panel-title"> </h4>




<!-- div.scroll -->
    <div id="showcomments" class="scroll">



        <!--END div.scroll -->
    </div>
    <!--END div.scroll -->


<div class="media-body u-shadow-v18 g-bg-secondary g-pa-30" style="background-color: #fff;padding: 40px;">

<div class="form-group">
<label>Comment : </label>
<input type="hidden" id="userid" value="<?php echo $sesson; ?>">
<input type="hidden" id="movid" value="<?php echo $idMovie; ?>">
<textarea id="comment"  class="form-control" cols="30" rows="2"></textarea>
</div>

<div class="form-group">
<button type="submit" id="sentcomment" class="btn btn-primary">Comment</button>
</div>

  
<script>

//
$(document).ready(function() {
$("#sentcomment").click(function() {
var inputComment = $("#comment").val();
var inputUserid = $("#userid").val();
var inputMovid = $("#movid").val();
    $.ajax({
"url":"process/insert-comment.php",
"method":"POST",
"data":{
    comment:inputComment,
    userid:inputUserid,
    movid:inputMovid
    },

success:function (response){
    $("#result").html(response);
    $.ajax({
      url: "process/select-comment.php?uidcomment=<?php echo $_GET['uid']; ?>",
     success: function(result){
       $("#showcomments").html(result);
    }

  });
   
// success
document.getElementById('comment').value = '';

}
 });
 }); 
});

</script>

</div>
</div>
          </div>
        </div>
        <div class="movie__type">Comments</div>
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


 <!-- END container- -->
</div>


    <?php 

    if( $idMovie < $sesson){
    $Joinview  = $idMovie.$sesson;
    }else{
    $Joinview = $sesson.$idMovie;
    }

    $mysql = "SELECT * FROM `review` WHERE `id_review` = $Joinview";

    $resultt = $conn->query($mysql);

    if ($resultt->num_rows > 0) {

    // output data of each row
    while($rowr = $resultt->fetch_array()) {

    }

    } else {

    $sql="INSERT INTO `review` (`review`, `user_id`, `id_movies`, `id_review`) VALUES ('1','$sesson', '$idMovie', '$Joinview')";
    mysqli_query($conn,$sql);
    }
    $conn->close();


    ?>


<?php include_once 'footer.php' ; ?>