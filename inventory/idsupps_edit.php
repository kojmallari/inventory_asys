<?php 
include 'connect.php';
$eid = $_GET['editID'];

try {
    $eQuery = $pdo->query("SELECT * FROM idsupps WHERE ITEM_NUM='$eid'");
    while($records = $eQuery->fetch(PDO::FETCH_ASSOC)){
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet"/>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <title>ITSS Inventory System - Edit Product</title>
    </head>
    <body>
        <div class="flex flex-col items-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <a href="index.php" class="flex items-center mb-3 mt-2 text-2xl font-semibold text-gray-900 dark:text-white">
                <img class="w-50 h-20 mr-2" src="uploads/hau2.png" alt="logo">
            </a>
            <h3 class="text-3xl font-bold">
                ITSS Inventory System
            </h3>
            <hr class="w-full text-center mt-10">
            <br>

            <nav id="breadcumb-container" class="flex mb-4" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                    <a href="home.php" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M21 13v10h-6v-6h-6v6h-6v-10h-3l12-12 12 12h-3zm-1-5.907v-5.093h-3v2.093l3 3z"></path></svg>
                        Home
                    </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                        <svg class="w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="m11.75 3c-.414 0-.75.336-.75.75v16.5c0 .414.336.75.75.75s.75-.336.75-.75v-16.5c0-.414-.336-.75-.75-.75z" clip-rule="evenodd"></path></svg>
                        </div>
                    </li>
                    <li class="inline-flex items-center">
                    <a href="inventory_menu.php" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M22 18.055v2.458c0 1.925-4.655 3.487-10 3.487-5.344 0-10-1.562-10-3.487v-2.458c2.418 1.738 7.005 2.256 10 2.256 3.006 0 7.588-.523 10-2.256zm-10-3.409c-3.006 0-7.588-.523-10-2.256v2.434c0 1.926 4.656 3.487 10 3.487 5.345 0 10-1.562 10-3.487v-2.434c-2.418 1.738-7.005 2.256-10 2.256zm0-14.646c-5.344 0-10 1.562-10 3.488s4.656 3.487 10 3.487c5.345 0 10-1.562 10-3.487 0-1.926-4.655-3.488-10-3.488zm0 8.975c-3.006 0-7.588-.523-10-2.256v2.44c0 1.926 4.656 3.487 10 3.487 5.345 0 10-1.562 10-3.487v-2.44c-2.418 1.738-7.005 2.256-10 2.256z"></path></svg>
                        Inventory List
                    </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                        <svg class="w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="m11.75 3c-.414 0-.75.336-.75.75v16.5c0 .414.336.75.75.75s.75-.336.75-.75v-16.5c0-.414-.336-.75-.75-.75z" clip-rule="evenodd"></path></svg>
                        </div>
                    </li>
                    <li class="inline-flex items-center">
                    <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M18.513 7.119c.958-1.143 1.487-2.577 1.487-4.036v-3.083h-16v3.083c0 1.459.528 2.892 1.487 4.035l3.086 3.68c.567.677.571 1.625.009 2.306l-3.13 3.794c-.936 1.136-1.452 2.555-1.452 3.995v3.107h16v-3.107c0-1.44-.517-2.858-1.453-3.994l-3.13-3.794c-.562-.681-.558-1.629.009-2.306l3.087-3.68zm-4.639 7.257l3.13 3.794c.652.792.996 1.726.996 2.83h-1.061c-.793-2.017-4.939-5-4.939-5s-4.147 2.983-4.94 5h-1.06c0-1.104.343-2.039.996-2.829l3.129-3.793c1.167-1.414 1.159-3.459-.019-4.864l-3.086-3.681c-.66-.785-1.02-1.736-1.02-2.834h12c0 1.101-.363 2.05-1.02 2.834l-3.087 3.68c-1.177 1.405-1.185 3.451-.019 4.863"></path></svg>
                        Pending Items
                    </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                        <svg class="w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="m11.75 3c-.414 0-.75.336-.75.75v16.5c0 .414.336.75.75.75s.75-.336.75-.75v-16.5c0-.414-.336-.75-.75-.75z" clip-rule="evenodd"></path></svg>
                        </div>
                    </li>
                    <li class="inline-flex items-center">
                    <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M14 0v10l2-1.518 2 1.518v-10h4v24h-17c-1.657 0-3-1.343-3-3v-18c0-1.657 1.343-3 3-3h9zm6 20h-14.505c-1.375 0-1.375 2 0 2h14.505v-2z"></path></svg>
                        Activity/Audit Log
                    </a>
                    </li>
                </ol>
            </nav>

            <section class="bg-white dark:bg-gray-900">
                <div class="px-8 py-4 mx-auto max-w-2xl lg:py-16">
                    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Edit/Update a product</h2>
                    <form method="post">
                        <table class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <tr class="w-full">
                                <td><label for="prod_name" class="block mb-2 mr-2 text-sm font-medium text-gray-900 dark:text-white">Product Name</label></td>
                                <td><input type="text" name="prod_name" id="prod_name" value="<?php echo $records['PROD_NAME'];?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"/></td>
                            </tr>
                            <tr>
                                <td><label for="quant_receive" class="block mb-2 mr-2 text-sm font-medium text-gray-900 dark:text-white">Quantity (Received)</label></td>
                                <td><input type="number" name="quant_receive" id="quant_receive" value="<?php echo $records['QUANT_RECEIVE'];?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"/></td>
                            </tr>
                            <tr>
                                <td><label for="quant_used" class="block mb-2 mr-2 text-sm font-medium text-gray-900 dark:text-white">Quantity (In Use)</label></td>
                                <td><input type="number" name="quant_used" id="quant_used" value="<?php echo $records['QUANT_USED'];?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"/></td>
                            </tr>
                            <tr>
                                <td><label for="receiver" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name of Receiver</label></td>
                                <td><input type="text" name="receiver" id="receiver" value="<?php echo $records['RECEIVER'];?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"/></td>
                            </tr>
                            <tr>
                                <td><label for="date_receive" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date Received</label></td>
                                <td><input type="text" name="date_receive" id="date_receive" value="<?php echo $records['DATE_RECEIVE'];?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"/></td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="submit" name="submit" class="px-5 py-2.5 mt-10 text-sm font-medium text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Save changes
                                    </button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </section>
        </div>
    </body>
</html>
<?php
    }
    if(isset($_POST['submit'])){
        $eid = $_GET['editID'];
        //GETTING POST VALUES
        $item_num = isset($_POST['item_num']) ? $_POST['item_num'] : 0;
        $prod_name = isset($_POST['prod_name']) ? $_POST['prod_name'] : 0;
        $quant_receive = isset($_POST['quant_receive']) ? $_POST['quant_receive'] : 0;
        $quant_used = isset($_POST['quant_used']) ? $_POST['quant_used'] : 0;
        $receiver = isset($_POST['receiver']) ? $_POST['receiver'] : 0;
        $date_receive = isset($_POST['date_receive']) ? $_POST['date_receive'] : 0;

        $upQuery = $pdo->prepare("UPDATE idsupps SET PROD_NAME = :prod_name, QUANT_RECEIVE = :quant_receive, QUANT_USED = :quant_used, RECEIVER = :receiver, DATE_RECEIVE = :date_receive WHERE ITEM_NUM = :item_num");

        $upQuery->bindParam(':item_num', $item_num);
        $upQuery->bindParam(':prod_name', $prod_name);
        $upQuery->bindParam(':quant_receive', $quant_receive);
        $upQuery->bindParam(':quant_used', $quant_used);
        $upQuery->bindParam(':receiver', $receiver);
        $upQuery->bindParam(':date_receive', $date_receive);

        $upQuery->execute();
        /*print_r($_POST);
        exit();*/

        echo "<script>alert('Data successfully updated');</script>";
        echo "<script>document.location='idsupps_view.php';</script>";
    }
} catch (PDOException $e) {
    echo 'Query failed: ' . $e->getMessage();
}


?>