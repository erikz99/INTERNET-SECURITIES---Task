<?php
    namespace api\services;

    require_once("config/DB.php");
    require_once("models/Product.php");

    class ProductService { 
        private $db;
        private $conndection; 

        function __construct() {
            try {
                $this->db = new \api\config\DB("shop");
                $this->connection = $this->db->getConnection();
            } catch (\PDOException $e) {
                echo $e->getMessage();
            }
        }

        function getAllProducts() {
            try {
                $sql = "SELECT id, name FROM product";
                $products = $this->connection->query($sql);
                
                $result = [];

                while ($row = $products->fetchObject("\api\models\Product")) {
                    $result[] = $row;
                }

                return $result;
            } catch (\PDOException $e) {
                
            }
        }

        function deleteProduct($id) {
            try {
                $sql = "DELETE FROM product WHERE id = ?";
                $stmt = $this->connection->prepare($sql);
                $stmt->execute([$id]);

                return array("success" => true);

            } catch (\PDOException $e) {
                return array("success" => false);
            }
        }

        function addProduct($request) {
            try {
                $sql = "INSERT INTO product (name) VALUES (?) ";
                $stmt = $this->connection->prepare($sql);
                $stmt->execute([$request->name]);

                return array("success" => true);

            } catch (\PDOException $e) {
                return array("success" => false);
            }
        }

    }

?>