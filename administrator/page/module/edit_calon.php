<?php  
	include_once "../utiliti/koneksi.php";

	$id = isset($_GET['id'])?$_GET['id']:null;
	$query_data = $conn->query("SELECT * FROM calon WHERE id_calon='$id'");
	$fecth_data = $query_data->fetch_array();

	include_once 'controller/act_edit_calon.php';

?>

<script>
	$(document).ready(function() {
		CKEDITOR.replace("editor");
	});
</script>

<!-- tambah calon script -->
<div class="pesan"><?php echo $pesan; ?></div>
<div class="judul">
	<h4><i class="fa fa-plus"></i> Edit Data : <?php echo ucwords($fecth_data['nama']) ?></h4>
	<hr>
</div>
<div class="form">
	<form action="" method="POST" name="form_calon" class="form-horizontal" enctype="multipart/form-data">
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
			<label for="" class="col-sm-3 control-label"> Jurusan:</label>
			<div class="col-sm-3">
				<select name="prodi" id="" class="form-control" required> 
					<option value=""> --- Pilih ---</option>
					<option value="manajemen informatika">Manajemen Informatika</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="col-sm-3 control-label"> Visi Dan Misi :</label>
			<div class="col-sm-9">
				<textarea name="visi" id="editor" cols="80" rows="10"><?php echo $fecth_data['visi'] ?></textarea>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="col-sm-3 control-label"> Foto Calon:</label>
			<div class="col-sm-5">
				<img src="../img/<?php echo $fecth_data['img'] ?>" alt="" width="200" height="300">
			</div>
		</div>
		<div class="form-group">
			<label for="" class="col-sm-3 control-label"></label>
			<div class="col-sm-5">
				<input type="file" accept="image/*" name="foto" class="form-control">
				<p>*Klik Pilih Berkas Jika ingin Merubah Foto</p>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="col-sm-3 control-label"> </label>
			<div class="col-sm-5">
				<button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-save"></i> Edit Data</button>
				<a href="?page=master&ref=data_calon" class="btn btn-danger"><i class="fa fa-angle-double-left"></i> Batal / Kembali </a>
			</div>
		</div>
	</form> <!-- end form --> 
</div>