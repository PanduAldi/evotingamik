<div style="margin:7%">
<?php  
	include_once '../utiliti/crud_function.php';

	#reset voter 
	$query_view = $conn->query("SELECT * FROM voter WHERE status='sudah di aktivasi' OR status='sudah memilih'");
	while ($result_view = $query_view->fetch_array()) 
	{
		$id = $result_view['id_pemilih'];
		$array_obj1 = array('status'=>'belum di aktivasi');
		updateData($array_obj1, 'voter', $id, 'id_pemilih', $conn);
	}

	#reset log
	$conn->query("TRUNCATE TABLE log");

	#reset statistik
	$conn->query("TRUNCATE TABLE statistik");

	#reset waktu pemilihan
	$id = 1;
	$waktu_mulai = "00:00:00";
	$waktu_selesai = "00:00:00";
	$status = 'belum dimulai';

	$array_obj2 = array('status'=>$status, 'waktu_mulai'=>$waktu_mulai, 'waktu_selesai'=>$waktu_selesai);
	updateData($array_obj2, 'waktu_pemilihan', $id, 'id_waktu', $conn);

?>

<script>
	alert("Data Pemungutan Teah di Reset");
	location.href = "home.php";
</script>
</div>