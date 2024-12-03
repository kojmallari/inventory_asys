<?php 
require 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $item_id = $_POST['item_id'];
    $item_name = $_POST['item_name'];
    $category = $_POST['category'];
    $quantity_in_stock = $_POST['quantity_in_stock'];
    $location = $_POST['location'];

    try {
        $sql = "UPDATE in_stock SET item_name = :item_name, category = :category, quantity_in_stock = :quantity_in_stock, location = :location
        WHERE item_id = :item_id";
        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ':item_id' => $item_id,
            ':item_name' => $item_name,
            ':category' => $category,
            ':quantity_in_stock' => $quantity_in_stock,
            ':location' => $location,
        ]);

        header('Location: checkonstock.php');
        exit();
    } catch (PDOException $e) {
        echo "Error: " . htmlspecialchars($e->getMessage());
    }
}

?>