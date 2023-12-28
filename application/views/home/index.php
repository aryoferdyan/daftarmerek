
<div class="content-wrapper">
    <section class="content">
        
        <!-- <?php
// Debugging
echo "Permohonan JSON: " . json_encode($dataPermohonan) . "\n";
echo "Log JSON: " . json_encode($dataLog) . "\n";
?> -->
<?php include 'index3.php'; ?>
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
    
<div id="doaj-fixed-query-widget"></div>
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