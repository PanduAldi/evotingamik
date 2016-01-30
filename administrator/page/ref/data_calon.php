<?php  
	include_once '../utiliti/koneksi.php';
?>
<div class="panel panel-primary">
	<div class="panel-heading">
		<i class="fa fa-user">
			DATA CALON
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
						<p>Halaman Data Calon Ketua BEM</p>
						<p><small>Silahkan kelola data calon di bawah. Klik Tambah Data jika ingin menambahkan Calon.</small></p>
					</blockquote>
					<hr>
					<a href="?page=master&ref=data_calon&module=tambah_calon" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data Calon</a>
					<br />
					<br>
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th style="width:10px;">No</th>
									<th style="width:230px">Foto Calon</th>
									<th style="width:350">BIO</th>
									<th style="width:120px;">#</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$query_view = $conn->query("SELECT * FROM calon ORDER BY id_calon");
									$cek_data	= $query_view->num_rows;
									$no = 1;

									if ($cek_data > 0) 
									{
										while ($fetch_view = $query_view->fetch_array()) {
											?>
											<tr>
												
												<td ><?php echo $no++ ?></td>
												<!-- kolom foto -->
												<td> 
													<?php
														//cek image apakah ada ...   
														if ($fetch_view['img'] == "") 
														{
															echo '<img src="../img/not_image.png" alt="" width="200" height="300">';
														}
														else 
														{
															echo '<img src="../img/'.$fetch_view['img'].'" alt="" width="200" height="300">';
														}
													?>
												</td>
												<!-- kolom BIO -->
												<td>
													<table class="table table-striped">
														<tr>
															<td>NIM</td>
															<td>:</td>
															<td><?php echo ucwords($fetch_view['nim']) ?></td>
														</tr>
														<tr>
															<td>Nama Lengkap</td>
															<td>:</td>
															<td><?php echo ucwords($fetch_view['nama']); ?></td>
														</tr>
														<tr>
															<td>Prodi/Jurusan</td>
															<td>:</td>
															<td><?php echo ucwords($fetch_view['prodi']); ?></td>
														</tr>
														<tr>
															<td>Visi dan Misi</td>
															<td>:</td>
															<td><?php echo $fetch_view['visi']; ?></td>
														</tr>
													</table>
												</td>
												<!-- kolom act -->
												<td>
													<a title="Edit Data" href="?page=master&ref=data_calon&module=edit_calon&id=<?php echo $fetch_view['id_calon'] ?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
													<a title="Hapus Data" onclick="return confirm('Hapus Data Calon <?php echo $fetch_view['nama'] ?>')" href="?page=master&ref=data_calon&module=hapus_calon&id=<?php echo $fetch_view['id_calon'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
												</td>
											</tr>
											<?php
										}
									}
									else 
									{
										echo '<tr><td colspan="4"><p align="center"> Data Calon Kosong. Silahkan Tambahkann Data !!!! </p></td></tr>';

									}
									?>	
							</tbody>
						</table>
					</div>
					<?php
					break;

				case 'tambah_calon':
					include_once 'page/module/tambah_calon.php';
					break;

				case 'edit_calon':
					include_once 'page/module/edit_calon.php';
					break;

				case 'hapus_calon':
					include_once 'controller/act_hapus_calon.php';
					break;
			}
		?>
	</div> <!-- end panel body -->
</div>
