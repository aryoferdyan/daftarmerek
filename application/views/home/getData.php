<?php
// Include database connection code
include 'db_connection.php';

// Fetch data for DataTable
$table = $_GET['table'];
$sql = "SELECT * FROM $table";
$result = $conn->query($sql);

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Fetch counts
if ($_GET['count']) {
    $counts = array();

    $sqlPermohonan = "SELECT COUNT(*) as totalPermohonan FROM tbl_permohonan";
    $resultPermohonan = $conn->query($sqlPermohonan);
    $counts['totalPermohonan'] = $resultPermohonan->fetch_assoc()['totalPermohonan'];

    $sqlPermohonanDiterima = "SELECT COUNT(*) as totalPermohonanDiterima FROM tbl_permohonan WHERE status = 1";
    $resultPermohonanDiterima = $conn->query($sqlPermohonanDiterima);
    $counts['totalPermohonanDiterima'] = $resultPermohonanDiterima->fetch_assoc()['totalPermohonanDiterima'];

    $sqlLog = "SELECT COUNT(*) as totalLog FROM tbl_log";
    $resultLog = $conn->query($sqlLog);
    $counts['totalLog'] = $resultLog->fetch_assoc()['totalLog'];

    echo json_encode($counts);
} else {
    echo json_encode(['data' => $data]);
}

// Close database connection
$conn->close();
?>
