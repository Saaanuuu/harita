<div class="main-panel" style="margin-top: 105px;">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Manage User</h4>
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
						<a href="#">Manage User</a>
					</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">List User</h4>
								<button class="btn btn-primary btn-round  ml-auto" data-toggle="modal" data-target="#modalAddUser">
									<i class="fa fa-plus"></i>
									Add New User
								</button>
							</div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table id="add-row" class="display table table-striped table-hover">
									<thead>
										<tr>
											<th>No</th>
											<th>Full Name</th>
											<th>Username</th>
											<th>Email</th>
											<th>Role</th>
											<th>Approve Status</th>
											<th>Approve Action</th>
											<th width="10%">Action</th>
										</tr>
									</thead>

									<tbody>
										<?php
										if (isset($_SESSION["role"]) && is_numeric($_SESSION["role"])) {
											$no = 1;
											$role = $_SESSION["role"];
											if ($role == 2) {
												$query = mysqli_query($conn, 'SELECT * from t_user where role = 3 or role = 4');
											} else {
												$query = mysqli_query($conn, 'SELECT * from t_user');
											}
											while ($t_user = mysqli_fetch_array($query)) {
										?>
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php echo $t_user['name'] ?></td>
													<td><?php echo $t_user['username'] ?></td>
													<td><?php echo $t_user['email'] ?></td>
													<td>
														<?php if ($t_user['role'] == 1) { ?>
															Super Admin
														<?php } else if ($t_user['role'] == 2) { ?>
															Admin
														<?php } else if ($t_user['role'] == 3) { ?>
															Enumelator
														<?php } else { ?>
															User
														<?php } ?>
													</td>
													<td>
														<?php if ($t_user['approve_download'] == 1) { ?>
															Not Yet Approve
														<?php } else if ($t_user['approve_download'] == 2) { ?>
															Approved
														<?php } else { ?>
															Waiting For Approve
														<?php } ?>
													</td>
													<td>
														<?php if ($t_user['approve_download'] == 3) { ?>
															<a href="#modalApprove<?php echo $t_user['id_user'] ?>" data-toggle="modal" title="Approve" class="btn btn-xs btn-success">Approve</a>
														<?php } else if ($t_user['approve_download'] == 2) { ?>
															<a href="#modalReject<?php echo $t_user['id_user'] ?>" data-toggle="modal" title="Reject" class="btn btn-xs btn-danger"><i class="fa fa-times"></i> Delete Approve</a>
														<?php } else { ?>
															<a class="btn btn-xs btn-warning">Not Yet Submited</a>
														<?php } ?>
													</td>
													<td>
														<a href="#modalEditUser<?php echo $t_user['id_user'] ?>" data-toggle="modal" title="Edit" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
														<a href="#modalDeleteUser<?php echo $t_user['id_user'] ?>" data-toggle="modal" title="Hapus" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
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

<div class="modal fade" id="modalAddUser" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header no-bd">
				<h5 class="modal-title">
					<span class="fw-mediumbold">Add New User</span>
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" enctype="multipart/form-data" action="">
				<div class="modal-body">
					<div class="form-group">
						<label>Full Name</label>
						<input type="text" name="name" class="form-control" placeholder="User Full Name" autocomplete="off" required="">
					</div>
					<div class="form-group">
						<label>Username</label>
						<input type="text" value="" name="username" class="form-control" placeholder="username" autocomplete="off" required="">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" name="email" class="form-control" placeholder="email" autocomplete="off" required="">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" value="" name="password" class="form-control" placeholder="password" autocomplete="off" required="">
					</div>
					<?php if ($_SESSION['role'] == 1) : ?>
						<div class="form-group">
							<label>Role</label>
							<select id="role" name="role" class="form-control">
								<option value="1">Super Admin</option>
								<option value="2">Admin</option>
								<option value="3">Enumerator</option>
								<option value="4">User</option>
							</select>
						</div>
						<div class="form-group">
							<label>Approve Download</label>
							<select id="approveDownload" name="approveDownload" class="form-control">
								<option value="1">Not Yet Approve</option>
								<option value="2">Approved</option>
							</select>
						</div>
					<?php else : ?>
						<div class="form-group">
							<label>Role</label>
							<select id="role" name="role" class="form-control">
								<option value="3">Enumerator</option>
								<option value="4">User</option>
							</select>
						</div>
						<div class="form-group">
							<label>Approve Download</label>
							<select id="approveDownload" name="approveDownload" class="form-control">
								<option value="1">Not Yet Approve</option>
								<option value="2">Approved</option>
							</select>
						</div>
					<?php endif; ?>
				</div>
				<div class="modal-footer no-bd">
					<button type="submit" name="save" class="btn btn-primary"><i class="fa fa-save"></i> Save Changes</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php
$p = mysqli_query($conn, 'SELECT * from t_user');
while ($d = mysqli_fetch_array($p)) {
?>

	<div class="modal fade" id="modalEditUser<?php echo $d['id_user'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header no-bd">
					<h5 class="modal-title">
						<span class="fw-mediumbold">Edit User</span>
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="POST" enctype="multipart/form-data" action="">
					<div class="modal-body">
						<input type="hidden" name="idUser" value="<?php echo $d['id_user'] ?>">
						<div class="form-group">
							<label>Full Name</label>
							<input value="<?php echo $d['name'] ?>" type="text" name="name" class="form-control" placeholder="User Full Name" required="">
						</div>
						<div class="form-group">
							<label>Username</label>
							<input value="<?php echo $d['username'] ?>" type="text" name="username" class="form-control" placeholder="Username" required="">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input value="<?php echo $d['email'] ?>" type="text" name="email" class="form-control" placeholder="Email" required="">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input value="<?php echo $d['password'] ?>" type="password" name="password" class="form-control" placeholder="Password" required="">
						</div>
						<?php if ($_SESSION['role'] == 1) : ?>
							<div class="form-group">
								<label>Role</label>
								<select id="role" name="role" class="form-control">
									<option value="1" <?php if ($d['role'] == 1) echo 'selected'; ?>>Super Admin</option>
									<option value="2" <?php if ($d['role'] == 2) echo 'selected'; ?>>Admin</option>
									<option value="3" <?php if ($d['role'] == 3) echo 'selected'; ?>>Enumerator</option>
									<option value="4" <?php if ($d['role'] == 4) echo 'selected'; ?>>User</option>
								</select>
							</div>
							<div class="form-group">
								<label>Approve Download</label>
								<select id="approveDownload" name="approveDownload" class="form-control">
									<option value="1" <?php if ($d['approve_download'] == 1) echo 'selected'; ?>>Not Yet Approve</option>
									<option value="2" <?php if ($d['approve_download'] == 2) echo 'selected'; ?>>Approved</option>
								</select>
							</div>
						<?php else : ?>
							<div class="form-group">
								<label>Role</label>
								<select id="role" name="role" class="form-control">
									<option value="3" <?php if ($d['role'] == 3) echo 'selected'; ?>>Enumerator</option>
									<option value="4" <?php if ($d['role'] == 4) echo 'selected'; ?>>User</option>
								</select>
							</div>
							<div class="form-group">
								<label>Approve Download</label>
								<select id="approveDownload" name="approveDownload" class="form-control">
									<option value="1" <?php if ($d['approve_download'] == 1) echo 'selected'; ?>>Not Yet Approve</option>
									<option value="2" <?php if ($d['approve_download'] == 2) echo 'selected'; ?>>Approved</option>
								</select>
							</div>
						<?php endif; ?>
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
$c = mysqli_query($conn, 'SELECT * from t_user');
while ($row = mysqli_fetch_array($c)) {
?>

	<div class="modal fade" id="modalDeleteUser<?php echo $row['id_user'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header no-bd">
					<h5 class="modal-title">
						<span class="fw-mediumbold">Delete User</span>
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="POST" enctype="multipart/form-data" action="">
					<div class="modal-body">
						<input type="hidden" name="idUser" value="<?php echo $row['id_user'] ?>">
						<h4>Are you sure to remove this user ?</h4>
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
$q = mysqli_query($conn, 'SELECT * from t_user');
while ($k = mysqli_fetch_array($q)) {
?>

	<div class="modal fade" id="modalApprove<?php echo $k['id_user'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header no-bd">
					<h5 class="modal-title">
						<span class="fw-mediumbold">Approve User</span>
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="POST" enctype="multipart/form-data" action="">
					<div class="modal-body">
						<input type="hidden" name="idUser" value="<?php echo $k['id_user'] ?>">
						<h4>Are you sure to approve this user ?</h4>
					</div>
					<div class="modal-footer no-bd">
						<button type="submit" name="approve" class="btn btn-success"><i class="fa fa-thumbs-o-up"></i> Approve</button>
						<button type="submit" name="reject" class="btn btn-danger"><i class="fa fa-times"></i> Reject</button>
					</div>
				</form>
			</div>
		</div>
	</div>

<?php } ?>

<?php
$q = mysqli_query($conn, 'SELECT * from t_user');
while ($k = mysqli_fetch_array($q)) {
?>

	<div class="modal fade" id="modalReject<?php echo $k['id_user'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header no-bd">
					<h5 class="modal-title">
						<span class="fw-mediumbold">Remove Approve Download User</span>
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="POST" enctype="multipart/form-data" action="">
					<div class="modal-body">
						<input type="hidden" name="idUser" value="<?php echo $k['id_user'] ?>">
						<h4>Are you sure to remove approve download this user ?</h4>
					</div>
					<div class="modal-footer no-bd">
						<button type="submit" name="reject" class="btn btn-danger"><i class="fa fa-times"></i> Remove</button>
						<button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>

<?php } ?>


<?php
require 'userController.php';

if (isset($_POST['save'])) {

	if (addNewUser($_POST) > 0) {
		echo "<script>alert ('User has been successfully added') </script>";
		echo "<meta http-equiv='refresh' content=0; URL=?view=manageUser>";
	} else {
		echo "<script>alert ('User failed to add') </script>";
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