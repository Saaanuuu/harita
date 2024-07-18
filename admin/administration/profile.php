<div class="main-panel" style="margin-top: 105px;">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Profile</h4>
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
						<a href="#">Profile</a>
					</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">

							<div class="row">
								<div class="col-md-8">
									<h4 class="card-title">Profile</h4>
								</div>
							</div>
						</div>
						<div class="card-body">
							<div class="row">
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
											<div class="col-md-4">
												<h4><b>Full Name</b></h4>
											</div>
											<div class="col-md-8">
												<h4><b>: <?php echo $d['name']; ?> </b></h4>
											</div>
											<br>
											<br>
											<div class="col-md-4">
												<h4><b>Username</b></h4>
											</div>
											<div class="col-md-8">
												<h4><b>: <?php echo $d['username']; ?> </b></h4>
											</div>
											<br>
											<br>
											<div class="col-md-4">
												<h4><b>Email</b></h4>
											</div>
											<div class="col-md-8">
												<h4><b>: <?php echo $d['email']; ?> </b></h4>
											</div>
											<br>
											<br>
											<div class="col-md-4">
												<h4><b>Role</b></h4>
											</div>
											<div class="col-md-8">
												<h4>
													<b>: <?php if ($d['role'] == 1) { ?>
															Super Admin
														<?php } else if ($d['role'] == 2) { ?>
															Admin
														<?php } else if ($d['role'] == 3) { ?>
															Enumelator
														<?php } else { ?>
															User
														<?php } ?> 
													</b>
												</h4>
											</div>
											<br>
											<br>
											<div class="col-md-4">
												<h4><b>Approve Status</b></h4>
											</div>
											<div class="col-md-8">
												<h4>
													<b>: <?php if ($d['approve_download'] == 1) { ?>
															Not Yet Approve
														<?php } else if ($d['approve_download'] == 2) { ?>
															Approved
														<?php } else { ?>
															Waiting For Approve
														<?php } ?> 
													</b>
												</h4>
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


