<?php
    include "dbh.php";
    class User extends Dbh {
        public function getUser() {
            $sql = "SELECT * FROM user";
            $statement = $this->connect()->prepare($sql);
            $statement->execute();
            $results = $statement->fetchAll();
            return $results;
        }

        public function setUser($inputname) {
            $sql = "INSERT INTO user (name) VALUES (?)";
            $statement = $this->connect()->prepare($sql);
            $statement->execute([$inputname]);
        }
    }