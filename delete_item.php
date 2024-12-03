<?php 
require 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['item_id'])) {
    $itemId = $_POST['item_id'];

    try {
        $sql = "DELETE FROM in_stock WHERE item_id = :item_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':item_id', $itemId, PDO::PARAM_INT);

        if ($stmt->execute()) {
            header("Location: checkonstock.php?status=success");
            exit();
        } else {
            header("Location: checkonstock.php?status=error");
            exit();
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}


?>