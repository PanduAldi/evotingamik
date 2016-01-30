<?php  
	include_once '../utiliti/crud_function.php';

	$id = 1;
	$waktu_mulai = date("H:i:s");
	$status		 = "sedang dimulai";

	#eksekusi query
	$array_obj = array('status' => $status, 'waktu_mulai' => $waktu_mulai);
	updateData($array_obj, 'waktu_pemilihan', $id, 'id_waktu', $conn);

?>
<script>
	alert("Pemungutan Suara di Mulai");
	location.href = "home.php";
</script>