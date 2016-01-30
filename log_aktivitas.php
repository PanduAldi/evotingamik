<?php  
	include_once 'utiliti/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="refresh" content="3">
	<title>
		HALAMAN PEMILIHAN
	</title>
		<!-- Bootstrap CSS -->
		<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<!-- font awesome -->
		<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<!-- dataTable -->
		<link rel="stylesheet" href="assets/plugins/datatables/dataTables.bootstrap.min.css">

		<style>
			.kotak1{
				background-color : #F2DEDE;
				padding: 8px;
			}
			.kotak2{
				background-color : #FCF8E3;
				padding: 8px;
			}
			.kotak3{
				background-color : #DFF0D8;
				padding: 8px;
			}

			.text {
				padding: 8px;
			}
		</style>

		<!-- jQuery -->
		<script src="assets/jQuery-2.1.4.min.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="assets/bootstrap/js/bootstrap.min.js"></script>


</head>
<body>
<div class="container">  
				<h2 align="center">Halaman Aktifitas Pemilihan</h2>
				<hr>
				<br>
				<center>
					<table class="table table-bordered">
						
					<?php  
						$query_view = $conn->query("SELECT * FROM voter ORDER BY id_pemilih");
						while ($result_view = $query_view->fetch_array()) {
							?>
											<tr>
											<?php  
												if ($result_view['status'] == "belum di aktivasi") 
												{
													echo '<td class="warning">'.$result_view['nama'].'</td>';
												}
												elseif ($result_view['status'] == "sudah di aktivasi") {
													echo '<td class="success">'.$result_view['nama'].'</td>';
												}
												elseif ($result_view['status'] == "sudah memilih") {
													echo '<td class="danger">'.$result_view['nama'].'</td>';
												}
												?>
												</tr>

							<?php
						}
					?>
						
					</table>
				</center>

	<div align="right">
					<table>
						<tr>
							<td><p class="kotak1">Warna</p></td>
							<td><p class="text"><b>:</b></p></td>
							<td><p class="text"><b>Sudah Memilih</b></p></td>
						</tr>
						<tr>
							<td><p class="kotak2">Warna</p></td>
							<td><p class="text"><b>:</b></p></td>
							<td><p class="text"><b>Belum di Aktivasi</b></p></td>
						</tr>
						<tr>
							<td><p class="kotak3">Warna</p></td>
							<td><p class="text"><b>:</b></p></td>
							<td><p class="text"><b>Sudah Di Aktivasi</b></p></td>
						</tr>
					</table>
	</div>
</div>
<footer>
	<hr />
	<p align="right"> <b>IT Team</b> AMIK YMI Tegal. </p>
	<p align="right"> Copyright &copy; <?php echo date("Y") ?>. Powered By. <b>Bootstrap</b></p>
</footer>
	<!-- script Data table -->
	<script src="assets/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
	<script src="assets/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>

</body>
</html>