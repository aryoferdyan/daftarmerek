<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h1 class="box-title">Pangkalan Data Merek</h3>
                    </div>
        
                            <div class="box-body">
                            <div style="padding-bottom: 10px;"'>
                    <?php
             
                
                    $keyword = isset($_GET['keyword']) ? urlencode($_GET['keyword']) : '';
                    $api_url = 'https://pdki-indonesia.dgip.go.id/api/search?keyword=' . $keyword . '&page=1&showFilter=true&type=trademark';



                    // Header
                    $header = [
                        'Pdki-Signature: PDKI/735032dcbdf964d2c4426c1c2442e1650017fab3c979c42bbb390effc39425041625f60d46edfcd88363d4473bda49da967333c6a21ac6da689fc4321d5ed572'
                    ];

                    // Pengaturan HTTP untuk mengirimkan header
                    $options = [
                        'http' => [
                            'header' => implode("\r\n", $header),
                            'method' => 'GET'
                        ]
                    ];

                    // Membuat konteks HTTP
                    $context = stream_context_create($options);

                    // Mengambil respons dari API
                    $response = file_get_contents($api_url, false, $context);

                    // Mengecek apakah respons berhasil diambil
                    if ($response === FALSE) {
                        die('Gagal mengambil respons dari API');
                    }

                    // Mendekode respons JSON ke dalam array PHP
                    $json_data = json_decode($response, true);

                    // Mengecek apakah hits.hits ada dalam respons JSON
                    if (!isset($json_data['hits']['hits'])) {
                        die('Format respons tidak sesuai. Indeks "hits.hits" tidak ditemukan.');
                    }

                    // Mengambil data dari indeks 'hits.hits'
                    $data = $json_data['hits']['hits'];
                    ?>

                    <h1></h1>
                    <div style="padding-bottom: 10px;">
                        <form method="get" action="">
                            <label for="keyword">Keyword:</label>
                            <input type="text" name="keyword" id="keyword" value="<?php echo isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : ''; ?>" />
                            <button class="button-primary" type="submit">Cari</button>
                        </form>
                    </div>
                    
                    <table>
                        <thead>
                            <tr>
                                <th width=8%>Tanggal</th>
                                <th width=auto>Nama</th>
                                <th width=auto>Nama Owner</th>
                                <th width=8%>Status</th>
                                <th width=5%>Kesamaan</th> <!-- Add a new column header for similarity -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Check if $keyword is empty
                            if (empty($keyword)) {
                                echo '<tr><td colspan="5"><strong><tbody>Tidak Ada Data</strong></td></tr>';
                            } else {
                                // Iteration through data and display in the table
                                foreach ($data as $item) {
                                    // Mengecek apakah _source ada dalam data
                                    if (!isset($item['_source'])) {
                                        continue;
                                    }

                                    $source = $item['_source'];

                                    // Calculate similarity (you need to replace this with your similarity calculation logic)
                                    $userInput = isset($_GET['keyword']) ? $_GET['keyword'] : '';
                                    $namaMerek = $source['nama_merek'];
                                    $similarity = calculateSimilarity($userInput, $namaMerek);

                                    echo '<tr>';
                                    echo '<td>' . $source['tanggal_permohonan'] . '</td>';
                                    echo '<td>' . $source['nama_merek'] . '</td>';
                                    echo '<td>' . $source['owner'][0]['tm_owner_name'] . '</td>';
                                    echo '<td>' . $source['status_permohonan'] . '</td>';
                                    echo '<td style="text-align: center;">' . $similarity . " %" . '</td>'; // Display similarity in the new column
                                    echo '</tr>';
                                }
                            }
                            ?>
                        </tbody>
                    </table>


                    <!-- GRAFIKKKK BRO -->
                            

                    <?php
                    function calculateSimilarity($input, $namaMerek)
                    {
                        // Convert both strings to lowercase for a case-insensitive comparison
                        $input = strtolower($input);
                        $namaMerek = strtolower($namaMerek);

                        // Use the similar_text function to calculate similarity
                        similar_text($input, $namaMerek, $percentage);
                       // similar
                        // Round the percentage to two decimal places
                        $similarity = round($percentage, 2);

                        return $similarity;
                    }

                    ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>