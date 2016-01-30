<?php  

	include "../utiliti/crud_function.php";

	# declare vaiable dari method form
	$nim  	= isset($_POST['nim'])?$_POST['nim']:null;
	$nama 	= isset($_POST['nama'])?$_POST['nama']:null;
	$prodi	= isset($_POST['prodi'])?$_POST['prodi']:null;
	$visi 	= isset($_POST['visi'])?$_POST['visi']:null;



	 if (isset($_POST['simpan'])) 
	 {
	 	#declare var file
	 	$temp	 = $_FILES['foto']['tmp_name'];
	 	$format	 = $_FILES['foto']['type'];
	 	$foto    = $_FILES['foto']['name'];
	 	$dir 	 = "../img/$foto";

	 	# declare varible for delete image
	 	$dir_del = "../img/$fecth_data[img]";

	 	# kondisi jika foto tidak di ubah
	 	if (((!$temp) || (!$id))) 
	 	{
	 		# eksekusi query update
	 		$array_obj    = array(
	 								'nim' 	   => $nim,
	 								'nama'	   => $nama,
	 								'prodi'	   => $prodi,
	 								'visi' 	   => $visi  
	 							 ); 
	 		$query_update = updateData($array_obj, 'calon', $id, 'id_calon', $conn);
	 		$query_update;

	 		if ($query_update) {
				?>
					<script>
						alert("Data Berhasil di Update");
						location.href = "?page=master&ref=data_calon";
					</script>
				<?php	 			
	 		}
				

	 	}
	 	else
	 	{
	 		if ($format == "image/jpeg" || $format == "image/jpg" || $format == "image/png" || $format == "image/JPG") 
	 		{
	 			if (move_uploaded_file($temp, $dir) && unlink($dir_del)) 
	 			{
	 				#execute query update with upload image
	 				$array_obj 	= array(
	 										'nim'	   => $nim,
	 										'nama' 	   => $nama,
	 										'prodi'    => $prodi,
	 										'visi' 	   => $visi,
	 										'img'      => $foto
	 								   );

	 				$query_update = updateData($array_obj, 'calon', $id, 'id_calon', $conn);
	 				$query_update;
	 					?>
	 					<script>
	 						alert("Data berhasi di Update");
	 						location.href = "?page=master&ref=data_calon";
	 					</script>
	 					<?php
	 			}
	 			else
	 			{
	 				echo "<script>alert('gagal proses upload')</script>";
	 			}
	 		}
	 		else
	 		{
	 			echo '<script> alert("Format Salah") </script>';
	 		}
	 	}
	 }
?>