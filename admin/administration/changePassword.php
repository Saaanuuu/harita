<div class="main-panel" style="margin-top: 105px;">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Change Password</h4>
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
						<a href="#">Change Password</a>
					</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">

							<div class="row">
								<div class="col-md-8">
									<h4 class="card-title">Profiles</h4>
								</div>
							</div>
						</div>
						<div class="card-body">
							<div class="row">
								<form onsubmit="return validatePasswordMatch();" method="post" style="width: 100%;">
									<?php
									// Check if titikPengamatanNo is set and is a valid number
									if (isset($_SESSION['id_user']) && is_numeric($_SESSION['id_user'])) {
										$id_user = $_SESSION['id_user'];

										// Query to select data based on titikPengamatanNo
										$p = mysqli_query($conn, "SELECT * FROM t_user WHERE id_user = $id_user");

										// Check if any rows are returned
										if (mysqli_num_rows($p) > 0) {
											// Fetch and display the data
											while ($d = mysqli_fetch_array($p)) {
									?>
												<input type="hidden" name="idUser" value="<?php echo $d['id_user'] ?>">
												<div class="form-group">
													<div class="row">
														<div class="col-md-4">
															<h4><b>Full Name</b></h4>
														</div>
														<div class="col-md-8">
															<h4><b>: <?php echo $d['name']; ?> </b></h4>
														</div>
													</div>
												</div>

												<div class="form-group">
													<div class="row">
														<div class="col-md-4">
															<h4><b>Username</b></h4>
														</div>
														<div class="col-md-8">
															<h4><b>: <?php echo $d['username']; ?> </b></h4>
														</div>
													</div>
												</div>

												<div class="form-group">
													<div class="row">
														<div class="col-md-4">
															<h4><b>Email</b></h4>
														</div>
														<div class="col-md-8">
															<h4><b>: <?php echo $d['email']; ?> </b></h4>
														</div>
													</div>
												</div>

												<div class="form-group">
													<div class="row">
														<div class="col-md-4">
															<h4><b>Current Password</b></h4>
														</div>
														<div class="col-md-8">
															<input type="password" class="form-control" name="currentPassword" id="currentPassword" placeholder="Current Password" autocomplete="off" required=""/>
															<?php
																if(isset($_GET['alert']) && $_GET['alert'] == 'error') {
																	echo '<p class="text-danger font-weight-bold">Current Password is incorrect !!</p>';
																}
															?>
														</div>
													</div>
												</div>
												
												<div class="form-group">
													<div class="row">
														<div class="col-md-4">
															<h4><b>New Password</b></h4>
														</div>
														<div class="col-md-8">
															<input type="password" class="form-control" name="newPassword" id="newPassword" placeholder="New Password" autocomplete="off" required=""/>
															
														</div>
													</div>
												</div>
												
												
												<div class="form-group">
													<div class="row">
														<div class="col-md-4">
															<h4><b>Confirm New Password</b></h4>
														</div>
														<div class="col-md-8">
															<input type="password" class="form-control" name="confirmNewPassword" id="confirmNewPassword" placeholder="Confirm New Password" autocomplete="off" required=""/>
															
															<p id="passwordError" class="text-danger font-weight-bold"></p> 
														</div>
													</div>
												</div>

												
												<div class="form-group">
													<div class="row">
														<div class="col-md-4">
															
														</div>

														<div class="col-md-8">
														<button type="submit" name="save" class="btn btn-primary"><i class="fa fa-save"></i> Save Changes</button>
														</div>
													</div>
												</div>

									<?php
											}
										} else {
											echo "No data found for id_user: $id_user";
										}
									} else {
										echo "Invalid or missing id_user parameter";
									}
									?>
								</form>
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

<?php
require 'userController.php';

if (isset($_POST['save'])) {

	if (changePassword($_POST) > 0) {
		echo "<script>alert ('Password has been successfully Changed') </script>";
		echo "<meta http-equiv='refresh' content=0; URL=?view=manageUser>";
	} else {
		echo "<script>alert ('Password failed to change') </script>";
		echo "<meta http-equiv='refresh' content=0; URL=?view=manageUser>";
	}
} elseif (isset($_POST['edit'])) {

	if (editUser($_POST) > 0) {
		echo "<script>alert ('User has been successfully updated') </script>";
		echo "<meta http-equiv='refresh' content=0; URL=?view=manageUser>";
	} else {
		echo "<script>alert ('User failed to edited') </script>";
		echo "<meta http-equiv='refresh' content=0; URL=?view=manageUser>";
	}
} elseif (isset($_POST['delete'])) {
	$idUser = $_POST['idUser'];
	if (deleteUser($idUser) > 0) {
		echo "<script>alert ('User has been successfully removed') </script>";
		echo "<meta http-equiv='refresh' content=0; URL=?view=manageUser>";
	}
} elseif (isset($_POST['approve'])) {
	$idUser = $_POST['idUser'];
	if (approve($idUser) > 0) {
		echo "<script>alert ('User has been successfully Approve') </script>";
		echo "<meta http-equiv='refresh' content=0; URL=?view=manageUser>";
	}
} elseif (isset($_POST['reject'])) {
	$idUser = $_POST['idUser'];
	if (reject($idUser) > 0) {
		echo "<script>alert ('User has been successfully Reject/Remove Approve') </script>";
		echo "<meta http-equiv='refresh' content=0; URL=?view=manageUser>";
	}
}
?>
