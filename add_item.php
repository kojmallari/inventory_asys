<?php 
require 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $item_name = $_POST['item_name'];
    $category = $_POST['category'];
    $quantity_in_stock = $_POST['quantity_in_stock'];
    $location = $_POST['location'];

    try {
        $sql = "INSERT INTO in_stock (item_name, category, quantity_in_stock, location)
                VALUES (:item_name, :category, :quantity_in_stock, :location)";
        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ':item_name' => $item_name,
            ':category' => $category,
            ':quantity_in_stock' => $quantity_in_stock,
            ':location' => $location,
        ]);
        header('Location: checkonstock.php');
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}


?>