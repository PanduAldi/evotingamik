<?php  
	include_once '../utiliti/koneksi.php';
	include_once '../utiliti/crud_function.php';

	// Ambil parameter
	$id = isset($_GET['id'])?$_GET['id']:null;

	// eksekusiquery
	$query_del = deleteData('voter', 'id_pemilih', $id, $conn);
	$query_del;

	if ($query_del) {
		?>
		<script>
			alert("Data Berhasil di Hapus !!");
			location.href = "?page=master&ref=data_pemilih";
		</script>
		<?php
	}
?>