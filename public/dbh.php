<?php
    namespace Main;

    use PDO;
    
    class Dbh {
        private $host = "my55b.sqlserver.se";
        private $user = "244091_sl32760";
        private $password = "Enze22ega";
        private $dbName = "rentacar-244091";

        public function connect() {
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
            $pdo = new PDO($dsn, $this->user, $this->password);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        }
    }