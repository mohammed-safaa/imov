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
      $ID=$_GET['uid'];
      $sql = "SELECT * FROM users WHERE id = '$ID'";
      $query = $conn->query($sql);
      $row2 = $query->fetch_assoc();

      $sql = "SELECT * FROM `massges` WHERE `to_user_id` = '$ID' order by `id_massges` desc ";
      $query = $conn->query($sql);
      $rowmassage = $query->fetch_assoc();
      ?>

 <!-- start col-12 -->
      <div class="col-md-12">
        
      <figure class="movie">
  <div class="movie__hero">
  <div class="profile__avatar">
  <img  src="upload/avatar/<?php echo $row2['avatar']; ?>" alt="Movie poster" class="movie__img">
</div>
  </div>
  <div class="movie__content">
        <!-- User profile -->
        <div class="panel panel-default">
          <div class="panel-heading">
          <h4 class="panel-title"><?php echo $row2['full_name']; ?> </h4>
          </div>
          <div class="panel-body">
            <div class="profile__header">
              <h4><?php echo $row2['email']; ?> </h4>
              <p class="text-muted">
              <?php echo $row2['about']; ?>
              </p>

           
            <?php
            $se = $_SESSION['user'];
            $r = $row2['id'];

            if($r == $se){

            }else{
            echo '<button type="button" class="btn btn-primary btn-sm" class="open-button" onclick="openForm()"><i class="fab fa-facebook-messenger"> </i> Massages</button>';
            }

            ?>
                <!-- start massege -->
               
                <div class="chat-popup" id="myForm">
                <div class="form-container">
                <div class="panel-body">

                <button type="button" class="btn cancel" onclick="closeForm()"><span aria-hidden="true">&times;</span></button>
                 <a  id="but" style="text-align: left; margin-top:-50px; font-size: 15px; padding-left:210px; color:#4e73df;  text-decoration-line: underline;  "> <span class="far fa-trash-alt"> </span>  مسح محتوى الدردشة</a>
                    <!-- start show chat ajax -->
                    <script>
                    setInterval (function(){
                    $('#showchat').load("process/select-chat.php?uid_to_user=<?php echo $row2['id']; ?>").fadeIn("slow");

                    var height = 555500;
                    $('#showchat').each(function(){
                    height += parseInt($(this).height());
                    });

                    height += '';

                    $('#showchat').animate({scrollTop: height});
                    },2000);
                    //
                    function openForm() {
                    document.getElementById("myForm").style.display = "block";
                    }

                    function closeForm() {
                    document.getElementById("myForm").style.display = "none";
                    }


                    // ajax insert chat system
                    $(document).ready(function() {
                    $("#btnsend").click(function() {
                    var inputMassage = $("#massage").val();
                    var inputSendetid = $("#senderid").val();
                    var inputTouserid = $("#touserid").val();
                    var inputStatus = $("#status").val();
                    var inputJoin = $("#idjoin").val();
                    $.ajax({
                          "url":"process/insert-chat.php",
                          "method":"POST",
                          "data":{
                    massage:inputMassage,
                    senderid: inputSendetid,
                    touserid: inputTouserid,
                    status:inputStatus,
                    idjoin:inputJoin 
                    },

// success
success:function (){ document.getElementById('massage').value = ''}

});
}); 
});

// ajax select chat system 
$(document).ready(function(){ $("#btnsend").click(function(){
  $.ajax({
    url: "process/select-chat.php?uid_to_user=<?php echo $row2['id']; ?>",
     success: function(result){
       $("#showchat").html(result);
    }
  });
  
  });
  });
</script>



 <ul id="showchat" class="chat"  style="overflow-y: scroll; height: 300px; width: 350px; background:#fff;">  </ul>
<!-- end show chat ajax -->
</div>

      <div class="panel-footer">
      <div class="input-group">
      <br>
      <form id="myForm">
      <input style="margin-rigth:10px; width: 300px;" id="massage" type="text" class="form-control input-sm" placeholder="Type your message here...."  maxlength="300" required>
      </form>
      <input id="senderid" type="hidden" value="<?php echo $_SESSION['user'] ?>">
      <input  id="touserid" type="hidden" value="<?php echo $row2['id']; ?>">

      <input  id="status" type="hidden" value="1">
            <input  id="idjoin" type="hidden" value="<?php echo $row2['id']; ?><?php echo $_SESSION['user'] ?>">
      <span class="input-group-btn">
      <button style="margin-left:14px; margin-top:10px; width: 40px;" class="btn btn-primary" id="btnsend" type="submit" ><i class="fas fa-paper-plane"></i></button>

</span>
                </div>
                </div>
              </div>
              </div>
              <!-- end massege -->
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
 <div class="col-md-8">
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
       $mysql = "SELECT * FROM movies WHERE `userid` =$ID ORDER BY mov_id DESC";
        $result = $conn->query($mysql);

        if ($result->num_rows > 0) {
          while($row = $result->fetch_array()) {
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
<div class="movie__type">PUBLICATIONS</div>
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
  </div>



<?php include_once 'footer.php' ; ?>