<?php
    namespace api\config;

    class DB {

        private $connection;

        function __construct($dbName) {
            $config = parse_ini_file('config.ini', true);

            $type = $config['db']['type'];
            $host = $config['db']['host'];
            $name = $config['db']['name'];
            $user = $config['db']['user'];
            $password = $config['db']['password'];

            $this->init($type, $host, $name, $user, $password);
        }

        private function init($type, $host, $name, $user, $password) {
            try {
                $this->connection = new \PDO("$type:host=$host;dbname=$name", $user, $password,
                    array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

            } catch(\PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }

        function getConnection() {
            return $this->connection;
        }
    }

?>