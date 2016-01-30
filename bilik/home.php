<?php  
	session_start();
	include_once '../utiliti/koneksi.php';

	if (!$_SESSION['no_aktv']) {
		?>
			<script type="text/javascript">
				alert("Maaf !!! Anda Harus Memasukan Nomor Aktivasi Terlebih Dahulu.");
				location.href="index.php";
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
	<?php  
		if (isset($_GET['page']) == "selesai") {
			?>
			<meta http-equiv="refresh" content="5;index.php">
			<?php
		}
	?>
	<title>
		HALAMAN PEMILIHAN
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
<div class="container">
	<?php  
		$page = isset($_GET['page'])?$_GET['page']:null;
		switch ($page) {
			default:
				?>
				<h1 align="center">Selamat Datang Di E-Voting PERMIRA AMIK YMI Tegal</h1>
				<h4 align="center">Silahkan Pilih Calon Ketua BEM menurut Hati Nurani Anda</h4>
				<hr>
				<br>
				<center>
					<table class="table table-bordered">
						<tr>
					<?php  
						$query_view = $conn->query("SELECT * FROM calon ORDER BY id_calon");
						while ($result_view = $query_view->fetch_array()) {
							?>
								<td align="center">
									<table>
										<tr>
											<td><img src="../img/<?php echo $result_view['img'] ?>" alt="" width="250" height="350"></td>
										</tr>
										<tr>
											<td align="center">
												<h3><b><?php echo strtoupper($result_view['nama']) ?></b></h3>
												<h3>Visi Dan Misi : </h3>
												<h4><?php echo strtoupper($result_view['visi']) ?></h4>	
												<a href="?page=selesai&id=<?php echo $result_view['id_calon'] ?>" onclick="return confirm('Anda Yakin Memilih <?php echo ucwords($result_view['nama']) ?>')" class="btn btn-lg btn-primary"><i class="fa fa-check"></i> PILIH</a>
											</td>
										</tr>
									</table>
								</td>
							<?php
						}
					?>
						</tr>
					</table>
				</center>
				<?php
				break;

				case 'selesai':
					include_once 'selesai.php';
					break;
		}
	?>

</div>
<footer>
	<hr />
	<p align="right"> <b>IT Team</b> AMIK YMI Tegal. </p>
	<p align="right"> Copyright &copy; <?php echo date("Y") ?>. Powered By. <b>Bootstrap</b></p>
</footer>
	<!-- script Data table -->
	<script src="../assets/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
	<script src="../assets/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>

</body>
</html>
<?php  
}
?>
