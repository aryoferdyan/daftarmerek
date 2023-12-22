<?php
// Koneksi ke database
$host= getenv('DB_HOSTNAME');
$dbuser= getenv('DB_USERNAME');
$dbpass= getenv('DB_PASSWORD');
$dbselect= getenv('DB_DATABASE');
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
}

// Tentukan format tanggal berdasarkan periode yang dipilih
switch ($selectedPeriod) {
    case 'daily':
        $dateFormat = "%Y-%m-%d";
        break;
    case 'monthly':
        $dateFormat = "%Y-%m";
        break;
    case 'yearly':
        $dateFormat = "%Y";
        break;
    default:
        $dateFormat = "%Y-%m-%d";
}

// Query untuk mengambil data dari tbl_permohonan
$queryPermohonan = "SELECT DATE_FORMAT(tanggal, '$dateFormat') as formatted_date, COUNT(id_permohonan) as jumlah_permohonan 
          FROM tbl_permohonan 
          GROUP BY formatted_date";
$resultPermohonan = $conn->query($queryPermohonan);

// Inisialisasi array untuk data grafik permohonan
$dataPermohonan = array();

// Loop untuk menambahkan data ke array
while ($row = $resultPermohonan->fetch_assoc()) {
    $dataPermohonan['labels'][] = $row['formatted_date'];
    $dataPermohonan['data'][] = $row['jumlah_permohonan'];
}

// Query untuk mengambil data dari tbl_log
$queryLog = "SELECT DATE_FORMAT(tanggal, '$dateFormat') as formatted_date, COUNT(id_log) as jumlah_log 
          FROM tbl_log 
          GROUP BY formatted_date";
$resultLog = $conn->query($queryLog);

// Inisialisasi array untuk data grafik log
$dataLog = array();

// Loop untuk menambahkan data ke array
while ($row = $resultLog->fetch_assoc()) {
    $dataLog['labels'][] = $row['formatted_date'];
    $dataLog['data'][] = $row['jumlah_log'];
}

// Tutup koneksi
$conn->close();

// Konversi data ke format JSON
$jsonDataPermohonan = json_encode($dataPermohonan);
$jsonDataLog = json_encode($dataLog);
?>

<div class="content-wrapper">
    <section class="content">

        <!-- Formulir untuk memilih periode -->
        <form method="post" action="">
            <div class="form-group row">
                <!-- <label class="col-sm-2 col-form-label">Periode</label> -->
                <div class="col-sm-4">
                  <select name="period" class="form-control">
                      <option value="daily" <?php echo ($selectedPeriod == 'daily')? 'selected' : '';?>>Harian</option>
                      <option value="monthly" <?php echo ($selectedPeriod == 'monthly')? 'selected' : '';?>>Bulanan</option>
                      <option value="yearly" <?php echo ($selectedPeriod == 'yearly')? 'selected' : '';?>>Tahunan</option>
                  </select>

                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <input type="submit" value="Tampilkan" class="btn btn-primary">
                </div>
            </div>
        </form>


        <!-- Tampilkan grafik permohonan -->
        <div>
            <h3>Grafik Permohonan</h3>
            <canvas id="chartPermohonan"></canvas>
        </div>

        <!-- Tampilkan grafik log -->
        <div>
            <h3>Grafik Log</h3>
            <canvas id="chartLog"></canvas>
        </div>

        <script>
            // Ambil data dari PHP dan konversi ke objek JavaScript
            var jsonDataPermohonan = <?php echo $jsonDataPermohonan; ?>;
            var jsonDataLog = <?php echo $jsonDataLog; ?>;
            
            // Ambil elemen canvas untuk grafik permohonan
            var ctxPermohonan = document.getElementById('chartPermohonan').getContext('2d');
            
            // Buat grafik batang untuk permohonan
            var chartPermohonan = new Chart(ctxPermohonan, {
                type: 'bar',
                data: {
                    labels: jsonDataPermohonan.labels,
                    datasets: [{
                        label: 'Jumlah Permohonan',
                        data: jsonDataPermohonan.data,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
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

            // Ambil elemen canvas untuk grafik log
            var ctxLog = document.getElementById('chartLog').getContext('2d');
            
            // Buat grafik batang untuk log
            var chartLog = new Chart(ctxLog, {
                type: 'bar',
                data: {
                    labels: jsonDataLog.labels,
                    datasets: [{
                        label: 'Jumlah Log',
                        data: jsonDataLog.data,
                        backgroundColor: 'rgba(192, 75, 192, 0.2)',
                        borderColor: 'rgba(192, 75, 192, 1)',
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
        </script>

        

    </section>
</div>
