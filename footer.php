<!-- Footer -->
<br>
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
			
			<span>Copyright &copy;  <img src="style/img/IMG_3756(1).png" alt="" width="20" height="20"> Your Arya.systems <?php echo date("Y"); ?> </span>
<div class="text-right">
<small><i class="fas fa-map-marker-alt"></i> <span id="country"> </span> : الدولة <span id="state"></span> : المدينة   </small>
			</div>
			<p class="text-left"><a href="contact.php">Contact us ..  أتصل بنا</a></p>
        </div>

    </div>
</footer>
<!-- End of Footer -->
<!-- Bootstrap core JavaScript-->
<script src="style/vendor/jquery/jquery.min.js"></script>

<script src="style/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<!-- Core plugin JavaScript-->
<script src="style/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="style/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="style/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="style/js/demo/chart-area-demo.js"></script>
<script src="style/js/demo/chart-pie-demo.js"></script>
<script src="style/js/insert-chat.js"></script>
<script>
	$.ajax({
		url: "https://geoip-db.com/jsonp",
		jsonpCallback: "callback",
		dataType: "jsonp",
		success: function( location ) {
			$('#country').html(location.country_name);
			$('#countrycode').html(location.country_code);
			$('#state').html(location.state);
			$('#city').html(location.city);
			$('#latitude').html(location.latitude);
			$('#longitude').html(location.longitude);
			$('#ipv4').html(location.IPv4);  
		}
	});		
    </script>
</body>

</html>
<?php mysqli_close($conn); ?>