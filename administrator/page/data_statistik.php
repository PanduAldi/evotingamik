<?php  

	#query waktu pemilihan
	$query_waktu = $conn->query("SELECT * FROM waktu_pemilihan WHERE id_waktu='1'");
	$result_waktu = $query_waktu->fetch_array();

	if ($result_waktu['status'] == "belum dimulai") 
	{
		?>
		<div style="margin:7%">
			<div class="alert alert-warning">
				<h3 align="center">
					Data Statistik Tidak Dapat Dilihat Karena Pemungutan Suara Belum Di Mulai <br>
				</h3>
			</div>
		</div>
		<?php
	} 
	elseif ($result_waktu['status'] == "sedang dimulai") 
	{
		?>
		<div style="margin:7%">
			<div class="alert alert-danger">
				<h3 align="center">
					Data Statistik Tidak Dapat Dilihat Karena Pemungutan Suara Sedang diLaksanakan <br>
					Jika Pemungutan Suara Telah Selesai. Anda Dapat Menekan Tombol Di Bawah Untuk Menyelesaikan Pemungutan Suara <br>
					<br><a href="" class="btn btn-danger btn-lg"> SELESAIKAN PEMUNGUTAN SUARA </a> 
				</h3>
			</div>
		</div>
		<?php
	}
	elseif($result_waktu['status'] == "pemungutan selesai")
	{
?>

<!-- data statistik -->
<div style="margin:7%">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<i class="fa fa-file-o"></i> Data Statistik Perolehan Suara
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-bordered">
					<tbody>
						<?php  
							#query data calon
							$query_calon = $conn->query("SELECT * FROM calon JOIN statistik ON calon.id_calon = statistik.id_calon");

							while ($fetch_calon = $query_calon->fetch_array()) 
							{
								?>
								<tr>	
									<!-- kolom foto dan nama -->
									<td style="width:300px">
										<p align="center"><img src="../img/<?php echo $fetch_calon['img'] ?>" alt="" width="180" height="250" /></p>
										<h4 align="center"><?php echo ucwords($fetch_calon['nama']) ?></h4>
									</td>
									<!-- kolom hasil -->
									<td>
										<table class="table-striped">
											<tr>
												<td width="250" height="50"><h4><b>Jumlah Suara</b></h4></td>
												<td width="50"><h4>:</h4> </td>
												<td width="500"><h4><?php echo $fetch_calon['jum_suara'] ?> Suara</h4> </td>
											</tr>
											<tr>
												<td width="250" height="50"><h4><b>Persentase Suara</b></h4></td>
												<td width="50"><h4>:</h4> </td>
												<td width="500"><h4><?php echo round($fetch_calon['prosentase']) ?> %</h4> </td>
											</tr>
											<tr>
												<td width="250" height="50"><h4><b>Grafik Bar</b></h4></td>
												<td width="50"><h4>:</h4> </td>
												<td width="500">
													<h4>
														<!-- progres grafik -->
														<div class="progress">
															<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo round($fetch_calon['prosentase']) ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo round($fetch_calon['prosentase'])  ?>%"></div>
														</div>
													</h4> 
												</td>
											</tr>											
										</table>
									</td>
								</tr>
								<?php
							}
						?>
						<tr>
							<td colspan="2">
								<?php 
									#menghitung jumlah suara
									$query_jum_suara = $conn->query("SELECT * FROM log");
									$hitung_jum_suara = $query_jum_suara->num_rows;

									#menghiung jumlah DPT
									$query_dpt = $conn->query("SELECT * FROM voter");
									$hitung_dpt= $query_dpt->num_rows;

									#menghitung dpt yang tidak memilih
									$status = "belum di aktivasi";
									$query_dpt_no = $conn->query("SELECT * FROM voter WHERE status = '$status'");
									$hitung_dpt_no = $query_dpt_no->num_rows;

								?>	
								<table class="table table-striped">
									<tr>
										<td width="500"><h4><b>Jumlah Keseluruhan Suara</b></h4></td>
										<td width="30"><h4>:</h4></td>
										<td width="600">
											<?php  
												if ($hitung_jum_suara == "") 
												{
													echo "<h4>0 Suara</h4>";
												}
												else
												{
													echo "<h4>".$hitung_jum_suara." Suara</h4>";
												}
											?>
										</td>
									</tr>
									<tr>
										<td width="500"><h4><b>Jumlah Daftar Pemilih Tetap (DPT)</b></h4></td>
										<td width="30"><h4>:</h4></td>
										<td width="600">
											<?php  
												if ($hitung_dpt == "") 
												{
													echo "<h4>0 Orang</h4>";
												}
												else
												{
													echo "<h4>".$hitung_dpt." Orang</h4>";
												}
											?>
										</td>
									</tr>
									<tr>
										<td width="500"><h4><b>Jumlah Pemilih Yang Menggunakan Hak Suara</b></h4></td>
										<td width="30"><h4>:</h4></td>
										<td width="600">
											<?php  
												if ($hitung_jum_suara == "") 
												{
													echo "<h4>0 Orang</h4>";
												}
												else
												{
													echo "<h4>".$hitung_jum_suara." Orang</h4>";
												}
											?>
										</td>
									</tr>
									<tr>
										<td width="500"><h4><b>Jumlah Pemilih Yang Tidak Menggunakan Hak Suara</b></h4></td>
										<td width="30"><h4>:</h4></td>
										<td width="650">
											<?php  
												if ($hitung_dpt_no == "") 
												{
													echo "<h4>0 Orang</h4>";
												}
												else
												{
													echo "<h4>".$hitung_dpt_no." Orang</h4>";
												}
											?>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php  
}
?>