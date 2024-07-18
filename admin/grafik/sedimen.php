<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "harita";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data tahun dan parameter kualitas air insitu dari tabel t_detail_titik_pengamatan
$sql = "SELECT tahun, al_s, as_s, cd_s, co_s, cr_s, fe_s, hg_s, ni_s, pb_s, se_s, mn_s FROM t_detail_titik_pengamatan WHERE t_titik_pengamatan_no = $_GET[titikPengamatanNo] ORDER BY tahun";
$result = $conn->query($sql);

// Inisialisasi array untuk menyimpan data
$dataPoints = array();

// Jika data tersedia, tambahkan ke dalam array
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        array_push($dataPoints, array(
            "tahun" => $row["tahun"],
            "al_s" => $row["al_s"],
            "as_s" => $row["as_s"],
            "cd_s" => $row["cd_s"],
            "co_s" => $row["co_s"],
            "cr_s" => $row["cr_s"],
            "fe_s" => $row["fe_s"],
            "hg_s" => $row["hg_s"],
            "ni_s" => $row["ni_s"],
            "pb_s" => $row["pb_s"],
            "se_s" => $row["se_s"],
            "mn_s" => $row["mn_s"]
        ));
    }
}

?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var dataPoints = <?php echo json_encode($dataPoints); ?>;

    // Membuat array untuk label tahun
    var labels = [];
    dataPoints.forEach(function(data) {
        labels.push(data.tahun);
    });

    // Menginisialisasi Chart.js untuk setiap parameter
    var parameters = ['al_s', 'as_s', 'cd_s', 'co_s', 'cr_s', 'fe_s', 'hg_s', 'ni_s', 'pb_s', 'se_s', 'mn_s'];
    parameters.forEach(function(parameter) {
        var parameterData = [];
        dataPoints.forEach(function(data) {
            parameterData.push(data[parameter]);
        });
        var ctx = document.getElementById('linechart' + parameter).getContext('2d');
        console.log('linechart' + parameter);
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: parameter.toUpperCase(), // Gunakan parameter sebagai label
                    data: parameterData,
                    borderColor: generateColor(parameters.indexOf(parameter)),
                    tension: 0.1,
                    fill: false
                }]
            },
            options: {
                maintainAspectRatio: false,
                responsive: false,
                width: 205,
                height: 205
            }
        });
    });

    // Fungsi untuk menghasilkan warna berbeda untuk setiap parameter
    function generateColor(index) {
        var colors = [
            "OliveDrab", "DarkCyan", "DarkGoldenRod", "DarkSlateBlue", "DarkViolet",
            "DodgerBlue", "DarkOrange", "DeepPink", "OrangeRed", "Crimson", "SkyBlue"
        ];
        return colors[index % colors.length];
    }
</script>