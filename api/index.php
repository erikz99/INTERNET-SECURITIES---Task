<?php

require_once("services/ProductService.php");

$productService = new api\services\ProductService();

    if ($_GET['entity'] == "product") {
        switch ($_GET["action"]) {
            case "add" : 
                $json = file_get_contents('php://input');
                
                echo json_encode($productService->addProduct(json_decode($json)));
                break;
            case "delete":
                $id = $_GET["id"];
                echo json_encode($productService->deleteProduct($id));
                break;
            case "get-all":
                echo json_encode($productService->getAllProducts());
                break;
        }
    }

?>