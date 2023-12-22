<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
</head>
<body>

<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">

                    <div class="box-header">
                        <h1 class="box-title">Pangkalan Data Merek</h1>
                    </div>

                    <div class="box-body">
                        <div style="padding-bottom: 10px;">
                            <?php
                            $keyword = isset($_GET['keyword']) ? urlencode($_GET['keyword']) : '';
                            $api_url = 'https://pdki-indonesia.dgip.go.id/api/search?keyword=' . $keyword . '&page=1&showFilter=true&type=trademark';

                            $header = [
                                'Pdki-Signature: PDKI/735032dcbdf964d2c4426c1c2442e1650017fab3c979c42bbb390effc39425041625f60d46edfcd88363d4473bda49da967333c6a21ac6da689fc4321d5ed572'
                            ];

                            $options = [
                                'http' => [
                                    'header' => implode("\r\n", $header),
                                    'method' => 'GET'
                                ]
                            ];

                            $context = stream_context_create($options);
                            $response = file_get_contents($api_url, false, $context);

                            if ($response === FALSE) {
                                die('Gagal mengambil respons dari API');
                            }

                            $json_data = json_decode($response, true);

                            if (!isset($json_data['hits']['hits'])) {
                                die('Format respons tidak sesuai. Indeks "hits.hits" tidak ditemukan.');
                            }

                            $data = $json_data['hits']['hits'];
                            ?>

                            <h1>Your Heading</h1>
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
                                    <th width="8%">Tanggal</th>
                                    <th width="auto">Nama</th>
                                    <th width="auto">Nama Owner</th>
                                    <th width="8%">Status</th>
                                    <th width="5%">Kesamaan</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (empty($keyword)) {
                                    echo '<tr><td colspan="5"><strong>Tidak Ada Data</strong></td></tr>';
                                } else {
                                    foreach ($data as $item) {
                                        if (!isset($item['_source'])) {
                                            continue;
                                        }

                                        $source = $item['_source'];
                                        $userInput = isset($_GET['keyword']) ? $_GET['keyword'] : '';
                                        $namaMerek = $source['nama_merek'];
                                        $similarity = calculateSimilarity($userInput, $namaMerek);

                                        echo '<tr>';
                                        echo '<td>' . $source['tanggal_permohonan'] . '</td>';
                                        echo '<td>' . $source['nama_merek'] . '</td>';
                                        echo '<td>' . $source['owner'][0]['tm_owner_name'] . '</td>';
                                        echo '<td>' . $source['status_permohonan'] . '</td>';
                                        echo '<td style="text-align: center;">' . $similarity . " %" . '</td>';
                                        echo '</tr>';
                                    }
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- GRAFIKKKK BRO -->

                    <?php
                    function calculateSimilarity($input, $namaMerek)
                    {
                        $input = strtolower($input);
                        $namaMerek = strtolower($namaMerek);

                        similar_text($input, $namaMerek, $percentage);
                        $similarity = round($percentage, 2);

                        return $similarity;
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
</div>

</body>
</html>
