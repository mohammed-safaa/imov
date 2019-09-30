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

    $moh = mysqli_query($conn,"SELECT massges.* , users.* FROM massges INNER JOIN users ON massges.sender_id = users.id WHERE massges.id_join =  $Join ");
    while ($row = mysqli_fetch_array($moh)) {
 

   
    
     
      
    
  
     
     
    // echo ' <div id="showchatnav" class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">';
    // echo ' <h6 class="dropdown-header">';
    // echo 'Message Center';
    // echo ' </h6>';
    
   
   
      
   
  


    //echo '<a class="dropdown-item d-flex align-items-center" href="#">';
    echo '<div class="dropdown-list-image mr-3">';
    echo ' <img class="rounded-circle" src="upload/avatar/'. $row['avatar'] .'" alt="">';
    echo '<div class="status-indicator bg-success"></div>';
    echo '</div>';
    echo '<div class="font-weight-bold">';
    echo '<div class="text-truncate">'.$row['full_name'].'<small>'.$row['massges'].'</small></div>';
    echo '<div class="small text-gray-500">' . $row['data'] .'</div>';
    echo '</div>';
echo '</a>';

  //    echo '<a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>';
  // echo '</div>';
  //    echo '</li>';





    // echo '<li class="left clearfix">'; 
    // echo '<div class="media" style="background:#eeeeee;border-radius: 10px 10px;">';
    // echo '<div class="media-left">';
    // echo '<a ><img style="border-radius: 50%; margin-left:12px; margin-top: 10px;" class="media-object" src="upload/avatar/'. $row['avatar'] .'" alt="..." width="60" height="60"></a>';
    // echo '</div>';
    // echo '<div class="media-body" style="" >';
    // echo '<h6 class="media-heading">'. $row['full_name'].' </h6> ';
    // echo '<p style="text-align: left; font-size: 18px; margin-top:-10px; padding-left:10px; ">'.$row['massges'].'</p>';
    // echo ' <small style="text-align: right; margin-top:-50px; font-size: 12px; padding-left:10px;"><span class="far fa-clock">  </span> ' . $row['data'] .' </small>  ';
    // echo '</div>';
    // echo '</div>';
    // echo '</li>';
  }
}
echo selectCaht();
?>



