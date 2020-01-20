<?php
    namespace Main;

    use Main\Dbh;

    class Model {

        public function __construct() {
            $connection = new Dbh();
            $this->connection = $connection->connect();
        }

        public function getAllCustomers() {
            $sql = "SELECT * FROM customers";
            $statement = $this->connection->prepare($sql);
            $statement->execute();
            $results = $statement->fetchAll();
            return $results;
        }

        public function setCustomer($personNumber, $name, $address, $postalCode, $phone) {
            $sql = "INSERT INTO customers (person_number, name, adress, postal_code, phone) VALUES (?, ?, ?, ?, ?)";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$personNumber, $name, $address, $postalCode, $phone]);
        }

        public function editCostumer($key) {
            $sql = "SELECT * FROM customers WHERE person_number = ?";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$key]);
            $results = $statement->fetch();
            return $results;
        }

        public function deleteCostumer($key) {
            $sql = "DELETE FROM customers WHERE person_number = '".$key."'";
            $statement = $this->connection->prepare($sql);
            $statement->execute();
        }

        public function updateCostumer($name, $address, $postalcode, $phone, $key) {
            $sql = "UPDATE customers SET name = ?, adress = ?, postal_code = ?, phone = ? WHERE person_number = ?";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$name, $address, $postalcode, $phone, $key]);
            $results = $statement->fetch();
            return $results;
        }
    }