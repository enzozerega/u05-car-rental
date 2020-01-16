<?php
    include "dbh.php";
    class Customer extends Dbh {
        protected function getCustomer() {
            $sql = "SELECT * FROM customers";
            $statement = $this->connect()->prepare($sql);
            $statement->execute();
            $results = $statement->fetchAll();
            return $results;
        }

        protected function setCustomer($personNumber, $name, $address, $postalCode, $phone) {
            $sql = "INSERT INTO customers (person_number, name, adress, postal_code, phone) VALUES (?, ?, ?, ?, ?)";
            $statement = $this->connect()->prepare($sql);
            $statement->execute([$personNumber, $name, $address, $postalCode, $phone]);
        }
    }