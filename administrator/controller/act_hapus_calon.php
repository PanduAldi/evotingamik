<?php  
	include_once '../utiliti/koneksi.php';
	include_once '../utiliti/crud_function.php';

	// Ambil parameter
	$id = isset($_GET['id'])?$_GET['id']:null;
	$query 		= $conn->query("SELECT img FROM calon WHERE id_calon='$id'");
	$fetch_data	= $query->fetch_array();
	$dir 		= "../img/$fetch_data[img]";

	//hapus file foto
	unlink($dir);

	// eksekusiquery
	$query_del = deleteData('calon', 'id_calon', $id, $conn);
	$query_del;

	if ($query_del) {
		?>
		<script>
			alert("Data Berhasil di Hapus !!");
			location.href = "?page=master&ref=data_calon";
		</script>
		<?php
	}
?>