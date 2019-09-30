<?php
include './inc/function_session.php';
include_once 'inc/dbconnected.php';
include_once 'inc/header.php';
echo '<body id="page-top">';
// include_once 'inc/dbconnected.php';
// include_once 'inc/navbar.php';
?>
  <!-- Page Wrapper -->
  <div id="wrapper">

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
  echo '<script>window.location.assign("index.php")</script>';
}
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- 404 Error Text -->
          <div class="text-center">
            <br>  <br>  <br>  <br>  <br>  <br>
            <div class="error mx-auto" data-text="Error">Error</div>
            <p class="lead text-gray-800 mb-5">License expired  أنتهاء فترة الترخيص</p>
            <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
            <a href="">&larr; Back to Dashboard</a>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
			<span>Copyright &copy;  <img src="style/img/IMG_3756(1).png" alt="" width="20" height="20"> Your Arya.systems <?php echo date("Y"); ?> </span>

        </div>

    </div>
</footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>