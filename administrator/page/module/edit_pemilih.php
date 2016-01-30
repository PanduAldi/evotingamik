<?php  
	include_once "../utiliti/koneksi.php";

	$id = isset($_GET['id'])?$_GET['id']:null;
	$query_data = $conn->query("SELECT * FROM voter WHERE id_pemilih='$id'");
	$fecth_data = $query_data->fetch_array();

	include_once 'controller/act_edit_pemilih.php';

?>

<!-- tambah pemilih script -->
<div class="judul">
	<h4><i class="fa fa-plus"></i> Edit Data : <?php echo ucwords($fecth_data['nama']) ?></h4>
	<hr>
</div>
<div class="form">
	<form action="" method="POST" name="form_pemilih" class="form-horizontal" enctype="multipart/form-data">
		<div class="form-group">
			<label for="" class="col-sm-3 control-label"> NIM :</label>
			<div class="col-sm-2">
				<input type="text" maxlength="8" class="form-control" name="nim" value="<?php echo $fecth_data['nim'] ?>" required>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="col-sm-3 control-label"> Nama Lengkap :</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" name="nama" value="<?php echo $fecth_data['nama'] ?>" required/>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="col-sm-3 control-label"> </label>
			<div class="col-sm-5">
				<button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-save"></i> Edit Data</button>
				<a href="?page=master&ref=data_pemilih" class="btn btn-danger"><i class="fa fa-angle-double-left"></i> Batal / Kembali </a>
			</div>
		</div>
	</form> <!-- end form --> 
</div>