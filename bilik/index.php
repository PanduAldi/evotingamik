<?php  
	/**
	 * developed by. Pandu Aldi P.
	 * CC. 2015
	 */

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


		<style>
			.display{
				height: 90px;
				width: 100%;
				font-size: 50px;
				text-align: center;
			}

			.tombol {
				width: 100%;
				height: 100px;
				font-size: 60px;
				text-align: center;
			}
		</style>

		<!-- jQuery -->
		<script src="../assets/jQuery-2.1.4.min.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="../assets/bootstrap/js/bootstrap.min.js"></script>

		<script>
			function addChar(input, karakter)
			{
				if(input.value == "" || input.value == 0)
					input.value = karakter;
				else
					input.value += karakter;
			}

			function backSpace(input)
			{
				input.value = input.value.substring(0, input.value.length-1)
			}
		</script>


</head>
<body>
	<div class="container">
	
<?php  
	$query_waktu = $conn->query("SELECT * FROM waktu_pemilihan WHERE id_waktu='1'");
	$result_waktu = $query_waktu->fetch_array();

	if ($result_waktu['status'] == "belum dimulai") {
		?>
			<div class="alert alert-warning" style="margin:7%">
				<h3 align="center">
					Bilik Suara Tidak Dapat Di Gunakan Karena Administrator Belum Memulai Waktu Pemilihan. <br>
				</h3>
			</div>
		<?php
	}
	elseif ($result_waktu['status'] == "pemungutan selesai") {
		?>
			<div class="alert alert-warning" style="margin:7%">
				<h3 align="center">
					Bilik Suara Tidak Dapat Di Gunakan Karena Administrator Telah Menyelesaikan Waktu Pemilihan. <br>
				</h3>
			</div>
		<?php		
	} 
	else
	{

?>	
	<center>
	<h2>MASUKAN NOMOR AKTIVASI ANDA</h2><br>

	<form action="detail_pemilih.php" method="POST">
		<table class="table table-bordered">
			<tr>
				<td colspan="3">
					<input type="text" name="display" class="display" maxlength="9" readonly="" required >
				</td>
			</tr>
			<tr>
				<td><input type="button" onclick="addChar(this.form.display, '1')" value="1" class="tombol"></td>
				<td><input type="button" onclick="addChar(this.form.display, '2')" value="2" class="tombol"></td>
				<td><input type="button" onclick="addChar(this.form.display, '3')" value="3" class="tombol"></td>
			</tr>
			<tr>
				<td><input type="button" onclick="addChar(this.form.display, '4')" value="4" class="tombol"></td>
				<td><input type="button" onclick="addChar(this.form.display, '5')" value="5" class="tombol"></td>
				<td><input type="button" onclick="addChar(this.form.display, '6')" value="6" class="tombol"></td>
			</tr>
			<tr>
				<td><input type="button" onclick="addChar(this.form.display, '7')" value="7" class="tombol"></td>
				<td><input type="button" onclick="addChar(this.form.display, '8')" value="8" class="tombol"></td>
				<td><input type="button" onclick="addChar(this.form.display, '9')" value="9" class="tombol"></td>
			</tr>
			<tr>
				<td><input type="reset" value="C" class="tombol"></td>
				<td><input type="button" onclick="addChar(this.form.display, '0')" value="0" class="tombol"></td>
				<td><button type="button" onclick="backSpace(this.form.display)" class="tombol"><i class="fa fa-long-arrow-left"></i></button></td>
			</tr>
			<tr>
				<td colspan="3"><button type="submit"name="submit" class="tombol"><i class="fa fa-sign-in"></i> Lanjutkan</button></td>
			</tr>
		</table>
	</form>
	</center>
	<?php  
	}
	?>
</div>				

<footer>
	<hr />
	<p align="right"> <b>IT Team</b> AMIK YMI Tegal. Developed By. Pandu Aldi P.</p>
	<p align="right"> Copyright &copy; <?php echo date("Y") ?>. Powered By. <b>Bootstrap</b></p>
</footer>

	<!-- script Data table -->
	<script src="../assets/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
	<script src="../assets/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>

</body>
</html>





