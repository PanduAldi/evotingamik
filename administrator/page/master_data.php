<div style="margin:7%">
	<div class="row">
		<div class="col-lg-2">
			<div class="list-group">
				<a class="list-group-item active">Menu Data Master</a>
				<a href="?page=master&ref=data_calon" class="list-group-item"><i class="fa fa-user"></i> Data Calon</a>
				<a href="?page=master&ref=data_pemilih" class="list-group-item"><i class="fa fa-users"></i> Data Pemilih</a>
			</div>
		</div>
		<div class="col-lg-10">
		<?php  
			$ref = isset($_GET['ref'])?$_GET['ref']:null;
			switch ($ref) {
				//default halaman data master
				default:
				?>
					<div class="panel panel-primary">
						<div class="panel-body">
							<blockquote cite="http://example.com/facts">
								<p>Halaman ini untuk mengelola data master calon dan pemilih.</p>
								<p><small>Silahkan pilih menu yang ada di sidebar kanan untuk memulai pengeloaan data.</small></p>
							</blockquote>
						</div>
					</div>
				<?php
					break;

				//untuk halaman data calon
				case 'data_calon':
					include 'page/ref/data_calon.php';
					break;

				// Untuk Halaman data pemilih
				case 'data_pemilih':
					include 'page/ref/data_pemilih.php';
					break;
			}
		?>
		</div>
	</div>
</div>