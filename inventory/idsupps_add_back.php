<?php 
include 'connect.php';

function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$prod_name = sanitize_input($_POST['prod_name']);
$quant_stock = isset($_POST['quant_stock']) ? $_POST['quant_stock'] : 0;
$quant_used = isset($_POST['quant_used']) ? $_POST['quant_used'] : 0;
$category = sanitize_input($_POST['category']);
$receiver = sanitize_input($_POST['receiver']);
$date_receive = $_POST['date_receive'];

if (empty($category)) {
    echo "<script>alert('Please select a category')</script>";
    echo "<script>document.location='idsupps_add.php'</script>";
    exit();
}

//INSERT DATA INTO THE TABLE
$inSQL = "INSERT INTO idsupps(PROD_NAME, QUANT_STOCK, QUANT_USED, CATEGORY, RECEIVER, DATE_RECEIVE)
VALUES(:prod_name, :quant_stock, :quant_used, :category, :receiver, :date_receive)";

$stmt = $pdo->prepare($inSQL);

$stmt->bindParam(':prod_name', $prod_name, PDO::PARAM_STR);
$stmt->bindParam(':quant_stock', $quant_stock, PDO::PARAM_INT);
$stmt->bindParam(':quant_used', $quant_used, PDO::PARAM_INT);
$stmt->bindParam(':category', $category, PDO::PARAM_STR);
$stmt->bindParam(':receiver', $receiver, PDO::PARAM_STR);
$stmt->bindParam(':date_receive', $date_receive, PDO::PARAM_STR);

if ($stmt->execute()) {
    echo "<script>alert('Data insertion successful!')</script>";
    echo "<script>document.location='idsupps_view.php'</script>";
} else {
    $errorInfo = $stmt->errorInfo();
    echo "<script>alert('Data insertion failed: " . $errorInfo[2] . "')</script>";
    echo "<script>document.location='idsupps_add.php'</script>";
}

?>