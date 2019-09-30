<?php 
include './inc/function_session.php';
include_once 'inc/header.php';
echo '<body id="page-top">';
include_once 'inc/dbconnected.php';
include_once 'inc/navbar.php';

?>
<style>

</style>


<div class="container" >

<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">

<span class="custom-dropdown small">
    <select>
        <option>Select</option>
        <option onclick="selectPopular()">Popular</option>
            <option onclick="selectAction()">Action</option>
            <option onclick="selectFamily()">Family</option>
            <option onclick="selectDrama()">Drama</option>
            <option onclick="selectComedy()">Comedy</option>
            <option onclick="selectFantasy()">Fantasy</option>
            <option onclick="selectHorror()">Horror</option>
            <option onclick="selectWar()">War</option>
            <option onclick="selectMystery()">Mystery</option>
            <option onclick="selectRomance()">Romance</option>
            <option onclick="selectHistory()">History</option>
            <option onclick="selectWesterm()">Westerm</option>
            <option onclick="selectAnimation()">Animation</option>
            <option onclick="selectMusical()">Musical</option>
            <option onclick="selectIndian()">Indian</option>
            <option onclick="selectTürkçe()">Türkçe</option>
            <option onclick="selectArabic()">Arabic</option>
            <option onclick="selectKurdish()">Kurdish</option>
    </select>
</span>

<hr>
</div>
<script>
function selectPopular() {
  window.location.assign("result-select.php?select=Popular")
}

function selectAction() {
  window.location.assign("result-select.php?select=Action")
}
function selectFamily() {
  window.location.assign("result-select.php?select=Family")
}
function selectDrama() {
  window.location.assign("result-select.php?select=Drama")
}
function selectComedy() {
  window.location.assign("result-select.php?select=Comedy")
}
function selectFantasy() {
  window.location.assign("result-select.php?select=Fantasy")
}
function selectHorror() {
  window.location.assign("result-select.php?select=Horror")
}
function selectWar() {
  window.location.assign("result-select.php?select=War")
}
function selectMystery() {
  window.location.assign("result-select.php?select=Mystery")
}
function selectRomance() {
  window.location.assign("result-select.php?select=Romance")
}
function selectHistory() {
  window.location.assign("result-select.php?select=History")
}
function selectWesterm() {
  window.location.assign("result-select.php?select=Westerm")
}

function selectAnimation() {
  window.location.assign("result-select.php?select=Animation")
}
function selectMusical() {
  window.location.assign("result-select.php?select=Musical")
}
function selectIndian() {
  window.location.assign("result-select.php?select=Indian")
}
function selectTürkçe() {
  window.location.assign("result-select.php?select=Türkçe")
}
function selectArabic() {
  window.location.assign("result-select.php?select=Arabic")
}
function selectKurdish() {
  window.location.assign("result-select.php?select=Kurdish")
}

</script>
    <div class="row" >
    <?php
        $limit = 48;
        if (isset($_GET["page"])) {
            $page = $_GET["page"];
        }
        else{
            $page=1;
        };
        $start_from = ($page-1) * $limit;
        $mysql = "SELECT * FROM movies WHERE `category` LIKE 'tv series' ORDER BY mov_id DESC LIMIT $start_from, $limit";
        $result = $conn->query($mysql);

        if ($result->num_rows > 0) {
          while($row = $result->fetch_array()) {
            echo '<div class="col-sm-12 col-md-2 col-lg-2 col-xl-2" >
            <div class="card" style="background: #2a264f;" >
                <a href="watch.php">
                  <a href="watch.php?uid='.$row['mov_id'].' ">
                    <div class="img1" style="background-image: url(./upload/'.$row['img_name'].'"></div>
                    <div class="img2" style="background-image: url(./upload/'.$row['img_name'].'"></div>
                    <div class="title" >'.$row['name_movies'].'</div>
                    <div class="text">'.$row['about'].'</div>
                    <a href="#"><div class="catagory"><i  class="fas fa-film"></i> '.$row['category']. '</div></a>
                    <a href="#"><div class="views"><i class="far fa-calendar-alt"></i>   '.$row['year']. '</div></a>
                </a>
            </div>
        </div>';
          } 
    
    } else {
      echo '
      <div class="container"><br><br>
      <div  style="background-color: #f7f7f7;" class="jumbotron">
        <h1>There are no posts</h1>      
        <p>There are no posts .. لا توجد اي منشوارات </p>
      </div>

    </div>';
    }
    
 ?>


<!-- END container-fluid & ROW -->
    </div>
    <br>
    <hr>
<br>
    <nav aria-label="Page navigation example">

        <?php
        $result_db = mysqli_query($conn,"SELECT COUNT(mov_id) FROM movies ");
        $row_db = mysqli_fetch_row($result_db);
        $total_records = $row_db[0];
        $total_pages = ceil($total_records / $limit);
        //echo $total_pages;
        $pagLink = "<ul class='pagination justify-content-center' >";

        for ($i=1; $i<=$total_pages; $i++) {

            $pagLink .= "<li class='page-item' >
<a class='page-link '  href='all_show_tv.php?page=".$i."'>".$i." <span class=\"sr-only\">(current)</span></a>
</li>";
        }

   echo $pagLink . "</ul>";
 
        ?>
        </nav>
    <!-- END container-fluid & ROW -->
  </div>





  <?php include_once 'footer.php' ; ?>