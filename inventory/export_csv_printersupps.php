<?php 
include 'connect.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['export_csv'])) {
    try {
        $filename = "exported_data_" . date('Ymd') . ".csv";

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        $output = fopen("php://output", "w");

        fputcsv($output, array('ITEM_NUM', 'PROD_NAME','PROD_CODE','QUANT_RECEIVE', 'QUANT_USED', 'QUANT_REMAIN', 'CATEGORY', 'RECEIVER', 'DATE_RECEIVE', 'CREATED_AT', 'UPDATED_AT'));

        $export_query = "SELECT * FROM printersupps";
        $stmt = $pdo->query($export_query);

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            fputcsv($output, $row);
        }

        fclose($output);
        exit();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}


?>