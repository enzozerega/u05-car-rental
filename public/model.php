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

        public function editCustomer($key) {
            $sql = "SELECT * FROM customers WHERE person_number = ?";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$key]);
            $results = $statement->fetch();
            return $results;
        }

        public function deleteCustomer($key) {
            $sql = "DELETE FROM customers WHERE person_number = '".$key."'";
            $statement = $this->connection->prepare($sql);
            $statement->execute();
        }

        public function updateCustomer($name, $address, $postalcode, $phone, $key) {
            $sql = "UPDATE customers SET name = ?, adress = ?, postal_code = ?, phone = ? WHERE person_number = ?";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$name, $address, $postalcode, $phone, $key]);
            $results = $statement->fetch();
            return $results;
        }

        public function getAllCars() {
            $sql = "SELECT * FROM cars";
            $statement = $this->connection->prepare($sql);
            $statement->execute();
            $results = $statement->fetchAll();
            return $results;
        }

        public function setCar($registernumber, $make, $color, $year, $price) {
            $sql = "INSERT INTO cars (register_number, make, color, year, price) VALUES (?, ?, ?, ?, ?)";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$registernumber, $make, $color, $year, $price]);
        }

        public function updateCar($make, $color, $year, $price, $key) {
            $sql = "UPDATE cars SET make = ?, color = ?, year = ?, price = ? WHERE register_number = ?";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$make, $color, $year, $price, $key]);
            $results = $statement->fetch();
            return $results;
        }

        public function editCar($key) {
            $sql = "SELECT * FROM cars WHERE register_number = ?";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$key]);
            $results = $statement->fetch();
            return $results;
        }

        public function deleteCar($key) {
            $sql = "DELETE FROM cars WHERE register_number = '".$key."'";
            $statement = $this->connection->prepare($sql);
            $statement->execute();
        }
    }