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
												<h4><b>:
														<?php echo $d['nama_titik']; ?>
													</b></h4>
											</div>
											<br>
											<br>
											<div class="col-md-4">
												<h4><b>Longitude</b></h4>
											</div>
											<div class="col-md-8">
												<h4><b>:
														<?php echo $d['longitude']; ?>
													</b></h4>
											</div>
											<br>
											<br>
											<div class="col-md-4">
												<h4><b>Latitude</b></h4>
											</div>
											<div class="col-md-8">
												<h4><b>:
														<?php echo $d['latitude']; ?>
													</b></h4>
											</div>
											<br>
											<br>
											<div class="col-md-4">
												<h4><b>Lokasi</b></h4>
											</div>
											<div class="col-md-8">
												<h4><b>:
														<?php echo $d['lokasi']; ?>
													</b></h4>
											</div>
											<br>
											<br>
											<div class="col-md-4">
												<h4><b>PIC</b></h4>
											</div>
											<div class="col-md-8">
												<h4><b>:
														<?php echo $d['pic']; ?>
													</b></h4>
											</div>
											<br>
											<br>
											<div class="col-md-4">
												<h4><b>Deskripsi</b></h4>
											</div>
											<div class="col-md-8">
												<h4><b>:
														<?php echo $d['description']; ?>
													</b></h4>
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

							<br>

							<ul class="nav nav-tabs" id="myTab" role="tablist" style="justify-content: space-between;">
								<li class="nav-item" role="presentation">
									<button class="nav-link active" id="kualitas-air-insitu-tab" data-bs-toggle="tab" data-bs-target="#kualitas-air-insitu-tab-pane" type="button" role="tab" aria-controls="kualitas-air-insitu-tab-pane" aria-selected="true">Kualitas Air
										Insitu</button>
								</li>
								<li class="nav-item" role="presentation">
									<button class="nav-link" id="kualitas-air-sampling-tab" data-bs-toggle="tab" data-bs-target="#kualitas-air-sampling-tab-pane" type="button" role="tab" aria-controls="kualitas-air-sampling-tab-pane" aria-selected="false">Kualitas
										Air Sampling</button>
								</li>
								<li class="nav-item" role="presentation">
									<button class="nav-link" id="logam-berat-sedimen-tab" data-bs-toggle="tab" data-bs-target="#logam-berat-sedimen-tab-pane" type="button" role="tab" aria-controls="logam-berat-sedimen-tab-pane" aria-selected="false">Logam Berat
										Sedimen</button>
								</li>
								<li class="nav-item" role="presentation">
									<button class="nav-link" id="logam-berat-ikan-tab" data-bs-toggle="tab" data-bs-target="#logam-berat-ikan-tab-pane" type="button" role="tab" aria-controls="logam-berat-ikan-tab-pane" aria-selected="false">Logam Berat
										Ikan</button>
								</li>
								<li class="nav-item" role="presentation">
									<button class="nav-link" id="plankton-tab" data-bs-toggle="tab" data-bs-target="#plankton-tab-pane" type="button" role="tab" aria-controls="plankton-tab-pane" aria-selected="false">Plankton</button>
								</li>
								<li class="nav-item" role="presentation">
									<button class="nav-link" id="bentos-tab" data-bs-toggle="tab" data-bs-target="#bentos-tab-pane" type="button" role="tab" aria-controls="bentos-tab-pane" aria-selected="false">Bentos</button>
								</li>
								<li class="nav-item" role="presentation">
									<button class="nav-link" id="ikan-karang-tab" data-bs-toggle="tab" data-bs-target="#ikan-karang-tab-pane" type="button" role="tab" aria-controls="ikan-karang-tab-pane" aria-selected="false">Ikan Karang</button>
								</li>
								<li class="nav-item" role="presentation">
									<button class="nav-link" id="terumbu-karang-tab" data-bs-toggle="tab" data-bs-target="#terumbu-karang-tab-pane" type="button" role="tab" aria-controls="terumbu-karang-tab-pane" aria-selected="false">Terumbu
										Karang</button>
								</li>
							</ul>

							<div class="tab-content" id="myTabContent">
								<div class="tab-pane fade show active" id="kualitas-air-insitu-tab-pane" role="tabpanel" aria-labelledby="kualitas-air-insitu-tab" tabindex="0">
									<br>
									<h1 align="center">Grafik Kualitas Air Insitu</h1>
									<br>
									<div class="container" style="width: auto">
										<div class="row">
											<div class="col-md-6">
												<canvas id="linechartsuhu" width="100" height="100"></canvas>
											</div>
											<div class="col-md-6">
												<canvas id="linechartph" width="100" height="100"></canvas>
											</div>
										</div>
										<br>
										<div class="row">
											<div class="col-md-6">
												<canvas id="linechartsalinitas" width="100" height="100"></canvas>
											</div>
											<div class="col-md-6">
												<canvas id="linechartkecerahan" width="100" height="100"></canvas>
											</div>
										</div>
										<br>
										<div class="row">
											<div class="col-md-6">
												<canvas id="linechartkonduktivitas" width="100" height="100"></canvas>
											</div>
											<div class="col-md-6">
												<canvas id="linecharttds" width="100" height="100"></canvas>
											</div>
										</div>
										<br>
										<div class="row">
											<div class="col-md-6">
												<canvas id="linechartdo" width="100" height="100"></canvas>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="kualitas-air-sampling-tab-pane" role="tabpanel" aria-labelledby="kualitas-air-sampling-tab" tabindex="0">
									<br>
									<h1>Data kualitas air sampling dapat di download <a href="#">disini</a>.</h1>
								</div>
								<div class="tab-pane fade" id="logam-berat-sedimen-tab-pane" role="tabpanel" aria-labelledby="logam-berat-sedimen-tab" tabindex="0">
									<br>
									<h1 align="center">Grafik Logam Berat Sedimen</h1>
									<br>
									<div class="container" style="width: auto">
										<div class="row">
											<div class="col-md-6">
												<canvas id="linechartal_s" width="550" height="550"></canvas>
											</div>
											<div class="col-md-6">
												<canvas id="linechartas_s" width="550" height="550"></canvas>
											</div>
										</div>
										<br>
										<div class="row">
											<div class="col-md-6">
												<canvas id="linechartcd_s" width="550" height="550"></canvas>
											</div>
											<div class="col-md-6">
												<canvas id="linechartco_s" width="550" height="550"></canvas>
											</div>
										</div>
										<br>
										<div class="row">
											<div class="col-md-6">
												<canvas id="linechartcr_s" width="550" height="550"></canvas>
											</div>
											<div class="col-md-6">
												<canvas id="linechartfe_s" width="550" height="550"></canvas>
											</div>
										</div>
										<br>
										<div class="row">
											<div class="col-md-6">
												<canvas id="linecharthg_s" width="550" height="550"></canvas>
											</div>
											<div class="col-md-6">
												<canvas id="linechartni_s" width="550" height="550"></canvas>
											</div>
										</div>
										<br>
										<div class="row">
											<div class="col-md-6">
												<canvas id="linechartpb_s" width="550" height="550"></canvas>
											</div>
											<div class="col-md-6">
												<canvas id="linechartse_s" width="550" height="550"></canvas>
											</div>
										</div>
										<br>
										<div class="row">
											<div class="col-md-6">
												<canvas id="linechartmn_s" width="550" height="550"></canvas>
											</div>
										</div>
									</div>
								</div>

								<div class="tab-pane fade" id="logam-berat-ikan-tab-pane" role="tabpanel" aria-labelledby="logam-berat-ikan-tab" tabindex="0">
									<br>
									<h1 align="center">Grafik Logam Berat Otot Ikan</h1>
									<br>
									<div class="container" style="width: auto">
										<div class="row">
											<div class="col-md-6">
												<canvas id="linechartal_oi" width="550" height="550"></canvas>
											</div>
											<div class="col-md-6">
												<canvas id="linechartas_oi" width="550" height="550"></canvas>
											</div>
										</div>
										<br>
										<div class="row">
											<div class="col-md-6">
												<canvas id="linechartcd_oi" width="550" height="550"></canvas>
											</div>
											<div class="col-md-6">
												<canvas id="linechartco_oi" width="550" height="550"></canvas>
											</div>
										</div>
										<br>
										<div class="row">
											<div class="col-md-6">
												<canvas id="linechartcr_oi" width="550" height="550"></canvas>
											</div>
											<div class="col-md-6">
												<canvas id="linechartfe_oi" width="550" height="550"></canvas>
											</div>
										</div>
										<br>
										<div class="row">
											<div class="col-md-6">
												<canvas id="linecharthg_oi" width="550" height="550"></canvas>
											</div>
											<div class="col-md-6">
												<canvas id="linechartni_oi" width="550" height="550"></canvas>
											</div>
										</div>
										<br>
										<div class="row">
											<div class="col-md-6">
												<canvas id="linechartpb_oi" width="550" height="550"></canvas>
											</div>
											<div class="col-md-6">
												<canvas id="linechartse_oi" width="550" height="550"></canvas>
											</div>
										</div>
										<br>
										<div class="row">
											<div class="col-md-6">
												<canvas id="linechartmn_oi" width="550" height="550"></canvas>
											</div>
										</div>
									</div>
									<br>
									<h1 align="center">Grafik Logam Berat Hati Ikan</h1>
									<br>
									<div class="container" style="width: auto">
										<div class="row">
											<div class="col-md-6">
												<canvas id="linechartal_hi" width="550" height="550"></canvas>
											</div>
											<div class="col-md-6">
												<canvas id="linechartas_hi" width="550" height="550"></canvas>
											</div>
										</div>
										<br>
										<div class="row">
											<div class="col-md-6">
												<canvas id="linechartcd_hi" width="550" height="550"></canvas>
											</div>
											<div class="col-md-6">
												<canvas id="linechartco_hi" width="550" height="550"></canvas>
											</div>
										</div>
										<br>
										<div class="row">
											<div class="col-md-6">
												<canvas id="linechartcr_hi" width="550" height="550"></canvas>
											</div>
											<div class="col-md-6">
												<canvas id="linechartfe_hi" width="550" height="550"></canvas>
											</div>
										</div>
										<br>
										<div class="row">
											<div class="col-md-6">
												<canvas id="linecharthg_hi" width="550" height="550"></canvas>
											</div>
											<div class="col-md-6">
												<canvas id="linechartni_hi" width="550" height="550"></canvas>
											</div>
										</div>
										<br>
										<div class="row">
											<div class="col-md-6">
												<canvas id="linechartpb_hi" width="550" height="550"></canvas>
											</div>
											<div class="col-md-6">
												<canvas id="linechartse_hi" width="550" height="550"></canvas>
											</div>
										</div>
										<br>
										<div class="row">
											<div class="col-md-6">
												<canvas id="linechartmn_hi" width="550" height="550"></canvas>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="plankton-tab-pane" role="tabpanel" aria-labelledby="plankton-tab" tabindex="0">
									<br>
									<h1 align="center">Grafik Plankton</h1>
									<br>
									<div class="row">
										<div class="col-md-6">
											<div class="container" style="margin: 15px auto;">
												<canvas id="linechartjumlah_taksa_fito" width="100" height="100"></canvas>
											</div>
										</div>
										<div class="col-md-6">
											<div class="container" style="margin: 15px auto;">
												<canvas id="linechartkelimpahan_fito" width="100" height="100"></canvas>
											</div>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-md-6">
											<div class="container" style="margin: 15px auto;">
												<canvas id="linechartjumlah_taksa_zoo" width="100" height="100"></canvas>
											</div>
										</div>
										<div class="col-md-6">
											<div class="container" style="margin: 15px auto;">
												<canvas id="linechartkelimpahan_zoo" width="100" height="100"></canvas>
											</div>
										</div>
									</div>
								</div>

								<div class="tab-pane fade" id="bentos-tab-pane" role="tabpanel" aria-labelledby="bentos-tab" tabindex="0">
									<br>
									<h1 align="center">Grafik Bentos</h1>
									<br>
									<div class="row">
										<div class="col-md-6">
											<div class="container" style="margin: 15px auto;">
												<canvas id="linechartjumlah_taksa_bn" width="100" height="100"></canvas>
											</div>
										</div>
										<div class="col-md-6">
											<div class="container" style="margin: 15px auto;">
												<canvas id="linechartkepadatan_bn" width="100" height="100"></canvas>
											</div>
										</div>
									</div>
								</div>

								<div class="tab-pane fade" id="ikan-karang-tab-pane" role="tabpanel" aria-labelledby="ikan-karang-tab" tabindex="0">
									<br>
									<h1 align="center">Grafik Ikan Karang</h1>
									<br>
									<div class="row">
										<div class="col-md-6">
											<div class="container" style="margin: 15px auto;">
												<canvas id="linechartjumlah_spesies_ikan" width="100" height="100"></canvas>
											</div>
										</div>
										<div class="col-md-6">
											<div class="container" style="margin: 15px auto;">
												<canvas id="linechartkelimpahan_ikan" width="100" height="100"></canvas>
											</div>
										</div>
									</div>
								</div>

								<div class="tab-pane fade" id="terumbu-karang-tab-pane" role="tabpanel" aria-labelledby="terumbu-karang-tab" tabindex="0">
									<br>
									<h1 align="center">Grafik Terumbu Karang</h1>
									<br>
									<div class="container" style="width: 50%; margin: 15px auto;">
										<canvas id="linechartcover_karang" width="100" height="100"></canvas>
									</div>
								</div>
							</div>

							<div class="page-inner">
								<!-- GRAFIK Kualitas Air Insitu -->
								<?php
								include 'grafik/insitu.php';
								?>
								<!-- GRAFIK Logam Berat Sedimen -->
								<?php
								include 'grafik/sedimen.php';
								?>
								<!-- GRAFIK Logam Berat Pada Otot Ikan -->
								<?php
								include 'grafik/ototIkan.php';
								?>
								<!-- GRAFIK Logam Berat Pada Hati Ikan -->
								<?php
								include 'grafik/hatiIkan.php';
								?>
								<!-- GRAFIK Bentos -->
								<?php
								include 'grafik/bentos.php';
								?>
								<!-- GRAFIK Plankton -->
								<?php
								include 'grafik/plankton.php';
								?>
								<!-- GRAFIK Ikan Karang -->
								<?php
								include 'grafik/ikankarang.php';
								?>
								<!-- GRAFIK Terumbu Karang -->
								<?php
								include 'grafik/terumbuKarang.php';
								?>
							</div>

							<br>

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