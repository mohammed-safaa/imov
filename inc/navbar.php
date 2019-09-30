
<?php
$sql = "SELECT * FROM `license` ORDER BY id_license DESC LIMIT 1";
$query = $conn->query($sql);
$row = $query->fetch_assoc();
$days = $row['days'];
$date_license = date_create($row['data_time']);
$date_star = date_format($date_license,"d-m-Y");
$datetime1 = new DateTime($date_star); // star
$datetime2 = new DateTime($data); // end
$interval = $datetime1->diff($datetime2);
$interval->format('%R%a');
$totil = $interval->format('%R%a');
if($days >= $totil & $totil >= 0) {

}else{
  echo '<script>window.location.assign("htppGETorPSTrequestno-li&cens&e.php")</script>';
}
?>
  <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <?php
              $sql = "SELECT * FROM `setting` WHERE `id`=1 ";
              $query = $conn->query($sql);
              $row = $query->fetch_assoc();
              ?>
        <a class="navbar-brand text-uppercase" href="index.php"><?php echo $row['name_website']; ?><img src="upload/logo/<?php echo $row['img_name']; ?>" alt="" width="40" height="40">
        <small class="mr-1 d-none d-md-inline text-gray-600 small" id="countrycode" style="font-size: 10px;"></small> </a>
          <!-- Sidebar Toggle (Topbar) -->
          <!-- <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
            
          </button> -->
          
          <!-- Dropdown -->
          <ul class="navbar-nav ml-left">
          <!-- <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
            </li> -->
            <li class="nav-item">
            <a class="nav-link" href="all_movies.php">Movies</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="all_show_tv.php">TV Series</a>
            </li>
            <!-- <li class="nav-item">
            <a class="nav-link" href="random.php">عرض عشوائي</a>
            </li> -->

          </ul>
          <!-- Topbar Search -->

          <form  method="post" action="result.php" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text"  name="roll_no"  class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button type="submit" name="save"  value="search" class="btn btn-primary" >
                  <i class="fas fa-search fa-sm"> </i>
                </button>
              </div>
            </div>
          </form>
 
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>



               <!-- Nav Item - Messages -->
               <li class="nav-item dropdown no-arrow mx-1">
     
     <a  class="nav-link dropdown-toggle" href="upload.php" >
       <i class="fas fa-upload"></i>
       <!-- Counter - Messages -->
       
     </a>
     <!-- Dropdown - Messages -->
   </li>


            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw" ></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">9+</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                  <?php

                  $moh = mysqli_query($conn,"SELECT * FROM movies ORDER BY mov_id DESC LIMIT 9");
                  while ($row = mysqli_fetch_array($moh)) {
                      ?>



                      <?php echo '<a class="dropdown-item d-flex align-items-center" href="watch.php?uid='.$row['mov_id'].' ">'; ?>

                          <div class="mr-3">

                                  <img class="rounded float-left" src="./upload/<?php echo $row['img_name']; ?>" width="55" height="65">

                          </div>
                          <div>
                              <div class="small text-gray-500"><?php echo $row['data-time']; ?></div>
                              <span class="font-weight-bold"><?php echo $row['name_movies']; ?></span> <small>  <?php echo $row['year']; ?></small>
                              <div class="small text-gray-500"><?php echo $row['category']; ?> | <?php echo $row['sections']; ?></div>
                          </div>
                      </a>
                  <?php } ?>


                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>


  

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
     
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter">1</span>
              </a>


              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                <?php

$moh1 = mysqli_query($conn,"SELECT massges.* , users.* FROM massges INNER JOIN users ON massges.sender_id = users.id WHERE massges.to_user_id = '".$_SESSION['user']."' ");
while ($rowchatnav = mysqli_fetch_array($moh1)) {
    ?>
                <a class="dropdown-item d-flex align-items-center" href="profile-uid.php?uid=<?php echo $rowchatnav['id']; ?>">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="upload/avatar/<?php echo $rowchatnav['avatar'];?>" alt="">
                    <div class="status-indicator"></div>
                  </div>
                  <div>
                    <div class="text-truncate"><?php echo $rowchatnav['full_name']; ?><br><small><?php echo $rowchatnav['massges']; ?></small> </div>
                    <div class="small text-gray-500"><?php echo $rowchatnav['data'];?></div>
                  </div>
                </a>

              
<?php } ?>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
              </div>
            </li>






            <div class="topbar-divider d-none d-sm-block"></div>
              <?php
              $sql = "SELECT * FROM users WHERE id = '".$_SESSION['user']."'";
              $query = $conn->query($sql);
              $row = $query->fetch_assoc();
              ?>
              <style>

       .image_inner_container{
       	border-radius: 50%;
       	padding: 2px;
        background: #833ab4; 
        background: linear-gradient(to bottom, #cccccc, #9999ff); 
   
       }
       .image_inner_container img{
       	height: 50px;
       	width: 50px;
       	border-radius: 50%;
       	border: 1px solid white;
       }

       .image_outer_container .green_icon{
         background-color: #4cd137;
         position: absolute;
         right: 50px;
         bottom: 10px;
         height: 12px;
         width: 12px;
         border:1px solid white;
         border-radius: 50%;
         
       }
              </style>
<li class="nav-item dropdown no-arrow mx-1">
<?php
 $bday  = $row['birthday'];
 $date = date_create($bday);
 $bdays  = date_format($date,"d-m");
 $sd=  $bdays.'-'.date("Y");
$d1=strtotime($sd);
$d2=ceil(($d1-time())/60/60/24);
if($d2==0 ){
  echo '<li class="nav-item dropdown no-arrow mx-1">
  <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-gift fa-fw" ></i>
    <!-- Counter - Alerts -->
    <span class="badge badge-danger badge-counter">1+</span>
  </a>';
}

 ?>

  <!-- Dropdown - Alerts -->
  <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
 <div>
      <div class="small text-gray-500"></div>
      <br>
      <span class="font-weight-bold"><p class="text-center">Happy Birthday</p></span>
      <div class="small text-gray-800 text-center">هذا اليوم هو عيد ميلادك  كل عام وانت بخير</div>
      <br>
 </div>
</div>
</li>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small" style="text-transform: capitalize;"><?php echo $row['full_name']; ?> </span>
                <div class="image_outer_container">
                <div class="green_icon"></div>
                <div class="image_inner_container">
                <img src="upload/avatar/<?php echo $row['avatar']; ?>">
                </div>
                </div>
                </div>
</a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="profile.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>

                <a class="dropdown-item" href="history.php">
                  <i class="fas fa-hourglass-half fa-sm fa-fw mr-2 text-gray-400"></i>
                  History
                </a>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="process/logout.php"  >
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>

              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->