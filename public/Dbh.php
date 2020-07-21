<?php
    namespace Main;

    use PDO;
    
    class Dbh {
        private $host = "my55b.sqlserver.se";
        private $user = "244091_sl32760";
        private $password = "Enze22ega";
        private $dbName = "244091-rentacar";

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