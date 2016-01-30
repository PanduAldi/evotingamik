<?php  
	/**
	 * CRUD Function 
	 * by. Pandu Aldi P
	 * referensi : http://abdrahmatika.com/membuat-fungsi-insertupdate-dan-delete-data-mysql-dengan-php/
	 * 
	 * Penggunaan fungsi :
	 * - insert data : insertData($array_field_record, $nama_table, $koneksi);
	 * - Update data : updateData($array_field_record, $nama_table, $id_parameter, $field_primary, $koneksi);
	 * - insert data : insertData($nama_table, $field_primary, $id_parameter $koneksi);
	 *
	 */

	// Insert / Tambah Data
	function insertData($data, $table, $conn)
	{
		$sql = "INSERT INTO ".$table." (";
		$no  = 1;

		// mendifinisikan banyaknya field paa table
		foreach ($data as $field => $param)
		{
			if ($no != count($data))
			{
				$sql .= $field.",";
			}
			else
			{
				$sql .= $field.")";
			}

			$no++;
		} //end foreach
		
		$sql .= " VALUES(";
		
		$no = 1;
		//mendefinisikan parameter record untuk insert data
		foreach ($data as $field => $param) 
		{
			if ($no != count($data)) 
			{
				$sql .= "'".$param."',";
			}
			else
			{
				$sql .= "'".$param."')";
			}

			$no++;
		}

		$query_insert = $conn->query($sql);

		return $query_insert;
	}

	// update / ubah data
	function updateData($data, $table, $id, $primary, $conn)
	{
		$sql = "UPDATE ".$table." SET ";
		$no = 1;

		//definisi field
		foreach ($data as $field => $param) 
		{
			if ($no != count($data)) 
			{
				$sql .= $field."='".$param."', ";
			}
			else
			{
				$sql .= $field."='".$param."'";
			}

			$no++;
		}

		$sql .= " WHERE ".$primary."='$id'";
		$query_update = $conn->query($sql);

		return ($query_update) ? true : $conn->error;
	}

	// Delete data / Hapus
	function deleteData($table, $primary, $id, $conn)
	{
		$sql = $conn->query("DELETE FROM $table WHERE $primary = '$id'");

		return ($sql) ? true : $conn->error;
	}
?>