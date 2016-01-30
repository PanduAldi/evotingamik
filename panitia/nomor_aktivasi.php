<?php  
	include "../utiliti/crud_function.php";

	# declare var GET method from no_aktivasi
	$id = isset($_GET['id'])?$_GET['id']:null;

	# query u/ menampilkan nomor aktivasi
	$query_no_aktivasi  = $conn->query("SELECT * FROM voter WHERE id_pemilih='$id'");
	$result_no_aktivasi = $query_no_aktivasi->fetch_array();
	
	#dapatkan nomor aktivasi

	#update status pemilih
	$array_obj = array('status'=>'sudah di aktivasi');
	updateData($array_obj, 'voter', $id, 'id_pemilih', $conn);
?>

<h1 align="center">NOMOR AKTIVASI <?php echo strtoupper($result_no_aktivasi['nama']) ?> </h1>
<br>
<br>
<?php 
if ($result_no_aktivasi['no_aktivasi'] == "") {
	#input no aktivasi
	$acak = rand(111111111, 999999999);
	$array_obj2 = array('no_aktivasi' => $acak);
	updateData($array_obj2, 'voter', $id, 'id_pemilih', $conn);

	echo "<h2 align='center'><a href='?page=nomor_aktivasi&id=$id' class='btn btn-lg btn-primary'>Klik Disini Untuk Melihat Nomor Aktivasi</a></h2>";
}
else
{
	?>
		<p style="font-size:80px" align="center"><?php echo $result_no_aktivasi['no_aktivasi'] ?></p>
	<?php
}	
?>
<br>
<br>
<h3 align="center">
	Catat Nomor Pada Kertas Yang Telah Di Sediakan Dan Berikan Ke Pemilih <br>
	Klik Tombol Di Bawah Ini Untuk Kembali Ke Halaman Utama.
</h3>
<br>
<h4 align="center"><a href="home.php" class="btn btn-lg btn-success"> Kembali Ke Menu Utama</a></h4>

