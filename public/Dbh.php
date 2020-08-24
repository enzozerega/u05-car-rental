<?php
    namespace Main;

    use PDO;
    
    class Dbh {
        private $host = "eu-cdbr-west-03.cleardb.net";
        private $user = "bc02b760684b37";
        private $password = "145cf665";
        private $dbName = "heroku_382c36c7f290cd8";

        public function connect() {
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
            try {
                $pdo = new PDO($dsn, $this->user, $this->password);
                $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                return $pdo;
            } catch (PDOException $e) {
                echo 'Connection failed: ' . $e->getMessage();
            }
        }
    }