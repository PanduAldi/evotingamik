<?php  
	include_once 'controller/act_tambah_pemilih.php';
?>

<!-- tambah calon script -->
<div class="pesan"><?php echo $pesan; ?></div>
<div class="judul">
	<blockquote>
		<p>Form Tambah Pemilih</p>
		<p><small>Opsi ini untuk penambahan data pemilih secara manual</small></p>
		<p><small>Jika data yang akan di input berjumlah lebih dari satu. Untuk efisiensi waktu penginputan data,
				  gunakan fitur Import Data menggunakan excel pada halaman sebelumnya.</small></p>
	</blockquote>
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
			<label for="" class="col-sm-3 control-label"> </label>
			<div class="col-sm-5">
				<button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
				<a href="?page=master&ref=data_pemilih" class="btn btn-danger"><i class="fa fa-angle-double-left"></i> Batal / Kembali </a>
			</div>
		</div>
	</form> <!-- end form --> 
</div>