<?php
session_start();
include"koneksi.php";
?>
<html>
<head>
  <title>Export Titik Pengamatan</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
<div class="container">
		<h4>List Titik Pengamatan</h4>
			<div class="data-tables datatable-dark">
					
				<table id="add-row" class="display table table-striped table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Titik</th>
							<th>Longitude</th>
							<th>Latitude</th>
							<th>Lokasi</th>
							<th>PIC</th>
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
						</tr>
					</thead>

					<tbody>
						<?php
						if (isset($_GET['titikPengamatanNo']) && is_numeric($_GET['titikPengamatanNo'])) {
							$no = 1;
							$titikPengamatanNo = $_GET['titikPengamatanNo'];
							$query = '	SELECT t.*, d.*
										FROM t_detail_titik_pengamatan d
										JOIN t_titik_pengamatan t ON t.t_titik_pengamatan_no = d.t_titik_pengamatan_no
										WHERE d.t_titik_pengamatan_no = ' . $titikPengamatanNo; 
							$result = mysqli_query($conn, $query);
							while ($tp = mysqli_fetch_array($result)) {
							

						?>
									<tr>
										<td><?php echo $no++ ?></td>
										<td><?php echo $tp['nama_titik'] ?></td>
										<td><?php echo $tp['longitude'] ?></td>
										<td><?php echo $tp['latitude'] ?></td>
										<td><?php echo $tp['lokasi'] ?></td>
										<td><?php echo $tp['pic'] ?></td>
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

									</tr>
							<?php } ?>
						<?php } ?>
					</tbody>
				</table>
					
			</div>
</div>
	
<script>
$(document).ready(function() {
    $('#add-row').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy','csv','excel', 'pdf', 'print'
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

	

</body>

</html>