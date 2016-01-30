<?php
	include_once '../utiliti/koneksi.php';  
	include_once "../utiliti/crud_function.php";

	//declare variable
	$nim 	= isset($_POST['nim'])?$_POST['nim']:null;
	$nama	= isset($_POST['nama'])?$_POST['nama']:null;
	$prodi  = isset($_POST['prodi'])?$_POST['prodi']:null;
	$visi	= isset($_POST['visi'])?$_POST['visi']:null;

	if (isset($_POST['simpan'])) 
	{
		# declare var foto 
		$temp 	= $_FILES['foto']['tmp_name'];
		$format = $_FILES['foto']['type'];
		$foto 	= $_FILES['foto']['name'];
		$dir 	= "../img/$foto";

		if ($temp == "") 
		{
			$array_param = array(
								  'id_calon'=>'',
								  'nim'	 	=>$nim,
								  'nama' 	=>$nama,
								  'prodi'	=>$prodi,
								  'visi' 	=>$visi  
								);	

			// declare var yang mendefinisikan function insert
			$query_simpan = insertData($array_param, 'calon', $conn);

			$query_simpan;

			if ($query_simpan) 
			{
				?>
				<div class="alert alert-success">
					<strong>Berhasil!</strong> Calon berhasil di tambahkan .. klik <a href="?page=master&ref=data_calon">Disini</a> Untuk Kembali
				</div>
				<?php
			}
			else
			{
				?>
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					Gagal Tambah Data
				</div>				
				<?php				
			}
		}
		else
		{
			if ($format == "image/jpeg" || $format == "image/jpg" || $format == "image/png" || $format == "image/JPG") 
			{
				if (move_uploaded_file($temp, $dir)) 
				{
					$array_param = array(
										  'id_calon'=>'',
										  'nim'	 	=>$nim,
										  'nama' 	=>$nama,
										  'prodi'	=>$prodi,
										  'visi' 	=>$visi,
										  'img'		=>$foto
										);	

					// declare var yang mendefinisikan function insert
					$query_simpan = insertData($array_param, 'calon', $conn);

					$query_simpan;

					if ($query_simpan) 
					{
						?>
						<div class="alert alert-success">
							<strong>Berhasil!</strong> Calon berhasil di tambahkan .. klik <a href="?page=master&ref=data_calon">Disini</a> Untuk Kembali
						</div>
						<?php
					}
					else
					{
						?>
						<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							Gagal Tambah Data
						</div>				
						<?php				
					}					
				}
				else
				{
					echo "Gagal Upload";
				}
			}
			else
			{
				?>
				<script>
					alert("Format Gambar Salah");
				</script>
				<?php
			}
		}
	}

?>