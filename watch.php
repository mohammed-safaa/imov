<?php
include './inc/function_session.php';
include_once 'inc/header.php';
echo '<body id="page-top">';
include_once 'inc/dbconnected.php';
include_once 'inc/navbar.php';
?>
<style>
.avatar {
  vertical-align: middle;
  width: 50px;
  height: 50px;
  border-radius: 50%;
 
}

</style>

<div class="container">
    <div class="row">
 <!-- start col-12 -->
      <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">


        <?php
        $ID = isset($_GET['uid']) && is_numeric($_GET['uid']) ? intval($_GET['uid']) : 0;
        $result = mysqli_query($conn,"SELECT movies.* , users.* FROM movies INNER JOIN users ON movies.userid = users.id WHERE movies.mov_id = $ID");
        while ($row2 = mysqli_fetch_array($result)) {
        $flt = $row2['tags'];
        ?>
      <figure class="movie">
  <div class="movie__hero">
    <img src="./upload/<?php echo $row2['img_name']; ?>" alt="Movie poster" class="movie__img">
  </div>

  <div class="movie__content">
    <div class="movie__title">
      <h1 class="movie__heading"><?php echo strtoupper($row2['name_movies']); ?> </h1>
        <div class="movie__tag movie__tag--3"><?php echo $row2['sections']; ?></div>
      <div class="movie__tag movie__tag--1"> IMDb <?php echo $row2['imdb']; ?></div>
      <div class="movie__tag movie__tag--2"><?php echo $row2['year']; ?></div>

    </div>
    <p class="movie__description"><?php echo $row2['about']; ?>.</p>

    <p class="movie__description" style="color:#4e73df"><?php echo $row2['tags']; ?></p>
    <div class="movie__details">
    <p class="movie__detail">
    <a  href="profile-uid.php?uid=<?php echo $row2['id']; ?>" style="text-transform: capitalize; font-size: 14px; color: #7e828e; text-decoration: none; background-color: #d0232300;" >
<img  src="upload/avatar/<?php echo $row2['avatar']; ?>" alt="Avatar" class="avatar">



 <?php echo $row2['full_name']; ?>
</p>
</a>
        <p class="movie__detail">Date : <?php echo $row2['data-time']; ?> </p>


<?php
function human_filesize($bytes, $decimals = 2) {
    $size = array('B','kB',' MB','GB','TB','PB','EB','ZB','YB');
    $factor = floor((strlen($bytes) - 1) / 3);
    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
}
$sizefinel = human_filesize(filesize('upload/'.$row2['vid_name'].''));

?>

<p class="movie__detail" id="demo">Size :  <?php echo $sizefinel ;?></p>



<p class="movie__detail"> <a href="upload/<?php echo $row2['vid_name'] ; ?>" download> <button type="button" class="btn btn-success btn-sm"><i class="fas fa-arrow-circle-down"></i> Download</button></a></p>


      <p class="movie__detail"> <?php echo '<a href="watch-video.php?uid='.$row2['mov_id'].' ">'; ?> <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-play-circle"></i> Watch</button></a></p>

    </div>
  </div>
    <div class="movie__type">WATCH </div>
</figure>
 </div> 
 <!-- end col-12 -->
 <?php 
 $flter = $row2['name_movies'];
 $categ = $row2['category'];
  ?>
        <?php } ?>

      <!-- start -->


<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
<div class="row">
<?php
        $limit = 48;
        if (isset($_GET["page"])) {
            $page = $_GET["page"];
        }
        else{
            $page=1;
        };

        $start_from = ($page-1) * $limit;

        if($categ == 'tv series')
          $moh = mysqli_query($conn,"SELECT * FROM movies WHERE `tags` LIKE '%$flt%' ORDER BY mov_id DESC LIMIT $start_from, $limit");
          while ($row = mysqli_fetch_array($moh)){
       
        ?>



        <!-- start col-2 -->
        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2" >
            <div class="card" style="background: #2a264f;" >
                <a href="watch.php">
                    <?php echo '<a href="watch.php?uid='.$row['mov_id'].' ">'; ?>
                    <div class="img1" style="background-image: url(./upload/<?php echo $row['img_name']; ?>"></div>
                    <div class="img2" style="background-image: url(./upload/<?php echo $row['img_name']; ?>"></div>
                    <div class="title" ><?php echo strtoupper($row['name_movies']); ?> </div>
                    <div class="text"><?php echo $row['about']; ?> </div>
                    <a href="#"><div class="catagory"><?php echo $row['category']; ?> <i  class="fas fa-film"></i></div></a>
                    <a href="#"><div class="views"><?php echo $row['year']; ?>  <i class="far fa-eye"></i> </div></a>
                </a>
            </div>
        </div>
        
    <!-- end col-2 -->
    <?php } ?>
   
    
</div>


<br>
    <nav aria-label="Page navigation example">

        <?php
        if($categ == 'tv series'){
        $result_db = mysqli_query($conn,"SELECT COUNT(mov_id) FROM movies ");
        }
        $row_db = mysqli_fetch_row($result_db);
        $total_records = $row_db[0];
        $total_pages = ceil($total_records / $limit);
        //echo $total_pages;
        $pagLink = "<ul class='pagination justify-content-center' >";

        for ($i=1; $i<=$total_pages; $i++) {

            $pagLink .= "<li class='page-item' >
<a class='page-link '  href='all_movies.php?page=".$i."'>".$i." <span class=\"sr-only\">(current)</span></a>
</li>";
        }



        echo $pagLink . "</ul>";

        ?>
        </nav>


</div>

<!-- end -->

      <!-- END container-fluid & ROW -->
    </div>
  </div>



<?php include_once 'footer.php' ; ?>