<?php 
require 'connect.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$records_per_page = 10;
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($current_page - 1) * $records_per_page;

try {
    $total_sql = "SELECT COUNT(*) AS total FROM in_stock";
    $total_stmt = $pdo->query($total_sql);
    $total_records = $total_stmt->fetch(PDO::FETCH_ASSOC)['total'];

    $sql = "SELECT * FROM in_stock LIMIT :limit OFFSET :offset";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':limit', $records_per_page, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $total_pages = ceil($total_records / $records_per_page);
} catch (PDOException $e) {
    echo "Error: " . htmlspecialchars($e->getMessage());
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITSS Inventory System | Check On-Stock</title>
    <link href="https://fonts.cdnfonts.com/css/neue-haas-grotesk-display-pro" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <div class="top-layer">
        <div class="image-container">
            <p class="office-title">ITSS Inventory System</p>
            <div class="wrapper">
                <div class="right-button-container">
                    <a href="index.php"><button class="icon-button">
                        <svg class="icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" width="24" height="24">
                            <path d="M21 13v10h-6v-6h-6v6h-6v-10h-3l12-12 12 12h-3zm-1-5.907v-5.093h-3v2.093l3 3z"/>
                        </svg>
                        <span class="button-text">Home</span>
                    </button></a>
                    <a href="checkonstock.php"><button class="icon-button">
                        <svg class="icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" width="24" height="24">
                            <path d="M17.677 16.879l-.343.195v-1.717l.343-.195v1.717zm2.823-3.324l-.342.195v1.717l.342-.196v-1.716zm3.5-7.602v11.507l-9.75 5.54-10.25-4.989v-11.507l9.767-5.504 10.233 4.953zm-11.846-1.757l7.022 3.2 1.7-.917-7.113-3.193-1.609.91zm.846 7.703l-7-3.24v8.19l7 3.148v-8.098zm3.021-2.809l-6.818-3.24-2.045 1.168 6.859 3.161 2.004-1.089zm5.979-.943l-2 1.078v2.786l-3 1.688v-2.856l-2 1.078v8.362l7-3.985v-8.151zm-4.907 7.348l-.349.199v1.713l.349-.195v-1.717zm1.405-.8l-.344.196v1.717l.344-.196v-1.717zm.574-.327l-.343.195v1.717l.343-.195v-1.717zm.584-.332l-.35.199v1.717l.35-.199v-1.717zm-16.656-4.036h-2v1h2v-1zm0 2h-3v1h3v-1zm0 2h-2v1h2v-1z"/>
                        </svg>
                        <span class="button-text">Check On-Stock</span>
                    </button></a>
                    <a href="checkdelivered.php"><button class="icon-button">
                        <svg class="icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" width="24" height="24">
                            <path d="M3 18h-2c-.552 0-1-.448-1-1v-2h15v-9h4.667c1.117 0 1.6.576 1.936 1.107.594.94 1.536 2.432 2.109 3.378.188.312.288.67.288 1.035v4.48c0 1.121-.728 2-2 2h-1c0 1.656-1.344 3-3 3s-3-1.344-3-3h-6c0 1.656-1.344 3-3 3s-3-1.344-3-3zm3-1.2c.662 0 1.2.538 1.2 1.2 0 .662-.538 1.2-1.2 1.2-.662 0-1.2-.538-1.2-1.2 0-.662.538-1.2 1.2-1.2zm12 0c.662 0 1.2.538 1.2 1.2 0 .662-.538 1.2-1.2 1.2-.662 0-1.2-.538-1.2-1.2 0-.662.538-1.2 1.2-1.2zm-4-2.8h-14v-10c0-.552.448-1 1-1h12c.552 0 1 .448 1 1v10zm3-6v3h4.715l-1.427-2.496c-.178-.312-.509-.504-.868-.504h-2.42z"/>
                        </svg>
                        <span class="button-text">Check Delivered</span>
                    </button></a>
                    <a href="logout.php"><button class="icon-button">
                        <svg class="icon" aria-hidden="true" xlmns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" width="24" height="24">
                            <path d="M16 2v7h-2v-5h-12v16h12v-5h2v7h-16v-20h16zm2 9v-4l6 5-6 5v-4h-10v-2h10z"/>
                        </svg>
                        <span class="button-text">Logout</span>
                    </button></a>
                </div>
            </div>
        </div>
    </div>
    <hr class="hr-rule">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>In Stock Supplies</h1>
            <div class="d-flex">
                <input type="text" id="searchBar" class="form-control d-inline-block me-2" placeholder="Search...">
                <button id="addItemBtn" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#addItemModal">
                    Add Item
                </button>
                <a href="#" id="exportBtn" class="btn btn-success">
                    Export to CSV
                </a>
            </div>
        </div>
        <table class="table table-dark table-bordered table-hover table-striped rounded">
            <thead class="table-group-divider">
                <tr>
                    <th scope="col">Item ID</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Quantity in Stock</th>
                    <th scope="col">Location</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <?php if (count($items) > 0): ?>
                    <?php foreach ($items as $item): ?>
                        <tr>
                            <td><?= htmlspecialchars($item['item_id']) ?></td>
                            <td><?= htmlspecialchars($item['item_name']) ?></td>
                            <td><?= htmlspecialchars($item['category']) ?></td>
                            <td><?= htmlspecialchars($item['quantity_in_stock']) ?></td>
                            <td><?= htmlspecialchars($item['location']) ?></td>
                            <td>
                                <button class="btn btn-primary btn-sm" onclick="openEditModal(
                                '<?= htmlspecialchars($item['item_id'], ENT_QUOTES) ?>',
                                '<?= htmlspecialchars($item['item_name'], ENT_QUOTES)?>',
                                '<?= htmlspecialchars($item['category'], ENT_QUOTES) ?>',
                                '<?= htmlspecialchars($item['quantity_in_stock'], ENT_QUOTES) ?>',
                                '<?= htmlspecialchars($item['location'], ENT_QUOTES)?>')">Edit</button>

                                <button class="btn btn-danger btn-sm" onclick="openDeleteModal(
                                '<?= htmlspecialchars($item['item_id'], ENT_QUOTES) ?>',
                                '<?= htmlspecialchars($item['item_name'], ENT_QUOTES) ?>')">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">No records founds.</td>
                    </tr>
                <?php endif; ?>    
            </tbody>
        </table>
    </div>
    <nav>
        <ul class="pagination justify-content-center">
            <li class="page-item <?= ($current_page <= 1) ? 'disabled' : '' ?>">
                <a class="page-link" href="?page=<?= $current_page - 1 ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>

            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <li class="page-item <?= ($i == $current_page) ? 'active' : '' ?>">
                    <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>

            <li class="page-item <?= ($current_page >= $total_pages) ? 'disabled' : '' ?>">
                <a class="page-link" href="?page=<?= $current_page + 1 ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
    <div class="modal fade" id="addItemModal" tabindex="1" aria-labelledby="addItemModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="addItemForm" method="POST" action="add_item.php">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addItemModalLabel">Add New Item</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="itemName" class="form-label">Item Name</label>
                            <input type="text" class="form-control" id="itemName" name="item_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select" id="category" name="category" required>
                                <option value="" selected disabled>Select a category</option>
                                <option value="Office Supplies">Office Supplies</option>
                                <option value="Computer Hardware">Computer Hardware</option>
                                <option value="Network Equipment">Network Equipment</option>
                                <option value="Printer Supplies">Printer Supplies</option>
                                <option value="ID Supplies">ID Supplies</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="quantityInStock" class="form-label">Quantity in Stock</label>
                            <input type="number" class="form-control" id="quantityInStock" name="quantity_in_stock" required>
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control" id="location" name="location" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Item</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteItemModal" tabindex="1" aria-labelledby="deleteItemModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteItemModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete?</p>
                    <strong>This action cannot be undone.</strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form id="deleteItemForm" class="btn btn-danger" method="POST" action="delete_item.php">
                        <input type="hidden" id="itemIdToDelete" name="item_id" value="">
                        <button type="submit" class="btn btn-danger btn-sm">Delete Item</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editItemModal" tabindex="-1" aria-labelledby="editItemModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editItemForm" action="edit_item.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editItemModalLabel">Edit Item</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="editItemId" name="item_id">
                        <div class="mb-3">
                            <label for="editItemName" class="form-label">Item Name</label>
                            <input type="text" class="form-control" id="editItemName" name="item_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="editCategory" class="form-label">Category</label>
                            <select class="form-select" id="editCategory" name="category" required>
                                <option value="" selected disabled>Select a category</option>
                                <option value="Office Supplies">Office Supplies</option>
                                <option value="Computer Hardware">Computer Hardware</option>
                                <option value="Network Equipment">Network Equipment</option>
                                <option value="Printer Supplies">Printer Supplies</option>
                                <option value="ID Supplies">ID Supplies</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="editQuantityinStock" class="form-label">Quantity in Stock</label>
                            <input type="number" class="form-control" id="editQuantityinStock" name="quantity_in_stock" required>
                        </div>
                        <div class="mb-3">
                            <label for="editLocation" class="form-label">Location</label>
                            <input type="text" class="form-control" id="editLocation" name="location" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script>
        function openDeleteModal(itemId, itemName) {
            document.getElementById('itemName').innerText = itemName;
            document.getElementById('itemIdToDelete').value = itemId;

            var myModal = new bootstrap.Modal(document.getElementById('deleteItemModal'));
            myModal.show();
        }
        function openEditModal(itemId, itemName, category, quantityInStock, location) {
            document.getElementById('editItemId').value = itemId;
            document.getElementById('editItemName').value = itemName;
            document.getElementById('editCategory').value = category;
            document.getElementById('editQuantityinStock').value = quantityInStock;
            document.getElementById('editLocation').value = location;

            let editModal = new bootstrap.Modal(document.getElementById('editItemModal'));
            editModal.show();
        }
    </script>
</body>
</html>