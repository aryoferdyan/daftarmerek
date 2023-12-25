<?php
// Koneksi ke database
$host = getenv('DB_HOSTNAME');
$dbuser = getenv('DB_USERNAME');
$dbpass = getenv('DB_PASSWORD');
$dbselect = getenv('DB_DATABASE');
$conn = new mysqli($host, $dbuser, $dbpass, $dbselect);
// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Inisialisasi default periode
$selectedPeriod = "daily";

// Periksa apakah formulir telah dikirim
if (isset($_POST['period'])) {
    $selectedPeriod = $_POST['period'];
    $selectedPeriod2 = $_POST['period'];
}

// Tentukan format tanggal berdasarkan periode yang dipilih
switch ($selectedPeriod) {
    case 'daily':
        $dateFormat = "%Y-%m-%d";
        $dateFormat2 = "%Y-%m-%d";
        $currentDate = "YEAR(tanggal) = YEAR(CURDATE()) AND MONTH(tanggal) = MONTH(CURDATE()) AND DAY(tanggal) = DAY(CURDATE())";
        break;
    case 'monthly':
        $dateFormat2 = "%Y-%m";
        $dateFormat = "%Y-%m-%d";
        $currentDate = "YEAR(tanggal) = YEAR(CURDATE()) AND MONTH(tanggal) = MONTH(CURDATE())";
        break;
    case 'yearly':
        $dateFormat2 = "%Y";
        $dateFormat = "%Y-%m-%d";
        $currentDate = "YEAR(tanggal) = YEAR(CURDATE())";
        break;
        default:
        $dateFormat = "%Y-%m";
        $dateFormat2 = "%Y-%m-%d";

        $currentDate = "YEAR(tanggal) = YEAR(CURDATE())";
}



// Query untuk mengambil data dari tbl_permohonan
$queryPermohonan = "SELECT DATE_FORMAT(tanggal, '%Y') as formatted_date, COUNT(id_permohonan) as jumlah_permohonan 
          FROM tbl_permohonan 
          WHERE $currentDate
          GROUP BY formatted_date";
$resultPermohonan = $conn->query($queryPermohonan);
$rowTotalPermohonan = $resultPermohonan->fetch_assoc();
$totalPermohonan = $rowTotalPermohonan['jumlah_permohonan'];

$queryOngoing = "SELECT DATE_FORMAT(tanggal, '%Y') as formatted_date, COUNT(id_permohonan) as jumlah_permohonan 
                    FROM tbl_permohonan 
                    WHERE $currentDate AND (status = 0 OR status = 2)
                    GROUP BY formatted_date";
$resultPermohonan3 = $conn->query($queryOngoing);

// Check if there are rows in the result
if ($resultPermohonan3 && $resultPermohonan3->num_rows > 0) {
    // Fetch the first row
    $rowTotalPermohonan3 = $resultPermohonan3->fetch_assoc();
    $totalOnprogres = $rowTotalPermohonan3['jumlah_permohonan'];
} else {
    // No rows found, set $permohonanDiterima to 0
    $totalOnprogres = 0;
}


$queryDiterima = "SELECT DATE_FORMAT(tanggal, '%Y') as formatted_date, COUNT(id_permohonan) as jumlah_permohonan 
                    FROM tbl_permohonan 
                    WHERE $currentDate AND status = 1
                    GROUP BY formatted_date";
$resultPermohonan1 = $conn->query($queryDiterima);

// Check if there are rows in the result
if ($resultPermohonan1 && $resultPermohonan1->num_rows > 0) {
    // Fetch the first row
    $rowTotalPermohonan1 = $resultPermohonan1->fetch_assoc();
    $permohonanDiterima = $rowTotalPermohonan1['jumlah_permohonan'];
} else {
    // No rows found, set $permohonanDiterima to 0
    $permohonanDiterima = 0;
}



// Now $permohonanDiterima contains the desired value or 0 if null

$queryDitolak = "SELECT DATE_FORMAT(tanggal, '$dateFormat') as formatted_date, COUNT(id_permohonan) as jumlah_permohonan 
                    FROM tbl_permohonan 
                    WHERE $currentDate AND status = 3
                    GROUP BY formatted_date";
$resultPermohonan2 = $conn->query($queryDitolak);

// Check if there are rows in the result
if ($resultPermohonan2 && $resultPermohonan2->num_rows > 0) {
    // Fetch the first row
    $rowTotalPermohonan2 = $resultPermohonan2->fetch_assoc();
    $permohonanDitolak = $rowTotalPermohonan2['jumlah_permohonan'];
} else {
    // No rows found, set $permohonanDitolak to 0
    $permohonanDitolak = 0;
}

// Now $permohonanDitolak contains the desired value or 0 if null


// Now $permohonanDitolak contains the desired value (either the count or 0 if null)


$queryPermohonanx = "SELECT DATE_FORMAT(tanggal, '$dateFormat2') as formatted_date, COUNT(id_permohonan) as jumlah_permohonan 
          FROM tbl_permohonan 
          GROUP BY formatted_date";
$resultPermohonanx = $conn->query($queryPermohonanx);
// Inisialisasi array untuk data grafik permohonan
$dataPermohonan = array();

// Loop untuk menambahkan data ke array
while ($row = $resultPermohonanx->fetch_assoc()) {
    $dataPermohonan['labels'][] = $row['formatted_date'];
    $dataPermohonan['data'][] = $row['jumlah_permohonan'];
}

// Query untuk mengambil data dari tbl_log
$queryLog = "SELECT DATE_FORMAT(tanggal, '$dateFormat') as formatted_date, COUNT(id_log) as jumlah_log 
          FROM tbl_log 
          WHERE $currentDate
          GROUP BY formatted_date";
$resultLog = $conn->query($queryLog);
$totalKunjungan = 0;
while ($rowTotalLog = $resultLog->fetch_assoc()) {
    $totalKunjungan += $rowTotalLog['jumlah_log'];
}

$queryLogx = "SELECT DATE_FORMAT(tanggal, '$dateFormat2') as formatted_date, COUNT(id_log) as jumlah_log 
          FROM tbl_log 
          GROUP BY formatted_date";
$resultLogx = $conn->query($queryLogx);
// Inisialisasi array untuk data grafik log
// Initialize an empty array to store log data
$dataLog = array(); // Initialize an empty array

// Loop untuk menambahkan data ke array
while ($row = $resultLogx->fetch_assoc()) {
    $dataLog['labels'][] = $row['formatted_date'];
    $dataLog['data'][] = $row['jumlah_log'];
}

// Now $dataLog contains all rows from $resultLog
    


// Tutup koneksi
$conn->close();

// Konversi data ke format JSON
$jsonDataPermohonan = json_encode($dataPermohonan);
$jsonDataLog = json_encode($dataLog);
?>

<div class="content-wrapper">
    <section class="content">

<!-- <?php
// Debugging
echo "Permohonan JSON: " . json_encode($dataPermohonan) . "\n";
echo "Log JSON: " . json_encode($dataLog) . "\n";
?> -->
        <!-- Formulir untuk memilih periode -->
        <form method="post" action="">
            <div class="form-group row">
                <!-- <label class="col-sm-2 col-form-label">Periode</label> -->
                <div class="col-sm-4">
                    <select name="period" class="form-control">
                        <option value="daily" <?php echo ($selectedPeriod == 'daily') ? 'selected' : ''; ?>>Data Harian</option>
                        <option value="monthly" <?php echo ($selectedPeriod == 'monthly') ? 'selected' : ''; ?>>Data Bulanan</option>
                        <option value="yearly" <?php echo ($selectedPeriod == 'yearly') ? 'selected' : ''; ?>>Data Tahunan</option>
                    </select>

                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <input type="submit" value="Tampilkan" class="btn btn-primary">
                </div>
            </div>
        </form>
        <div class="col-lg-2 col-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3><?= $totalPermohonan ?></h3>
                    <p>Total Permohonan Masuk</p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <!-- <h3>12</h3> -->
                    <h3><?= $totalOnprogres ?></h3>
                    <p>Total Permohonan Onprogress</p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?= $permohonanDiterima ?></h3>
                    <p>Total Permohonan Diterima</p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-6">
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><?= $permohonanDitolak ?></h3>
                    <p>Total Permohonan Ditolak</p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3><?= $totalKunjungan ?></h3>
                    <p>Total Log Pengguna</p>
                </div>
            </div>
        </div>

        <canvas id="permohonanChart" width="400" height="200"></canvas>
        <canvas id="logChart" width="400" height="200"></canvas>


<script>
        var permohonanData = <?php echo json_encode($dataPermohonan); ?>;
        var logData = <?php echo json_encode($dataLog); ?>;

        function createChart(chartId, chartData, chartLabel, chartColor) {
            var ctx = document.getElementById(chartId).getContext('2d');
            var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: chartData.labels,
                    datasets: [{
                        label: chartLabel,
                        data: chartData.data,
                        backgroundColor: chartColor,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }

        createChart('permohonanChart', permohonanData, 'Total Permohonan', 'rgba(75, 192, 192, 1)');
        createChart('logChart', logData, 'Total Log', 'rgba(255, 99, 132, 1)');
    </script>




    </section>
</div>