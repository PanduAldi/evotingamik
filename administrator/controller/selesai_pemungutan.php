<div style="margin:7%">
<?php  
	include_once '../utiliti/crud_function.php';

	$id = 1;
	$waktu_selesai = date("H:i:s");
	$status = "pemungutan selesai";

	#eksekusi query
	$array_obj = array('status'=>$status, 'waktu_selesai'=>$waktu_selesai);
    updateData($array_obj, 'waktu_pemilihan', $id, 'id_waktu', $conn);

	#input data statistik : 
	$query_calon = $conn->query("SELECT * FROM calon");

	while ($result_calon = $query_calon->fetch_array()) 
	{
		$id_calon = $result_calon['id_calon'];
		$query_log = $conn->query("SELECT * FROM log WHERE id_calon = '$id_calon'");
		$hitung_log = $query_log->num_rows;

		$array_obj1 = array('id_statistik'=>'','id_calon'=>$id_calon, 'jum_suara'=>$hitung_log);
	    insertData($array_obj1, 'statistik', $conn);
	}

	# mengitung prosentase data 
	$query_jum = $conn->query("SELECT SUM(jum_suara) AS jumlah_suara FROM statistik");
	$result_jum = $query_jum->fetch_array();
	$jumlah = $result_jum['jumlah_suara'];

	$query_prosentase = $conn->query("SELECT * FROM statistik");
	while ($result_prosentase = $query_prosentase->fetch_array()) 
	{
		$id_calon = $result_prosentase['id_calon'];
		$jum_temp = $result_prosentase['jum_suara'];

		#hitung prosentase
		$prosentase = $jum_temp*100/$jumlah;

		$array_obj2 = array('prosentase'=>$prosentase);
	    updateData($array_obj2, 'statistik', $id_calon, 'id_calon', $conn);
	}


?>
</div>
<script>
	alert("Pemungutan Suara Selesai. Silahkan ke Menu Data Statistik untuk melihat perolehan Suara");
	location.href = "home.php";
</script>