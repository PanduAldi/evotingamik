<?php  
	include_once '../utiliti/crud_function.php';

	#declare variable 
	$nim 		= isset($_POST['nim'])?$_POST['nim']:null;
	$nama 		= isset($_POST['nama'])?$_POST['nama']:null;
	$aktivasi 	= rand();
	$status 	= "belum di aktivasi";

	if (isset($_POST['simpan'])) 
	{
		#eksekusi quey insert 
		$array_obj 	= array(
							 'id_pemilih'	=> '',
							 'nim' 			=> $nim,
							 'nama' 		=> $nama,
							 'no_aktivasi'	=> $aktivasi,
							 'status'		=> $status
						   );

		$query_insert = insertData($array_obj, 'voter', $conn);
		$query_insert;

		if ($query_insert) 
		{
			?>
			<div class="alert alert-success">
				Data Pemilih Berhasil di Tambahkan. Silahkan KLIK <a href="?page=master&ref=data_pemilih">Disini</a> Untuk Kembali.
			</div>
			<?php
		}
	}


?>