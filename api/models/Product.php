<?php
    namespace api\models;
    class Product implements \JsonSerializable {
        private $id;
        private $name;

        
        public function __construct() {
        }

        public function getName() {
            return $this->name;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function jsonSerialize() : array {
            $fieldsToSerialize = ["id", "name"];
            
            $jsonArray = [];

            foreach($fieldsToSerialize as $fieldName) {
                $jsonArray[$fieldName] = $this->$fieldName;
            }

            return $jsonArray;
        }
    }

?>