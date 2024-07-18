<?php
include '../koneksi.php';

session_start();

if (!isset($_SESSION['login'])) {
	header("Location: https://webgisobi.com/index.php");
	exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>HARITAGIS</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../assets/img/harita.png" type="image/x-icon" />
	<link rel="icon" href="../assets/img/harita.png" type="image/x-icon" />
	<!-- Fonts and icons -->
	<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
	<!-- chart js -->
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<!-- google chart -->
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Open+Sans:300,400,600,700"]
			},
			custom: {
				"families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"],
				urls: ['../assets/css/fonts.css']
			},
			google: {
				"families": ["Open+Sans:300,400,600,700"]
			},
			custom: {
				"families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"],
				urls: ['../assets/css/fonts.css']
			},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/sass//azzara//components/_navbars.scss">
	<link rel="stylesheet" href="../assets/sass/azzara.css">

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../assets/css/demo.css">
</head>

<body>
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" style="height: 80px; z-index: 1030;">
			<a class="navbar-brand" href="?view=dashboard">
				<img src="../assets/img/harita.png" style="width:75px" alt="navbar brand">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="header-text ml-auto d-flex align-items-center">
				<h4 style="margin: 0;"><b>Hello, <?= $_SESSION["name"] ?> </b></h4>
				&nbsp;
				&nbsp;
				<div class="dropdown">
					<div class="profile-picture" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-user"></i>
					</div>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
						<a class="dropdown-item" href="?view=viewProfile">Profile</a>
						<a class="dropdown-item" href="?view=changePassword">Change Password</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="../logout.php">Logout</a>
					</div>
				</div>
			</div>
		</nav>

		<nav class="navbar navbar-expand-lg navbar-light bg-light p1-primary static-top" style="margin-top: 70px; height: 60px;">
			<div class="collapse navbar-collapse" id="navbarNav" style="background-color: #DDB43C;">
				<ul class="navbar-nav justify-content-between">
					<li class="nav-item">
						<a class="nav-link" href="?view=dashboard"><b>Dashboard</b></a>
					</li>
					<?php if ($_SESSION['role'] == 1 || $_SESSION['role'] == 2) : ?>
						<li class="nav-item">
							<a class="nav-link" href="?view=manageUser"><b>Manage User</b></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="?view=titikPengamatan"><b>Titik Pengamatan</b></a>
						</li>
					<?php else : ?>
						<li class="nav-item">
							<a class="nav-link" href="?view=titikPengamatan"><b>Titik Pengamatan</b></a>
						</li>
					<?php endif; ?>
				</ul>
			</div>
		</nav>

		<?php
		// Dashboard
		if (@$_GET['view'] == '')
			include 'dashboard.php';
		elseif ($_GET['view'] == 'dashboard')
			include 'dashboard.php';

		// Manage User
		elseif ($_GET['view'] == 'manageUser')
			include 'administration/manageUser.php';

		// Manage titik Pengamatan
		elseif ($_GET['view'] == 'titikPengamatan')
			include 'titikPengamatan/titikPengamatan.php';

		//Manage Detail titik pengamatan
		elseif ($_GET['view'] == 'addDetailTitikPengamatan')
			include 'titikPengamatan/detailTitikPengamatan.php';

		//Manage Detail titik pengamatan
		elseif ($_GET['view'] == 'detailTitikPengamatan')
			include 'titikPengamatan/viewDetailTitikPengamatan.php';

		//view Profile
		elseif ($_GET['view'] == 'viewProfile')
			include 'administration/profile.php';

		//Change Password
		elseif ($_GET['view'] == 'changePassword')
			include 'administration/changePassword.php';

		?>

	</div>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<!--   Core JS Files   -->
	<script src="../assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../assets/js/core/popper.min.js"></script>
	<script src="../assets/js/core/bootstrap.min.js"></script>
	<!-- jQuery UI -->
	<script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	<!-- Bootstrap Toggle -->
	<script src="../assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
	<!-- jQuery Scrollbar -->
	<script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<!-- Datatables -->
	<script src="../assets/js/plugin/datatables/datatables.min.js"></script>
	<!-- Azzara JS -->
	<script src="../assets/js/ready.min.js"></script>
	<!-- Azzara DEMO methods, don't include it in your project! -->
	<script src="../assets/js/setting-demo.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

	<script src="../assets/js/custom.js"></script>


	<script>
		$(document).ready(function() {
			$('#add-row').DataTable({});

			$('.decimal-input').on('input', function() {
				// Allow only numbers and one decimal point
				$(this).val($(this).val().replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1'));
			});

			validatePasswordMatch();
		});
	</script>
	<script>
		window.addEventListener('scroll', function() {
			var navbar = document.querySelector('.navbar');
			if (window.scrollY > 0) {
				navbar.classList.add('scrolled');
			} else {
				navbar.classList.remove('scrolled');
			}
		});
	</script>

</body>

</html>