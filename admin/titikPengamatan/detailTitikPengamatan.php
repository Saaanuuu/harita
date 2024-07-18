<div class="main-panel" style="margin-top: 105px;">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">List Detail Titik Pengamatan</h4>
				<ul class="breadcrumbs">
					<li class="nav-home">
						<a href="#">
							<i class="flaticon-home"></i>
						</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="?view=titikPengamatan">Titik Pengamatan</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">List Detail Titik Pengamatan</a>
					</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">

							<div class="row">
								<div class="col-md-8">
									<h4 class="card-title">Titik Pengamatan</h4>
								</div>

								<?php

									$idUser = $_SESSION['id_user'];
									$query = "SELECT * from t_user where id_user = '$idUser'";
									$result = mysqli_query($conn, $query);

									if($result) {
										$resultData = mysqli_fetch_assoc($result);
										$approveDownload = $resultData['approve_download'];

										if ($approveDownload == 2) {
											if (isset($_GET['titikPengamatanNo']) && is_numeric($_GET['titikPengamatanNo'])) {
												$titikPengamatanNo = $_GET['titikPengamatanNo'];
												echo '<div class="col-md-4 d-flex">';
												echo '<a href="https://webgisobi.com/exportTitikPengamatan.php?titikPengamatanNo=' . $titikPengamatanNo . ' "class="btn btn-success btn-round ml-auto">Export Data</a>';
												echo '</div>';
											}
										} else if ($approveDownload == 1) {
											echo '<div class="col-md-4 d-flex justify-content-end">';
												echo '<button class="btn btn-primary btn-round " data-toggle="modal" data-target="#modalSubmitRequestDownload">';
												echo 'Submit to Request Download';
												echo '</button>';
											echo '</div>';
										} else { 
											echo '<div class="col-md-4 d-flex justify-content-end">';
												echo '<button class="btn btn-warning btn-round ">';
												echo 'Waiting For Apporove';
												echo '</button>';
											echo '</div>';
										}
									}
									

								?>
							</div>
						</div>
						<div class="card-body">
							<div class="row">
								<?php
								// Check if titikPengamatanNo is set and is a valid number
								if (isset($_GET['titikPengamatanNo']) && is_numeric($_GET['titikPengamatanNo'])) {
									$titikPengamatanNo = $_GET['titikPengamatanNo'];

									// Query to select data based on titikPengamatanNo
									$p = mysqli_query($conn, "SELECT * FROM t_titik_pengamatan WHERE t_titik_pengamatan_no = $titikPengamatanNo");

									// Check if any rows are returned
									if (mysqli_num_rows($p) > 0) {
										// Fetch and display the data
										while ($d = mysqli_fetch_array($p)) {
								?>
											<div class="col-md-4">
												<h4><b>Nama Titik</b></h4>
											</div>
											<div class="col-md-8">
												<h4><b>: <?php echo $d['nama_titik']; ?> </b></h4>
											</div>
											<br>
											<br>
											<div class="col-md-4">
												<h4><b>Longitude</b></h4>
											</div>
											<div class="col-md-8">
												<h4><b>: <?php echo $d['longitude']; ?> </b></h4>
											</div>
											<br>
											<br>
											<div class="col-md-4">
												<h4><b>Latitude</b></h4>
											</div>
											<div class="col-md-8">
												<h4><b>: <?php echo $d['latitude']; ?> </b></h4>
											</div>
											<br>
											<br>
											<div class="col-md-4">
												<h4><b>Lokasi</b></h4>
											</div>
											<div class="col-md-8">
												<h4><b>: <?php echo $d['lokasi']; ?> </b></h4>
											</div>
											<br>
											<br>
											<div class="col-md-4">
												<h4><b>PIC</b></h4>
											</div>
											<div class="col-md-8">
												<h4><b>: <?php echo $d['pic']; ?> </b></h4>
											</div>
											<br>
											<br>
											<div class="col-md-4">
												<h4><b>Deskripsi</b></h4>
											</div>
											<div class="col-md-8">
												<h4><b>: <?php echo $d['description']; ?> </b></h4>
											</div>
								<?php
										}
									} else {
										echo "No data found for titikPengamatanNo: $titikPengamatanNo";
									}
								} else {
									echo "Invalid or missing titikPengamatanNo parameter";
								}
								?>

							</div>

							<hr>
							<div class="card-header">
								<div class="row">
									<div class="col-md-8">
										<h4 class="card-title">List Detail Titik Pengamatan</h4>
									</div>
									<div class="col-md-4 d-flex">
										<button class="btn btn-primary btn-round  ml-auto" data-toggle="modal" data-target="#modalAddDetailTitikPengamatan">
											<i class="fa fa-plus"></i>
											Add Detail Titik Pengamatan
										</button>

									</div>

								</div>
							</div>
							<br>
							<div class="table-responsive">
								<table id="add-row" class="display table table-striped table-hover">
									<thead>
										<tr>
											<th>No</th>
											<th>Tahun</th>
											<th>Suhu</th>
											<th>pH</th>
											<th>Salinitas</th>
											<th>TDS</th>
											<th>Kecerahan</th>
											<th>DO</th>
											<th>Konduktivitas</th>
											<th>Al_s</th>
											<th>As_s</th>
											<th>Cd_s</th>
											<th>Co_s</th>
											<th>Cr_s</th>
											<th>Fe_s</th>
											<th>Hg_s</th>
											<th>Ni_s</th>
											<th>Pb_s</th>
											<th>Se_s</th>
											<th>Mn_s</th>
											<th>Al_oi</th>
											<th>As_oi</th>
											<th>Cd_oi</th>
											<th>Co_oi</th>
											<th>Cr_oi</th>
											<th>Fe_oi</th>
											<th>Hg_oi</th>
											<th>Ni_oi</th>
											<th>Pb_oi</th>
											<th>Se_oi</th>
											<th>Mn_oi</th>
											<th>Al_hi</th>
											<th>As_hi</th>
											<th>Cd_hi</th>
											<th>Co_hi</th>
											<th>Cr_hi</th>
											<th>Fe_hi</th>
											<th>Hg_hi</th>
											<th>Ni_hi</th>
											<th>Pb_hi</th>
											<th>Se_hi</th>
											<th>Mn_hi</th>
											<th>Jumlah_Taksa_Bn</th>
											<th>Kepadatan_Bn</th>
											<th>Jumlah_Taksa_fito</th>
											<th>Kelimpahan_fito</th>
											<th>Jumlah_Taksa_zoo</th>
											<th>Kelimpahan_zoo</th>
											<th>Jumlah_Spesies_ikan</th>
											<th>Kelimpahan_ikan</th>
											<th>cover_karang</th>
											<th>Action</th>
										</tr>
									</thead>

									<tbody>
										<?php
										if (isset($_GET['titikPengamatanNo']) && is_numeric($_GET['titikPengamatanNo'])) {
											$no = 1;
											$titikPengamatanNo = $_GET['titikPengamatanNo'];
											$query = mysqli_query($conn, 'SELECT * from t_detail_titik_pengamatan where t_titik_pengamatan_no = ' . $titikPengamatanNo);
											while ($tp = mysqli_fetch_array($query)) {

										?>
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php echo $tp['tahun'] ?></td>
													<td><?php echo $tp['suhu'] ?></td>
													<td><?php echo $tp['ph'] ?></td>
													<td><?php echo $tp['salinitas'] ?></td>
													<td><?php echo $tp['tds'] ?></td>
													<td><?php echo $tp['kecerahan'] ?></td>
													<td><?php echo $tp['do'] ?></td>
													<td><?php echo $tp['konduktivitas'] ?></td>

													<td><?php echo $tp['al_s'] ?></td>
													<td><?php echo $tp['as_s'] ?></td>
													<td><?php echo $tp['cd_s'] ?></td>
													<td><?php echo $tp['co_s'] ?></td>
													<td><?php echo $tp['cr_s'] ?></td>
													<td><?php echo $tp['fe_s'] ?></td>
													<td><?php echo $tp['hg_s'] ?></td>
													<td><?php echo $tp['ni_s'] ?></td>
													<td><?php echo $tp['pb_s'] ?></td>
													<td><?php echo $tp['se_s'] ?></td>
													<td><?php echo $tp['mn_s'] ?></td>
													
													<td><?php echo $tp['al_oi'] ?></td>
													<td><?php echo $tp['as_oi'] ?></td>
													<td><?php echo $tp['cd_oi'] ?></td>
													<td><?php echo $tp['co_oi'] ?></td>
													<td><?php echo $tp['cr_oi'] ?></td>
													<td><?php echo $tp['fe_oi'] ?></td>
													<td><?php echo $tp['hg_oi'] ?></td>
													<td><?php echo $tp['ni_oi'] ?></td>
													<td><?php echo $tp['pb_oi'] ?></td>
													<td><?php echo $tp['se_oi'] ?></td>
													<td><?php echo $tp['mn_oi'] ?></td>

													<td><?php echo $tp['al_hi'] ?></td>
													<td><?php echo $tp['as_hi'] ?></td>
													<td><?php echo $tp['cd_hi'] ?></td>
													<td><?php echo $tp['co_hi'] ?></td>
													<td><?php echo $tp['cr_hi'] ?></td>
													<td><?php echo $tp['fe_hi'] ?></td>
													<td><?php echo $tp['hg_hi'] ?></td>
													<td><?php echo $tp['ni_hi'] ?></td>
													<td><?php echo $tp['pb_hi'] ?></td>
													<td><?php echo $tp['se_hi'] ?></td>
													<td><?php echo $tp['mn_hi'] ?></td>

													<td><?php echo $tp['jumlah_taksa_bn'] ?></td>
													<td><?php echo $tp['kepadatan_bn'] ?></td>
													<td><?php echo $tp['jumlah_taksa_fito'] ?></td>
													<td><?php echo $tp['kelimpahan_fito'] ?></td>
													<td><?php echo $tp['jumlah_taksa_zoo'] ?></td>
													<td><?php echo $tp['kelimpahan_zoo'] ?></td>
													<td><?php echo $tp['jumlah_spesies_ikan'] ?></td>
													<td><?php echo $tp['kelimpahan_ikan'] ?></td>
													<td><?php echo $tp['cover_karang'] ?></td>

														<td>
															<a href="#modalEditTitik<?php echo $tp['detail_titik_no'] ?>" data-toggle="modal" title="Edit" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
															<a href="#modalDeleteTitik<?php echo $tp['detail_titik_no'] ?>" data-toggle="modal" title="Remove" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
														</td>
													</tr>
										<?php }
										} ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<center>
		<h6><b>&copy; Licensed for use to Harita Nikel</b></h6>
	</center>
</div>


<div class="modal fade" id="modalAddDetailTitikPengamatan" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header no-bd">
				<h5 class="modal-title">
					<span class="fw-mediumbold">Add Detail Titik Pengamatan</span>
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" enctype="multipart/form-data" action="">
				<input type="hidden" name="idUser" value="<?php echo $_SESSION['id_user'] ?>">
				<input type="hidden" name="titikPengamatanNo" value="<?php echo $_GET['titikPengamatanNo'] ?>">


				<div class="modal-body">
					<div class="form-group">
						<label>Tahun* </label>
						<input type="number" name="tahun" id="tahun" class="form-control" placeholder="Tahun" required="">
					</div>
					<div class="form-group">
						<label>Suhu</label>
						<input type="number" name="suhu" id="suhu" class="form-control" placeholder="Suhu" required="">
					</div>
					<div class="form-group">
						<label>pH</label>
						<input type="text" name="ph" id="ph" class="form-control decimal-input" placeholder="pH" required="">
					</div>
					<div class="form-group">
						<label>Salinitas</label>
						<input type="text" name="salinitas" id="salinitas" class="form-control decimal-input" placeholder="Salinitas" required="">
					</div>
					<div class="form-group">
						<label>TDS</label>
						<input type="text" name="tds" id="tds" class="form-control decimal-input" placeholder="TDS" required="">
					</div>
					<div class="form-group">
						<label>Kecerahan</label>
						<input type="text" name="kecerahan" id="kecerahan" class="form-control decimal-input" placeholder="Kecerahan" required="">
					</div>
					<div class="form-group">
						<label>DO</label>
						<input type="text" name="do" id="do" class="form-control decimal-input" placeholder="DO" required="">
					</div>
					<div class="form-group">
						<label>Konduktivitas</label>
						<input type="text" name="konduktivitas" id="konduktivitas" class="form-control decimal-input" placeholder="Konduktivitas" required="">
					</div>

					<div class="form-group">
						<label>Al_s</label>
						<input type="text" name="Al_s" id="Al_s" class="form-control decimal-input" placeholder="Al_s" required="">
					</div>
					<div class="form-group">
						<label>As_s</label>
						<input type="text" name="As_s" id="As_s" class="form-control decimal-input" placeholder="As_s" required="">
					</div>
					<div class="form-group">
						<label>Cd_s</label>
						<input type="text" name="Cd_s" id="Cd_s" class="form-control decimal-input" placeholder="Cd_s" required="">
					</div>
					<div class="form-group">
						<label>Co_s</label>
						<input type="text" name="Co_s" id="Co_s" class="form-control decimal-input" placeholder="Co_s" required="">
					</div>
					<div class="form-group">
						<label>Cr_s</label>
						<input type="text" name="Cr_s" id="Cr_s" class="form-control decimal-input" placeholder="Cr_s" required="">
					</div>
					<div class="form-group">
						<label>Fe_s</label>
						<input type="text" name="Fe_s" id="Fe_s" class="form-control decimal-input" placeholder="Fe_s" required="">
					</div>
					<div class="form-group">
						<label>Hg_s</label>
						<input type="text" name="Hg_s" id="Hg_s" class="form-control decimal-input" placeholder="Hg_s" required="">
					</div>
					<div class="form-group">
						<label>Ni_s</label>
						<input type="text" name="Ni_s" id="Ni_s" class="form-control decimal-input" placeholder="Ni_s" required="">
					</div>
					<div class="form-group">
						<label>Pb_s</label>
						<input type="text" name="Pb_s" id="Pb_s" class="form-control decimal-input" placeholder="Pb_s" required="">
					</div>
					<div class="form-group">
						<label>Se_s</label>
						<input type="text" name="Se_s" id="Se_s" class="form-control decimal-input" placeholder="Se_s" required="">
					</div>
					<div class="form-group">
						<label>Mn_s</label>
						<input type="text" name="Mn_s" id="Mn_s" class="form-control decimal-input" placeholder="Mn_s" required="">
					</div>

					<div class="form-group">
						<label>Al_oi</label>
						<input type="text" name="Al_oi" id="Al_oi" class="form-control decimal-input" placeholder="Al_oi" required="">
					</div>
					<div class="form-group">
						<label>As_oi</label>
						<input type="text" name="As_oi" id="As_oi" class="form-control decimal-input" placeholder="As_oi" required="">
					</div>
					<div class="form-group">
						<label>Cd_oi</label>
						<input type="text" name="Cd_oi" id="Cd_oi" class="form-control decimal-input" placeholder="Cd_oi" required="">
					</div>
					<div class="form-group">
						<label>Co_oi</label>
						<input type="text" name="Co_oi" id="Co_oi" class="form-control decimal-input" placeholder="Co_oi" required="">
					</div>
					<div class="form-group">
						<label>Cr_oi</label>
						<input type="text" name="Cr_oi" id="Cr_oi" class="form-control decimal-input" placeholder="Cr_oi" required="">
					</div>
					<div class="form-group">
						<label>Fe_oi</label>
						<input type="text" name="Fe_oi" id="Fe_oi" class="form-control decimal-input" placeholder="Fe_oi" required="">
					</div>
					<div class="form-group">
						<label>Hg_oi</label>
						<input type="text" name="Hg_oi" id="Hg_oi" class="form-control decimal-input" placeholder="Hg_oi" required="">
					</div>
					<div class="form-group">
						<label>Ni_oi</label>
						<input type="text" name="Ni_oi" id="Ni_oi" class="form-control decimal-input" placeholder="Ni_oi" required="">
					</div>
					<div class="form-group">
						<label>Pb_oi</label>
						<input type="text" name="Pb_oi" id="Pb_oi" class="form-control decimal-input" placeholder="Pb_oi" required="">
					</div>
					<div class="form-group">
						<label>Se_oi</label>
						<input type="text" name="Se_oi" id="Se_oi" class="form-control decimal-input" placeholder="Se_oi" required="">
					</div>
					<div class="form-group">
						<label>Mn_oi</label>
						<input type="text" name="Mn_oi" id="Mn_oi" class="form-control decimal-input" placeholder="Mn_oi" required="">
					</div>

					<div class="form-group">
						<label>Al_hi</label>
						<input type="text" name="Al_hi" id="Al_hi" class="form-control decimal-input" placeholder="Al_hi" required="">
					</div>
					<div class="form-group">
						<label>As_hi</label>
						<input type="text" name="As_hi" id="As_hi" class="form-control decimal-input" placeholder="As_hi" required="">
					</div>
					<div class="form-group">
						<label>Cd_hi</label>
						<input type="text" name="Cd_hi" id="Cd_hi" class="form-control decimal-input" placeholder="Cd_hi" required="">
					</div>
					<div class="form-group">
						<label>Co_hi</label>
						<input type="text" name="Co_hi" id="Co_hi" class="form-control decimal-input" placeholder="Co_hi" required="">
					</div>
					<div class="form-group">
						<label>Cr_hi</label>
						<input type="text" name="Cr_hi" id="Cr_hi" class="form-control decimal-input" placeholder="Cr_hi" required="">
					</div>
					<div class="form-group">
						<label>Fe_hi</label>
						<input type="text" name="Fe_hi" id="Fe_hi" class="form-control decimal-input" placeholder="Fe_hi" required="">
					</div>
					<div class="form-group">
						<label>Hg_hi</label>
						<input type="text" name="Hg_hi" id="Hg_hi" class="form-control decimal-input" placeholder="Hg_hi" required="">
					</div>
					<div class="form-group">
						<label>Ni_hi</label>
						<input type="text" name="Ni_hi" id="Ni_hi" class="form-control decimal-input" placeholder="Ni_hi" required="">
					</div>
					<div class="form-group">
						<label>Pb_hi</label>
						<input type="text" name="Pb_hi" id="Pb_hi" class="form-control decimal-input" placeholder="Pb_hi" required="">
					</div>
					<div class="form-group">
						<label>Se_hi</label>
						<input type="text" name="Se_hi" id="Se_hi" class="form-control decimal-input" placeholder="Se_hi" required="">
					</div>
					<div class="form-group">
						<label>Mn_hi</label>
						<input type="text" name="Mn_hi" id="Mn_hi" class="form-control decimal-input" placeholder="Mn_hi" required="">
					</div>

					<div class="form-group">
						<label>Jumlah Taksa Bn</label>
						<input type="text" name="jumlah_taksa_bn" id="jumlah_taksa_bn" class="form-control decimal-input" placeholder="Jumlah Taksa Bn" required="">
					</div>
					<div class="form-group">
						<label>Kepadatan Bn</label>
						<input type="text" name="kepadatan_bn" id="kepadatan_bn" class="form-control decimal-input" placeholder="Kepadatan Bn" required="">
					</div>
					<div class="form-group">
						<label>Jumlah Taksa Fito</label>
						<input type="text" name="jumlah_taksa_fito" id="jumlah_taksa_fito" class="form-control decimal-input" placeholder="Jumlah Taksa Fito" required="">
					</div>
					<div class="form-group">
						<label>Kelimpahan Fito</label>
						<input type="text" name="kelimpahan_fito" id="kelimpahan_fito" class="form-control decimal-input" placeholder="Kelimpahan Fito" required="">
					</div>
					<div class="form-group">
						<label>Jumlah Taksa Zoo</label>
						<input type="text" name="jumlah_taksa_zoo" id="jumlah_taksa_zoo" class="form-control decimal-input" placeholder="Jumlah Taksa Zoo" required="">
					</div>
					<div class="form-group">
						<label>Kelimpahan Zoo</label>
						<input type="text" name="kelimpahan_zoo" id="kelimpahan_zoo" class="form-control decimal-input" placeholder="Kelimpahan Zoo" required="">
					</div>
					<div class="form-group">
						<label>Jumlah Spesies Ikan</label>
						<input type="text" name="jumlah_spesies_ikan" id="jumlah_spesies_ikan" class="form-control decimal-input" placeholder="Jumlah Spesies Ikan" required="">
					</div>
					<div class="form-group">
						<label>Kelimpahan Ikan</label>
						<input type="text" name="kelimpahan_ikan" id="kelimpahan_ikan" class="form-control decimal-input" placeholder="Kelimpahan Ikan" required="">
					</div>
					<div class="form-group">
						<label>Cover Karang</label>
						<input type="text" name="cover_karang" id="cover_karang" class="form-control decimal-input" placeholder="Cover Karang" required="">
					</div>


				</div>
				<div class="modal-footer no-bd">
					<button type="submit" name="save" class="btn btn-primary"><i class="fa fa-save"></i>Save</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php
$p = mysqli_query($conn, 'SELECT * from t_detail_titik_pengamatan');
while ($d = mysqli_fetch_array($p)) {
?>

	<div class="modal fade" id="modalEditTitik<?php echo $d['detail_titik_no'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header no-bd">
					<h5 class="modal-title">
						<span class="fw-mediumbold">Edit Detail Titik</span>
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="POST" enctype="multipart/form-data" action="">
					<div class="modal-body">
						<input type="hidden" name="detailTitikNo" value="<?php echo $d['detail_titik_no'] ?>">
						<input type="hidden" name="idUser" value="<?= $_SESSION["id_user"] ?>">

						<div class="form-group">
							<label>Tahun</label>
							<input type="number" value="<?php echo $d['tahun'] ?>" name="tahun" id="tahun" class="form-control" placeholder="Tahun" required="">
						</div>
						<div class="form-group">
							<label>Suhu</label>
							<input type="number" value="<?php echo $d['suhu'] ?>" name="suhu" id="suhu" class="form-control" placeholder="Suhu" required="">
						</div>
						<div class="form-group">
							<label>pH</label>
							<input type="text" value="<?php echo $d['ph'] ?>" name="ph" id="ph" class="form-control decimal-input" placeholder="pH" required="">
						</div>
						<div class="form-group">
							<label>Salinitas</label>
							<input type="text" value="<?php echo $d['salinitas'] ?>" name="salinitas" id="salinitas" class="form-control decimal-input" placeholder="Salinitas" required="">
						</div>
						<div class="form-group">
							<label>TDS</label>
							<input type="text" value="<?php echo $d['tds'] ?>" name="tds" id="tds" class="form-control decimal-input" placeholder="TDS" required="">
						</div>
						<div class="form-group">
							<label>Kecerahan</label>
							<input type="text" value="<?php echo $d['kecerahan'] ?>" name="kecerahan" id="kecerahan" class="form-control decimal-input" placeholder="Kecerahan" required="">
						</div>
						<div class="form-group">
							<label>DO</label>
							<input type="text" value="<?php echo $d['do'] ?>" name="do" id="do" class="form-control decimal-input" placeholder="DO" required="">
						</div>
						<div class="form-group">
							<label>Konduktivitas</label>
							<input type="text" value="<?php echo $d['konduktivitas'] ?>" name="konduktivitas" id="konduktivitas" class="form-control decimal-input" placeholder="Konduktivitas" required="">
						</div>

						<div class="form-group">
							<label>Al_s</label>
							<input type="text" value="<?php echo $d['al_s'] ?>" name="Al_s" id="Al_s" class="form-control decimal-input" placeholder="Al_s" required="">
						</div>
						<div class="form-group">
							<label>As_s</label>
							<input type="text" value="<?php echo $d['as_s'] ?>" name="As_s" id="As_s" class="form-control decimal-input" placeholder="As_s" required="">
						</div>
						<div class="form-group">
							<label>Cd_s</label>
							<input type="text" value="<?php echo $d['cd_s'] ?>" name="Cd_s" id="Cd_s" class="form-control decimal-input" placeholder="Cd_s" required="">
						</div>
						<div class="form-group">
							<label>Co_s</label>
							<input type="text" value="<?php echo $d['co_s'] ?>" name="Co_s" id="Co_s" class="form-control decimal-input" placeholder="Co_s" required="">
						</div>
						<div class="form-group">
							<label>Cr_s</label>
							<input type="text" value="<?php echo $d['cr_s'] ?>" name="Cr_s" id="Cr_s" class="form-control decimal-input" placeholder="Cr_s" required="">
						</div>
						<div class="form-group">
							<label>Fe_s</label>
							<input type="text" value="<?php echo $d['fe_s'] ?>" name="Fe_s" id="Fe_s" class="form-control decimal-input" placeholder="Fe_s" required="">
						</div>
						<div class="form-group">
							<label>Hg_s</label>
							<input type="text" value="<?php echo $d['hg_s'] ?>" name="Hg_s" id="Hg_s" class="form-control decimal-input" placeholder="Hg_s" required="">
						</div>
						<div class="form-group">
							<label>Ni_s</label>
							<input type="text" value="<?php echo $d['ni_s'] ?>" name="Ni_s" id="Ni_s" class="form-control decimal-input" placeholder="Ni_s" required="">
						</div>
						<div class="form-group">
							<label>Pb_s</label>
							<input type="text" value="<?php echo $d['pb_s'] ?>" name="Pb_s" id="Pb_s" class="form-control decimal-input" placeholder="Pb_s" required="">
						</div>
						<div class="form-group">
							<label>Se_s</label>
							<input type="text" value="<?php echo $d['se_s'] ?>" name="Se_s" id="Se_s" class="form-control decimal-input" placeholder="Se_s" required="">
						</div>
						<div class="form-group">
							<label>Mn_s</label>
							<input type="text" value="<?php echo $d['mn_s'] ?>" name="Mn_s" id="Mn_s" class="form-control decimal-input" placeholder="Mn_s" required="">
						</div>

						<div class="form-group">
							<label>Al_oi</label>
							<input type="text" value="<?php echo $d['al_oi'] ?>" name="Al_oi" id="Al_oi" class="form-control decimal-input" placeholder="Al_oi" required="">
						</div>
						<div class="form-group">
							<label>As_oi</label>
							<input type="text" value="<?php echo $d['as_oi'] ?>" name="As_oi" id="As_oi" class="form-control decimal-input" placeholder="As_oi" required="">
						</div>
						<div class="form-group">
							<label>Cd_oi</label>
							<input type="text" value="<?php echo $d['cd_oi'] ?>" name="Cd_oi" id="Cd_oi" class="form-control decimal-input" placeholder="Cd_oi" required="">
						</div>
						<div class="form-group">
							<label>Co_oi</label>
							<input type="text" value="<?php echo $d['co_oi'] ?>" name="Co_oi" id="Co_oi" class="form-control decimal-input" placeholder="Co_oi" required="">
						</div>
						<div class="form-group">
							<label>Cr_oi</label>
							<input type="text" value="<?php echo $d['cr_oi'] ?>" name="Cr_oi" id="Cr_oi" class="form-control decimal-input" placeholder="Cr_oi" required="">
						</div>
						<div class="form-group">
							<label>Fe_oi</label>
							<input type="text" value="<?php echo $d['fe_oi'] ?>" name="Fe_oi" id="Fe_oi" class="form-control decimal-input" placeholder="Fe_oi" required="">
						</div>
						<div class="form-group">
							<label>Hg_oi</label>
							<input type="text" value="<?php echo $d['hg_oi'] ?>" name="Hg_oi" id="Hg_oi" class="form-control decimal-input" placeholder="Hg_oi" required="">
						</div>
						<div class="form-group">
							<label>Ni_oi</label>
							<input type="text" value="<?php echo $d['ni_oi'] ?>" name="Ni_oi" id="Ni_oi" class="form-control decimal-input" placeholder="Ni_oi" required="">
						</div>
						<div class="form-group">
							<label>Pb_oi</label>
							<input type="text" value="<?php echo $d['pb_oi'] ?>" name="Pb_oi" id="Pb_oi" class="form-control decimal-input" placeholder="Pb_oi" required="">
						</div>
						<div class="form-group">
							<label>Se_oi</label>
							<input type="text" value="<?php echo $d['se_oi'] ?>" name="Se_oi" id="Se_oi" class="form-control decimal-input" placeholder="Se_oi" required="">
						</div>
						<div class="form-group">
							<label>Mn_oi</label>
							<input type="text" value="<?php echo $d['mn_oi'] ?>" name="Mn_oi" id="Mn_oi" class="form-control decimal-input" placeholder="Mn_oi" required="">
						</div>

						<div class="form-group">
							<label>Al_hi</label>
							<input type="text" value="<?php echo $d['al_hi'] ?>" name="Al_hi" id="Al_hi" class="form-control decimal-input" placeholder="Al_hi" required="">
						</div>
						<div class="form-group">
							<label>As_hi</label>
							<input type="text" value="<?php echo $d['as_hi'] ?>" name="As_hi" id="As_hi" class="form-control decimal-input" placeholder="As_hi" required="">
						</div>
						<div class="form-group">
							<label>Cd_hi</label>
							<input type="text" value="<?php echo $d['cd_hi'] ?>" name="Cd_hi" id="Cd_hi" class="form-control decimal-input" placeholder="Cd_hi" required="">
						</div>
						<div class="form-group">
							<label>Co_hi</label>
							<input type="text" value="<?php echo $d['co_hi'] ?>" name="Co_hi" id="Co_hi" class="form-control decimal-input" placeholder="Co_hi" required="">
						</div>
						<div class="form-group">
							<label>Cr_hi</label>
							<input type="text" value="<?php echo $d['cr_hi'] ?>" name="Cr_hi" id="Cr_hi" class="form-control decimal-input" placeholder="Cr_hi" required="">
						</div>
						<div class="form-group">
							<label>Fe_hi</label>
							<input type="text" value="<?php echo $d['fe_hi'] ?>" name="Fe_hi" id="Fe_hi" class="form-control decimal-input" placeholder="Fe_hi" required="">
						</div>
						<div class="form-group">
							<label>Hg_hi</label>
							<input type="text" value="<?php echo $d['hg_hi'] ?>" name="Hg_hi" id="Hg_hi" class="form-control decimal-input" placeholder="Hg_hi" required="">
						</div>
						<div class="form-group">
							<label>Ni_hi</label>
							<input type="text" value="<?php echo $d['ni_hi'] ?>" name="Ni_hi" id="Ni_hi" class="form-control decimal-input" placeholder="Ni_hi" required="">
						</div>
						<div class="form-group">
							<label>Pb_hi</label>
							<input type="text" value="<?php echo $d['pb_hi'] ?>" name="Pb_hi" id="Pb_hi" class="form-control decimal-input" placeholder="Pb_hi" required="">
						</div>
						<div class="form-group">
							<label>Se_hi</label>
							<input type="text" value="<?php echo $d['se_hi'] ?>" name="Se_hi" id="Se_hi" class="form-control decimal-input" placeholder="Se_hi" required="">
						</div>
						<div class="form-group">
							<label>Mn_hi</label>
							<input type="text" value="<?php echo $d['mn_hi'] ?>" name="Mn_hi" id="Mn_hi" class="form-control decimal-input" placeholder="Mn_hi" required="">
						</div>

						<div class="form-group">
							<label>Jumlah Taksa Bn</label>
							<input type="text" value="<?php echo $d['jumlah_taksa_bn'] ?>" name="jumlah_taksa_bn" id="jumlah_taksa_bn" class="form-control decimal-input" placeholder="Jumlah Taksa Bn" required="">
						</div>
						<div class="form-group">
							<label>Kepadatan Bn</label>
							<input type="text" value="<?php echo $d['kepadatan_bn'] ?>" name="kepadatan_bn" id="kepadatan_bn" class="form-control decimal-input" placeholder="Kepadatan Bn" required="">
						</div>
						<div class="form-group">
							<label>Jumlah Taksa Fito</label>
							<input type="text" value="<?php echo $d['jumlah_taksa_fito'] ?>" name="jumlah_taksa_fito" id="jumlah_taksa_fito" class="form-control decimal-input" placeholder="Jumlah Taksa Fito" required="">
						</div>
						<div class="form-group">
							<label>Kelimpahan Fito</label>
							<input type="text" value="<?php echo $d['kelimpahan_fito'] ?>" name="kelimpahan_fito" id="kelimpahan_fito" class="form-control decimal-input" placeholder="Kelimpahan Fito" required="">
						</div>
						<div class="form-group">
							<label>Jumlah Taksa Zoo</label>
							<input type="text" value="<?php echo $d['jumlah_taksa_zoo'] ?>" name="jumlah_taksa_zoo" id="jumlah_taksa_zoo" class="form-control decimal-input" placeholder="Jumlah Taksa Zoo" required="">
						</div>
						<div class="form-group">
							<label>Kelimpahan Zoo</label>
							<input type="text" value="<?php echo $d['kelimpahan_zoo'] ?>" name="kelimpahan_zoo" id="kelimpahan_zoo" class="form-control decimal-input" placeholder="Kelimpahan Zoo" required="">
						</div>
						<div class="form-group">
							<label>Jumlah Spesies Ikan</label>
							<input type="text" value="<?php echo $d['jumlah_spesies_ikan'] ?>" name="jumlah_spesies_ikan" id="jumlah_spesies_ikan" class="form-control decimal-input" placeholder="Jumlah Spesies Ikan" required="">
						</div>
						<div class="form-group">
							<label>Kelimpahan Ikan</label>
							<input type="text" value="<?php echo $d['kelimpahan_ikan'] ?>" name="kelimpahan_ikan" id="kelimpahan_ikan" class="form-control decimal-input" placeholder="Kelimpahan Ikan" required="">
						</div>
						<div class="form-group">
							<label>Cover Karang</label>
							<input type="text" value="<?php echo $d['cover_karang'] ?>" name="cover_karang" id="cover_karang" class="form-control decimal-input" placeholder="Cover Karang" required="">
						</div>
					</div>
					<div class="modal-footer no-bd">
						<button type="submit" name="edit" class="btn btn-primary"><i class="fa fa-save"></i> Save Changes</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>

<?php } ?>

<?php
$c = mysqli_query($conn, 'SELECT * from t_detail_titik_pengamatan');
while ($row = mysqli_fetch_array($c)) {
?>

	<div class="modal fade" id="modalDeleteTitik<?php echo $row['detail_titik_no'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header no-bd">
					<h5 class="modal-title">
						<span class="fw-mediumbold">Delete Detail Titik</span>
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="POST" enctype="multipart/form-data" action="">
					<div class="modal-body">
						<input type="hidden" name="detailTitikNo" value="<?php echo $row['detail_titik_no'] ?>">
						<h4>Are you sure to remove this detail titik ?</h4>
					</div>
					<div class="modal-footer no-bd">
						<button type="submit" name="delete" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
						<button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>

<?php } ?>

<?php 
	$query = mysqli_query($conn,'SELECT * from t_user');
	while($result = mysqli_fetch_array($query)) {
?>

<div class="modal fade" id="modalSubmitRequestDownload" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header no-bd">
				<h5 class="modal-title">
					<span class="fw-mediumbold">Request Submit For Approve</span> 
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" enctype="multipart/form-data" action="">
			<div class="modal-body">
				<input type="hidden" name="idUser" value="<?php echo $_SESSION['id_user'] ?>">
				<h4>Are you sure to send approve download ?</h4>
			</div>
			<div class="modal-footer no-bd">
				<button type="submit" name="submitApprove" class="btn btn-success">Submit to Approve</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
			</div>
			</form>
		</div>
	</div>
</div>

<?php } ?>


<?php
require 'titikPengamatanController.php';

if (isset($_POST['save'])) {

	if (addNewDetailTitikPengamatan($_POST) > 0) {
		echo "<script>alert ('Detail Titik Pengamatan has successfully added') </script>";
		echo "<meta http-equiv='refresh' content=0; URL=?view=detailTitikPengamatan>";
	} else {
		echo "<script>alert ('Detail Titik Pengamatan failed to added') </script>";
		echo "<meta http-equiv='refresh' content=0; URL=?view=detailTitikPengamatan>";
	}
} elseif (isset($_POST['edit'])) {

	if (editDetailTitikPengamatan($_POST) > 0) {
		echo "<script>alert ('Detail Titik Pengamatan has successfully updated') </script>";
		echo "<meta http-equiv='refresh' content=0; URL=?view=detailTitikPengamatan>";
	} else {
		echo "<script>alert ('Detail Titik Pengamatan failed to edited') </script>";
		echo "<meta http-equiv='refresh' content=0; URL=?view=detailTitikPengamatan>";
	}
} elseif (isset($_POST['delete'])) {
	$detailTitikNo = $_POST['detailTitikNo'];
	if (deleteDetailTitikPengamatan($detailTitikNo) > 0) {
		echo "<script>alert ('Detail Titik Pengamatan has successfully deleted') </script>";
		echo "<meta http-equiv='refresh' content=0; URL=?view=detailTitikPengamatan>";
	}
} elseif(isset($_POST['submitApprove'])) {
	$idUser = $_POST['idUser'];
	if (approveDownload($idUser) > 0) {
		echo "<script>alert ('Your Submission in the request process') </script>";
		echo"<meta http-equiv='refresh' content=0; URL=?view=titikPengamatan>";
	}
}
?>