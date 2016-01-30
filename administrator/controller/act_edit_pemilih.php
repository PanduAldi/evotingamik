<?php  

	include "../utiliti/crud_function.php";

	# declare vaiable dari method form
	$nim  	= isset($_POST['nim'])?$_POST['nim']:null;
	$nama 	= isset($_POST['nama'])?$_POST['nama']:null;

	 if (isset($_POST['simpan'])) 
	 {
	 	#eksekusi query update
	 	$array_obj 	= array(
	 							'nim' 		 => $nim,
	 							'nama' 		 => $nama
	 						);

	 	$query_update = updateData($array_obj, 'voter', $id, 'id_pemilih', $conn);
	 	$query_update;

	 	if ($query_update) 
	 	{
			?>
			<div class="alert alert-success">
				Data Pemilih Berhasil di Update. Silahkan KLIK <a href="?page=master&ref=data_pemilih">Disini</a> Untuk Kembali.
			</div>
			<?php	 		
	 	}
	 }
?>