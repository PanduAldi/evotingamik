<?php  
	include_once 'controller/act_tambah_calon.php';
?>

<script>
	$(document).ready(function() {
		CKEDITOR.replace("editor");
	});
</script>

<!-- tambah calon script -->
<div class="pesan"><?php echo $pesan; ?></div>
<div class="judul">
	<h4><i class="fa fa-plus"></i> Tambah Calon Ketua</h4>
	<hr>
</div>
<div class="form">
	<form action="" method="POST" name="form_calon" class="form-horizontal" enctype="multipart/form-data">
		<div class="form-group">
			<label for="" class="col-sm-3 control-label"> NIM :</label>
			<div class="col-sm-2">
				<input type="text" maxlength="8" class="form-control" name="nim" required>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="col-sm-3 control-label"> Nama Lengkap :</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" name="nama" required/>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="col-sm-3 control-label"> Jurusan:</label>
			<div class="col-sm-3">
				<select name="prodi" id="" class="form-control"> 
					<option value="">--- Pilih Jurusan ----</option>
					<option value="manajemen informatika">Manajemen Informatika</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="col-sm-3 control-label"> Visi Dan Misi :</label>
			<div class="col-sm-9">
				<textarea name="visi" id="editor" cols="80" rows="10"></textarea>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="col-sm-3 control-label"> Foto Calon:</label>
			<div class="col-sm-5">
				<input type="file" accept="image/*" name="foto" class="form-control" required>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="col-sm-3 control-label"> </label>
			<div class="col-sm-5">
				<button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
				<a href="?page=master&ref=data_calon" class="btn btn-danger"><i class="fa fa-angle-double-left"></i> Batal / Kembali </a>
			</div>
		</div>
	</form> <!-- end form --> 
</div>