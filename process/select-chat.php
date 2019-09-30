<?php

    session_start();

    function selectCaht(){
    include '../inc/dbconnected.php';
    $id_Sender = $_GET['uid_to_user'];
    $id_Session =$_SESSION['user'];

    if($id_Sender < $id_Session){
    $Join = $id_Sender.$id_Session;
    }else{
    $Join = $id_Session.$id_Sender;
    }

    $moh = mysqli_query($conn,"SELECT massges.* , users.* FROM massges INNER JOIN users ON massges.sender_id = users.id WHERE massges.id_join = $Join ");
    while ($row = mysqli_fetch_array($moh)) {
  
    echo '<script>
    $(document).ready(function(){
    $("#but").click(function(){
    $.get("./process/del-chat.php?udel='.$row['id_massges'].'", function(data, status){

    });
    });
    });
    </script>';


    echo '<li class="left clearfix">'; 
    echo '<div class="media" style="background:#eeeeee;border-radius: 10px 10px;">';
    echo '<div class="media-left">';
    echo '<a href="profile-uid.php?uid='. $row['id'].'" ><img style="border-radius: 50%; margin-left:12px; margin-top: 10px;" class="media-object" src="upload/avatar/'. $row['avatar'] .'" alt="..." width="60" height="60"></a>';
    echo '</div>';
    echo '<div class="media-body" style="" >';
    echo '<h6 class="media-heading">'. $row['full_name'].' </h6> ';
    echo '<p style="text-align: left; font-size: 18px; margin-top:-10px; padding-left:10px; ">'.$row['massges'].'</p>';
    echo ' <small style="text-align: right; margin-top:-50px; font-size: 12px; padding-left:10px;"><span class="far fa-clock">  </span> ' . $row['data'] .' </small>  ';
    echo '</div>';
    echo '</div>';
    echo '</li>';
   
  }
}
echo selectCaht();
?>



