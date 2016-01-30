<?php  
	include_once '../utiliti/koneksi.php';
?>

<script>
	$(document).ready(function() {
		$('#datatable').dataTable({
			"ordering" : false,
			"info"	: false
		});
	});
</script>
<div class="panel panel-primary">
	<div class="panel-heading">
		<i class="fa fa-users">
			DATA PEMILIH
		</i>
	</div>
	<div class="panel-body">
		<?php  
			$module  = isset($_GET['module'])?$_GET['module']:null;
			switch ($module)
			{
				default :
					?>
					<blockquote>
						<p>Halaman Data Pemilih</p>
						<p><small>Silahkan kelola data pemilih di bawah. Klik Tambah Data jika ingin menambahkan pemilih.</small></p>
					</blockquote>
					<hr>
					<a href="?page=master&ref=data_pemilih&module=tambah_pemilih" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data Pemilih</a>
					<a href="?page=master&ref=data_pemilih&module=import_data_pemilih" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Import Data Dari Excel</a>
					<br />
					<br>
					<div class="table-responsive">
						<table class="table table-bordered" id="datatable">
							<thead>
								<tr>
									<th style="width:120px;">NIM</th>
									<th style="width:230px">Nama Pemilih</th>
									<th style="width:200px">Status</th>
									<th style="width:100px;">#</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$query_view = $conn->query("SELECT * FROM voter ORDER BY nim");
									

										while ($fetch_view = $query_view->fetch_array()) {
											?>
											<tr>												
												<td><?php echo $fetch_view['nim'] ?></td>
												<td><?php echo $fetch_view['nama'] ?></td>
												<td><?php echo $fetch_view['status'] ?></td>
												<!-- kolom act -->
												<td>
													<a title="Edit Data" href="?page=master&ref=data_pemilih&module=edit_pemilih&id=<?php echo $fetch_view['id_pemilih'] ?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
													<a title="Hapus Data" onclick="return confirm('Hapus Data : <?php echo $fetch_view['nama'] ?>')" href="?page=master&ref=data_pemilih&module=hapus_pemilih&id=<?php echo $fetch_view['id_pemilih'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
												</td>
											</tr>
											<?php
										}
									?>	
							</tbody>
						</table>
					</div>
					<?php
					break;

				case 'tambah_pemilih':
					include_once 'page/module/tambah_pemilih.php';
					break;

				case 'edit_pemilih':
					include_once 'page/module/edit_pemilih.php';
					break;

				case 'hapus_pemilih':
					include_once 'controller/act_hapus_pemilih.php';
					break;

				case 'import_data_pemilih':
					include "page/module/import_pemilih.php";
					break;
			}
		?>
	</div> <!-- end panel body -->
</div>