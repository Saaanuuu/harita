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
$sql = "SELECT tahun, cover_karang FROM t_detail_titik_pengamatan WHERE t_titik_pengamatan_no = $_GET[titikPengamatanNo] ORDER BY tahun";
$result = $conn->query($sql);

// Inisialisasi array untuk menyimpan data
$dataPoints = array();

// Jika data tersedia, tambahkan ke dalam array
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        array_push($dataPoints, array(
            "tahun" => $row["tahun"],
            "cover_karang" => $row["cover_karang"]
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
    var parameters = ['cover_karang']; // Kolom yang baru
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