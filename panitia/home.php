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
		Halaman Panitia
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
	<div style="margin:7%">
		<?php  
			$query_waktu = $conn->query("SELECT * FROM waktu_pemilihan WHERE id_waktu='1'");
			$result_waktu = $query_waktu->fetch_array();

		if ($result_waktu['status'] == "belum dimulai") {
			?>
				<div class="alert alert-warning" style="margin:7%">
					<h3 align="center">
						Halaman Ini Tidak Dapat Di Gunakan Karena Administrator Belum Memulai Waktu Pemilihan. <br>
					</h3>
				</div>
			<?php
		}
		elseif ($result_waktu['status'] == "pemungutan selesai") 
		{
			?>
				<div class="alert alert-denger" style="margin:7%">
					<h3 align="center">
						Halaman Ini Tidak Dapat Di Gunakan Karena Pemungutan Suara Telah Selesai. <br>
					</h3>
				</div>
			<?php
		}
		else
		{
		$page = isset($_GET['page'])?$_GET['page']:null;
		switch ($page) {
			default:
				?>
				<blockquote>
					<h2>Hallo, <?php echo $_SESSION['user'] ?></h2>
					<h4>ini adalah halaman panitia yang digunakan untuk mengelola aktivasi Daftar Pemilih.</h4>
					<h4>Pastikan data pemilih yang anda aktivasi adalah benar.</h4>
					<p><small>Klik tombol aktivasi setiap kali mengaktivasi Pemilih</small></p>
				</blockquote>
				<div class="table-reponsive">
					<table class="table table-bordered" id="datatable">
						<thead>
							<tr>
								<th>NIM</th>
								<th>Nama</th>
								<th>Aktivasi</th>
							</tr>
						</thead>
						<tbody>
							<?php  
								$query_view = $conn->query("SELECT * FROM voter ORDER BY nim");
								while ($result_view = $query_view->fetch_array()) 
								{
									?>
									<tr>
										<td><?php echo $result_view['nim'] ?></td>
										<td><?php echo $result_view['nama'] ?></td>
										<td>
											<?php  
												if ($result_view['status'] == "belum di aktivasi") {
													?>
													<a href="?page=nomor_aktivasi&id=<?php echo $result_view['id_pemilih'] ?>" class="btn btn-block btn-primary" title="" align="center"> Aktivasi Pemilih </a>
													<?php
												}
												else{
													echo $result_view['status'];
												}
											?>
										</td>
									</tr>
									<?php
								}
							?>
						</tbody>
					</table>
				</div>				
				<?php
				break;

			case 'nomor_aktivasi':
				include_once 'nomor_aktivasi.php';
				break;
		}

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
	<script>
		$(document).ready(function() {
			$('#datatable').dataTable();
		});
	</script>

</body>
</html>
<?php  	
}
?>




