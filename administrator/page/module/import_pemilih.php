<?php  
	include_once '../utiliti/koneksi.php';
	include_once 'controller/act_import_pemilih.php';

?>
<!-- validasi file excel -->
<script>
	function validasiFile()
	{
		function hasExtension(inputID, exts)
		{
			var filename = document.getElementById(inputID).value;
			return(new RegExp('('+exts.join('|').replace(/\./g, '\\.')+')$')).test(filename);
		}

		if (!hasExtension('import',['.xls'])) 
		{
			alert("Type File harus digunakan adalah .xls (excel ofice 2003) ");
			return false;
		}
	}
</script>

<div class="panel panel-success">
	<div class="panel-body">
		<form action="" name="formImport" onsubmit="return validasiFile()" method="POST" enctype="multipart/form-data">
			<div class="col-sm-5">
				<input type="file"  class="form-control" id="import" name="file_import" required />
			</div>
			<p><input type="checkbox" name="del_all" value="1" > Centang jika anda ingin menghapus semua data pemilih yang sudah ada di database.</p>
			<br>
			<button type="submit" name="importProses" class="btn btn-primary"> Import Data</button>
			<a href="?page=master&ref=data_pemilih" class="btn btn-danger"> Batal / Kembali ke Halaman Sebelumnya</a>
		</form>
	</div>
</div>

<div class="petunjuk">
	<h4><b>Petunjuk Penggunaan</b></h4>
	<ol>
		<li>File harus berupa excel dengan format .xls atau excel 2003.</li>
		<li>Nama kolom harus di mulai dari cell A1, A2, dst.</li>
		<li>Atau untuk penyesuaian nama kolom anda dapat download contoh Filenya di bawah ini</li>
	</ol>
	<a href="../utiliti/contoh_import_data_pemilih.xls" class="btn btn-success btn-lg"><i class="fa fa-file-excel-o"></i> Download Contoh File Excel Untuk Import Data</a>	
</div>