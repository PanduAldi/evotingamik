<?php  
	include_once '../utiliti/excel_reader.php';
	include_once '../utiliti/crud_function.php';

	if (isset($_POST['importProses'])) 
	{
		# upload file
		$target = basename($_FILES['file_import']['name']);
		move_uploaded_file($_FILES['file_import']['tmp_name'], $target);

		# instansiasi obj
		$data  	= new Spreadsheet_Excel_Reader($_FILES['file_import']['name'], false);

		# count num row
		$count = $data->rowcount($sheet_index=0);

		#validasi truncate (menghapus semua data di db)
		if (isset($_POST['del_all']) == 1) 
		{
			$conn->query('TRUNCATE TABLE voter');
		}

		#import file 
		$status	  = "belum di aktivasi";


		for ($i=2; $i < $count; $i++) { 
			# eksekusi query
			$array_obj = array(
								 'id_pemilih' => '',
								 'nim' => $data->val($i, 1),
								 'nama'=> $data->val($i, 2),
								 'status' => $status
							  );

			$query_import = insertData($array_obj, 'voter', $conn);
			$query_import;
		}

		if ($query_import) 
		{
			?>
			<div class="alert alert-success">
				<p>Data berhasil di Import .. Klik <a href="?page=master&ref=data_pemilih">Disini</a> untuk kembali</p>
			</div>
			<?php			
		}

		unlink($_FILES['file_import']['name']);
	}
?>