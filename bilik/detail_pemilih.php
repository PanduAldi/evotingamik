<?php  
	session_start();
	include_once '../utiliti/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		AKTIVASI PEMILIH
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

<?php  
	if (isset($_POST['submit'])) {
		$no_aktv = isset($_POST['display'])?$_POST['display']:null;
		$query_view = $conn->query("SELECT * FROM voter WHERE no_aktivasi = '$no_aktv'");
		$cek = $query_view->num_rows;
		$result = $query_view->fetch_array();

		if ($cek > 0) {
			#cek apkah sudah memilih
			if ($result['status'] == 'belum di aktivasi') {
				echo '<script> alert("NOMOR YANG ANDA MASUKAN BELUM DI AKTIVASI"); location.href="index.php"</script>';
			} 
			elseif ($result['status'] == "sudah memilih") {
				echo '<script> alert("NOMOR YANG ANDA MASUKAN SUDAH DI GUNAKAN UNTUK MEMILIH."); location.href="index.php"</script>';
			}
			else
			{
				$_SESSION['no_aktv'] = $no_aktv;

				?>
				<center>
					<div style="margin:8%; border:10px">
						<h1>VERIFIKASI DATA ANDA</h1>
						<h2>NIM : <?php echo ucwords($result['nim']) ?></h2>
						<h2>NAMA : <?php echo ucwords($result['nama']) ?></h2>
						<h2><a href="home.php" class="btn btn-lg btn-primary"> Lanjutkan Jika Benar </a></h2>
					</div>
				</center>
				<?php
			}		
		} else {
			echo '<script> alert("NOMOR YANG ANDA MASUKAN SALAH SILAHKAN ULANGI KEMBALI"); location.href="index.php"</script>';
		}
	}

?>
	<!-- script Data table -->
	<script src="../assets/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
	<script src="../assets/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>

</body>
</html>
