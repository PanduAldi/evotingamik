<?php  
	/**
	 * developed by. Pandu Aldi P.
	 * CC. 2015
	 */
	error_reporting(E_ALL^E_NOTICE);

	session_start();
	include_once '../utiliti/koneksi.php';

	if (!$_SESSION['user'] || !$_SESSION['pass'] || !$_SESSION['level']) 
	{
		?>
			<script type="text/javascript">
				alert("Maaf !!! Anda Harus Login Dulu");
				location.href="login.php";
			</script>
		<?php
	}
	else
	{

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		<?php  
			if (empty($_GET['ref'])) {
				echo ucwords($_GET['page']);
			} 
			elseif(isset($_GET['page']) && isset($_GET['ref'])) {
				echo ucwords($_GET['page'])." | ".ucwords($_GET['ref']);
			} 
			else{
				echo "Panel Administrator";
			}
		?>
	</title>
		<!-- Bootstrap CSS -->
		<link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<!-- font awesome -->
		<link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
		<!-- dataTable -->
		<link rel="stylesheet" href="../assets/plugins/datatables/dataTables.bootstrap.min.css">

		<!-- jQuery -->
		<script src="../assets/jQuery-2.1.4.min.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="../assets/bootstrap/js/bootstrap.min.js"></script>


</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="#">Administrator E-Voting</a>
	</div>

	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav navbar-left">
			<li class="active"><a href="?page=dashboard"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="?page=master"><i class="fa fa-server"></i> Data Master</a></li>
			<li><a href="?page=statistik"><i class="fa fa-bar-chart"></i> Data Statistik</a></li>
		</ul>

		<ul class="nav navbar-nav navbar-right">
			<li> <a href="logout.php" onclick="return confirm('Anda Yakin Logout')"><i class="fa fa-sign-out"></i> Logout <b class="caret"></b></a> </li>
		</ul>
	</div><!-- /.navbar-collapse -->
</nav>

<?php  
	$page = isset($_GET['page'])?$_GET['page']:null;
	switch ($page) {
		default:
			?>
			<!-- Halaman Dashboard -->
			<div class="container">
				<div style="margin:8%">
					<div class="jumbotron">
						<div class="container">
							<h2>Hallo, <?php echo ucwords($_SESSION['user']) ?></h2>
							<p>Selamat Datang di Panel Administrator E-Voting</p>
							<p><small>Silahkan Pilih Menu Navigasi Untuk Memulai Mengolah Data</small></p>
								<a class="btn btn-primary btn-lg">Learn more</a>
							</p>
						</div>
					</div>
					<div class="jumbotron">
						<div class="container">
							<h2>AKTIVITAS PEMUNGUTAN SUARA</h2>
							<p>Administrator memiliki hak sepenuhnya atas aktivitas pemungutan suara. Silahkan anda Klik tombol dibawah untuk Memulai, Menyelesaikan, Mereset Pemungutan suara</p>
									<?php  
										$query_waktu = $conn->query("SELECT * FROM waktu_pemilihan");
										$result_waktu = $query_waktu->fetch_array();
										$disabled = 'disabled';
										
										if ($result_waktu['status'] == "belum dimulai") {
											?>
													<a href="?page=mulai" onclick="return confirm('KLIK OK Untuk Memulai Pemilihan')" class="btn btn-lg btn-primary" > MULAI PEMUNGUTAN </a>
													<a href="?page=selesai" onclick="return confirm('Anda Yakin Untuk Menyelesaikan Pemungutan Suara. Klik OK Untuk Melanjutkan')"  class="btn btn-lg btn-success disabled" > SELESAIKAN PEMUNGUTAN </a>
													<a href="?page=reset" onclick="return confirm('Perlu Anda Ingat Segala Proses Pemungutan Suara Akan Di Reset. Klik OK Untuk Melanjutkan')" class="btn btn-lg btn-danger" > RESET PEMUNGUTAN SUARA </a>
											<?php		
										}
										elseif ($result_waktu['status'] == "sedang dimulai") 
										{
											?>
													<a href="?page=mulai" onclick="return confirm('KLIK OK Untuk Memulai Pemilihan')" class="btn btn-lg btn-primary disabled" > MULAI PEMUNGUTAN </a>
													<a href="?page=selesai" onclick="return confirm('Anda Yakin Untuk Menyelesaikan Pemungutan Suara. Klik OK Untuk Melanjutkan')"  class="btn btn-lg btn-success" > SELESAIKAN PEMUNGUTAN </a>
													<a href="?page=reset" onclick="return confirm('Perlu Anda Ingat Segala Proses Pemungutan Suara Akan Di Reset. Klik OK Untuk Melanjutkan')" class="btn btn-lg btn-danger disabled" > RESET PEMUNGUTAN SUARA </a>
											<?php		
										}
										elseif ($result_waktu['status'] == "pemungutan selesai") 
										{
											?>
													<a href="?page=mulai" onclick="return confirm('KLIK OK Untuk Memulai Pemilihan')" class="btn btn-lg btn-primary disabled" > MULAI PEMUNGUTAN </a>
													<a href="?page=selesai" onclick="return confirm('Anda Yakin Untuk Menyelesaikan Pemungutan Suara. Klik OK Untuk Melanjutkan')"  class="btn btn-lg btn-success disabled" > SELESAIKAN PEMUNGUTAN </a>
													<a href="?page=reset" onclick="return confirm('Perlu Anda Ingat Segala Proses Pemungutan Suara Akan Di Reset. Klik OK Untuk Melanjutkan')" class="btn btn-lg btn-danger" > RESET PEMUNGUTAN SUARA </a>
												 	<p>Jika Pemungutan Selesai Anda Harus Mereset Ulang Pemungutan Suara. Karena Data Pemungutan Sudah Masuk Perhitungan Suara Dan Pemungutan Tidak Dapat Dilanjutkan</p>
											<?php					
										}
									?>
							
						</div>
					</div>
				</div>
			</div>
			<?php
			break;

		case 'master':
			include_once 'page/master_data.php';
			break;

		case 'statistik':
			include_once 'page/data_statistik.php';
			break;

		case 'mulai':
			include_once 'controller/mulai_pemungutan.php';
			break;

		case 'selesai':
			include_once 'controller/selesai_pemungutan.php';
			break;

		case 'reset':
			include_once 'controller/reset_pemungutan.php';
			break;
	}
?>
<footer>
	<hr />
	<p align="right"> <b>IT Team</b> AMIK YMI Tegal. Developed By. <a href="https://www.facebook.com/PanduAldiaja">Pandu Aldi Pratama</a>.</p>
	<p align="right"> Copyright &copy; <?php echo date("Y") ?>. Powered By. <b>Bootstrap</b></p>
</footer>

	<!-- script Data table -->
	<script src="../assets/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
	<script src="../assets/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>

	<!-- CKEDITOR -->
	<script src="../assets/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>

</body>
</html>
<?php  	
}
?>