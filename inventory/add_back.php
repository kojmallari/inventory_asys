<?php 
echo "<pre>";
print_r($_POST);
echo "</pre>";

include 'connect.php';

function sanitize_input($data) {
    $data = trim($data);                // Remove whitespaces
    $data = stripslashes($data);        // Remove backslashes
    $data = htmlspecialchars($data);    // Convert special characters
    return $data;
}

$prod_name = sanitize_input($_POST['prod_name']);
$quant_stock = isset($_POST['quant_stock']) ? $_POST['quant_stock'] : 0;
$quant_used = isset($_POST['quant_used']) ? $_POST['quant_used'] : 0;
$category = sanitize_input($_POST['category']);
$rec_name = sanitize_input($_POST['rec_name']);
$date_deliver = $_POST['date_deliver'];
$date_receive = $_POST['date_receive'];

if (empty($category)) {
    echo "<script>alert('Please select a category')</script>";
    echo "<script>document.location='add.php'</script>";
    exit();
}

//INSERT DATA INTO THE TABLE
$iSQL = "INSERT INTO SUPPLIES(PROD_NAME, QUANT_STOCK, QUANT_USED, CATEGORY, REC_NAME, DATE_DELIVER, DATE_RECEIVE)
VALUES(:prod_name, :quant_stock, :quant_used, :category, :rec_name, :date_deliver, :date_receive)";

$stmt = $pdo->prepare($iSQL);

$stmt->bindParam(':prod_name', $prod_name, PDO::PARAM_STR);
$stmt->bindParam(':quant_stock', $quant_stock, PDO::PARAM_INT);
$stmt->bindParam(':quant_used', $quant_used, PDO::PARAM_INT);
$stmt->bindParam(':category', $category, PDO::PARAM_STR);
$stmt->bindParam(':rec_name', $rec_name, PDO::PARAM_STR);
$stmt->bindParam(':date_deliver', $date_deliver, PDO::PARAM_STR);
$stmt->bindParam(':date_receive', $date_receive, PDO::PARAM_STR);

if ($stmt->execute()) {
    echo "<script>alert('Data insertion successful!')</script>";
    echo "<script>document.location='inventory_menu.php'</script>";
} else {
    $errorInfo = $stmt->errorInfo();
    echo "<script>alert('Data insertion failed: " . $errorInfo[2] . "')</script>";
    echo "<script>document.location='add.php'</script>";
}

?>