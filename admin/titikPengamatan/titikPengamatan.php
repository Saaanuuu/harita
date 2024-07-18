<div class="main-panel" style="margin-top: 105px;">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">List Titik Pengamatan</h4>
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
						<a href="#">List Titik Pengamatan</a>
					</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
                            <div class="row">

									<?php
										if ($_SESSION['role'] != 4) {

											$idUser = $_SESSION['id_user'];
											$query = "SELECT * from t_user where id_user = '$idUser'";
											$result = mysqli_query($conn, $query);

											if($result) {
												$resultData = mysqli_fetch_assoc($result);
												$approveDownload = $resultData['approve_download'];

												if ($approveDownload == 2) {
												echo '<div class="col-md-8">';
													echo '<h4 class="card-title">List Titik Pengamatan</h4>';
												echo '</div>';
												echo '<div class="col-md-4 d-flex">';
													echo '<a href="https://webgisobi.com/exportAllTitikPengamatan.php" class="btn btn-success btn-round ml-auto">Export Data</a>';
													echo '&nbsp';
													echo '&nbsp';
													echo '<button class="btn btn-primary btn-round  ml-auto" data-toggle="modal" data-target="#modalAddTitikPengamatan">';
													echo '<i class="fa fa-plus"></i>';
													echo 'Add New Titik Pengamatan';
													echo '</button>';
												echo '</div>';
		
												} else if ($approveDownload == 1) {
													echo '<div class="col-md-6">';
														echo '<h4 class="card-title">List Titik Pengamatan</h4>';
													echo '</div>';
													echo '<div class="col-md-6 d-flex justify-content-end">';
														echo '<button class="btn btn-primary btn-round " data-toggle="modal" data-target="#modalSubmitRequestDownload">';
														echo 'Submit to Request Download';
														echo '</button>';
														echo '&nbsp';
														echo '&nbsp';
														echo '<button class="btn btn-primary btn-round " data-toggle="modal" data-target="#modalAddTitikPengamatan">';
														echo '<i class="fa fa-plus"></i>';
														echo '&nbsp';
														echo 'Add New Titik Pengamatan';
														echo '</button>';
													echo '</div>';
												} else if ($approveDownload == 3) {
													echo '<div class="col-md-6">';
														echo '<h4 class="card-title">List Titik Pengamatan</h4>';
													echo '</div>';
													echo '<div class="col-md-6 d-flex justify-content-end">';
														echo '<button class="btn btn-warning btn-round ">';
														echo 'Waiting For Apporove';
														echo '</button>';
														echo '&nbsp';
														echo '&nbsp';
														echo '<button class="btn btn-primary btn-round " data-toggle="modal" data-target="#modalAddTitikPengamatan">';
														echo '<i class="fa fa-plus"></i>';
														echo '&nbsp';
														echo 'Add New Titik Pengamatan';
														echo '</button>';
													echo '</div>';
												}
											}

										} else {
											echo '<div class="col-md-6">';
												echo '<h4 class="card-title">List Titik Pengamatan</h4>';
											echo '</div>';
										}
										
									?>

                            </div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table id="add-row" class="display table table-striped table-hover" >
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Titik</th>
											<th>Longitude</th>
											<th>Latitude</th>
											<th>Lokasi</th>
											<th>PIC</th>
											<th>Action</th>
										</tr>
									</thead>
									
									<tbody>
										<?php
											$no = 1;
											$query = mysqli_query($conn,'SELECT * from t_titik_pengamatan');
											while ($tp = mysqli_fetch_array($query)) {
										?>
										<tr>
											<td><?php echo $no++ ?></td>
											<td><?php echo $tp['nama_titik'] ?></td>
											<td><?php echo $tp['longitude'] ?></td>
											<td><?php echo $tp['latitude'] ?></td>
											<td><?php echo $tp['lokasi'] ?></td>
											<td><?php echo $tp['pic'] ?></td>
											<?php
												if ($_SESSION['role'] != 4) {
													echo '<td>';
														echo '<a href="#modalEditTitik' . $tp['t_titik_pengamatan_no'] . '"  data-toggle="modal" title="Edit" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>';
														echo '&nbsp';
														echo '&nbsp';
														echo '<a href="#modalDeleteTitik' . $tp['t_titik_pengamatan_no'] . '"  data-toggle="modal" title="Remove" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>';
														echo '&nbsp';
														echo '&nbsp';
														echo '<a href="?view=addDetailTitikPengamatan&titikPengamatanNo=' . $tp['t_titik_pengamatan_no'] . '" title="Add Detail Titik" class="btn btn-xs btn-primary"><i class="fa fa-plus"></i></a>';
														echo '&nbsp';
														echo '&nbsp';
														echo '<a href="?view=detailTitikPengamatan&titikPengamatanNo=' . $tp['t_titik_pengamatan_no'] . '" title="View Detail Titik Pengamatan" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>';
													echo '</td>';
												} else {
													echo '<td>';
														echo '<a href="?view=detailTitikPengamatan&titikPengamatanNo=' . $tp['t_titik_pengamatan_no'] . '" title="View Detail Titik Pengamatan" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>';
													echo '</td>';
												}
											?>
											
										</tr>
									<?php } ?>
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


<div class="modal fade" id="modalAddTitikPengamatan" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header no-bd">
				<h5 class="modal-title">
					<span class="fw-mediumbold">Add New Titk Pengamatan</span>
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" enctype="multipart/form-data" action="">
			<div class="modal-body">
				<input type="hidden" name="idUser" value="<?php echo $_SESSION['id_user'] ?>">

				<div class="form-group">
					<label>Nama Titik</label>
					<input type="text" name="namaTitik" id="namaTitik" class="form-control" placeholder="Nama Titik" required="">
				</div>
				<div class="form-group">
					<label>Longitude</label>
					<input type="text" name="longitude" id="longitude" class="form-control decimal-input" placeholder="Longitude" required="">
				</div>
				<div class="form-group">
					<label>Latitude</label>
					<input type="text" name="latitude" id="latitude" class="form-control decimal-input" placeholder="Latitude" required="">
				</div>
				<div class="form-group">
					<label>Lokasi</label>
					<input type="text" name="lokasi" id="lokasi" class="form-control" placeholder="Lokasi" required="">
				</div>
				<div class="form-group">
					<label>PIC</label>
					<input type="text" name="pic" id="pic" class="form-control" placeholder="PIC" required="">
				</div>
				<div class="form-group">
					<label>Deskripsi</label>
					<textarea class="form-control" placeholder="Deskripsi" rows="5" name="deskripsi" id="" style="white-space: pre-line;" required=""></textarea>
				</div>
				<div class="form-group">
					<label>Gambar</label>
					<input type="file" name="gambar" id="gambar" class="form-control" placeholder="gambar" required="">
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
	$p = mysqli_query($conn,'SELECT * from t_titik_pengamatan');
	while($d = mysqli_fetch_array($p)) {
?>

	<div class="modal fade" id="modalEditTitik<?php echo $d['t_titik_pengamatan_no'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header no-bd">
					<h5 class="modal-title">
						<span class="fw-mediumbold">Edit Titik Pengamatan</span> 
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="POST" enctype="multipart/form-data" action="">
				<div class="modal-body">
					<input type="hidden" name="idUser" value="<?php echo $_SESSION['id_user'] ?>">
					<input type="hidden" name="titikPengamatanNo" value="<?php echo $d['t_titik_pengamatan_no'] ?>">
					
					<div class="form-group">
						<label>Nama Titik</label>
						<input value="<?php echo $d['nama_titik'] ?>" type="text" name="namaTitik" id="namaTitik" class="form-control" placeholder="Nama Titiks" required="">
					</div>

					<div class="form-group">
						<label>Longitude</label>
						<input value="<?php echo $d['longitude'] ?>" type="text" name="longitude" id="longitude" class="form-control decimal-input" placeholder="Longitude" required="">
					</div>

					<div class="form-group">
						<label>Latitude</label>
						<input value="<?php echo $d['latitude'] ?>" type="text" name="latitude" id="latitude" class="form-control decimal-input" placeholder="Latitude" required="">
					</div>

					<div class="form-group">
						<label>Lokasi</label>
						<input value="<?php echo $d['lokasi'] ?>" type="text" name="lokasi" id="lokasi" class="form-control" placeholder="Lokasi" required="">
					</div>

					<div class="form-group">
						<label>PIC</label>
						<input value="<?php echo $d['pic'] ?>" type="text" name="pic" id="pic" class="form-control" placeholder="PIC" required="">
					</div>

					<div class="form-group">
						<label>Deskripsi</label>
						<textarea class="form-control" placeholder="Deskripsi" rows="5" name="deskripsi" id="deskripsi" style="white-space: pre-line;" required=""><?php echo $d['description'] ?></textarea>
					</div>
					<div class="form-group">
						<label>Gambar</label>
						<input type="file" name="gambar" id="gambar" class="form-control" placeholder required="">
					</div>
				</div>
				<div class="modal-footer no-bd">
					<button type="submit" name="edit" class="btn btn-primary"><i class="fa fa-save"></i>Update</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
				</div>
				</form>
			</div>
		</div>
	</div>

<?php } ?>

<?php 
	$c = mysqli_query($conn,'SELECT * from t_titik_pengamatan');
	while($row = mysqli_fetch_array($c)) {
?>

<div class="modal fade" id="modalDeleteTitik<?php echo $row['t_titik_pengamatan_no'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header no-bd">
				<h5 class="modal-title">
					<span class="fw-mediumbold">Remove Titik Pengamatan</span> 
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" enctype="multipart/form-data" action="">
			<div class="modal-body">
				<input type="hidden" name="titikPengamatanNo" value="<?php echo $row['t_titik_pengamatan_no'] ?>">
				<h4>Are you sure to remove this titik pengamatan ?</h4>
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

	if(isset($_POST['save']))
		{
			
			if (addNewTitikPengamatan($_POST) > 0 ) {
				echo "<script>alert ('Titik Pengamatan successfully added') </script>";
				echo"<meta http-equiv='refresh' content=0; URL=?view=titikPengamatan>";
			} else {
				echo "<script>alert ('Titik Pengamatan failed to add') </script>";
				echo"<meta http-equiv='refresh' content=0; URL=?view=titikPengamatan>";
			}
			
		}

		elseif(isset($_POST['edit']))
		{
		
			if (editTitikPengamatan($_POST) > 0) {
				echo "<script>alert ('Titik Pengamatan has successfully updated') </script>";
				echo"<meta http-equiv='refresh' content=0; URL=?view=titikPengamatan>";
			} else {
				echo "<script>alert ('Titik Pengamatan failed to edited') </script>";
				echo"<meta http-equiv='refresh' content=0; URL=?view=titikPengamatan>";
			}
		}

		elseif(isset($_POST['delete']))
		{
			$titikPengamatanNo = $_POST['titikPengamatanNo'];
			if (deleteTitikPengamatan($titikPengamatanNo) > 0) {
				echo "<script>alert ('Titik Pengamatan has successfully deleted') </script>";
				echo"<meta http-equiv='refresh' content=0; URL=?view=titikPengamatan>";
			}
		}

		elseif(isset($_POST['submitApprove']))
		{
			$idUser = $_POST['idUser'];
			if (approveDownload($idUser) > 0) {
				echo "<script>alert ('Your Submission in the request process') </script>";
				echo"<meta http-equiv='refresh' content=0; URL=?view=titikPengamatan>";
			}
		}
?>