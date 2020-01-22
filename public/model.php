<?php
    namespace Main;

    use Main\Dbh;

    class Model {

        public function __construct() {
            $connection = new Dbh();
            $this->connection = $connection->connect();
        }

        public function getAllCustomers() {
            $sql = "SELECT customers.person_number 'person_number', customers.name 'name', customers.adress 'adress', customers.postal_code 'postal_code', customers.phone 'phone', history.checked_in 'checkedin', history.checked_out 'checkedout' FROM customers LEFT JOIN history ON customers.person_number = history.person_number LEFT JOIN cars ON cars.register_number = history.register_number";
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
            $sql = "SELECT cars.register_number, cars.make, cars.color, cars.year, cars.price, history.last_checked_out, history.person_number, history.checked_in FROM cars LEFT JOIN (SELECT  max(person_number) as person_number, register_number, max(checked_out) AS last_checked_out, if(min(IFNULL(checked_in, 0)) = 0, NULL, min(checked_in)) as checked_in FROM history GROUP BY register_number) history ON cars.register_number = history.register_number";
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

        public function getAvailableCars() {
            $sql = "SELECT cars.register_number, cars.make, cars.color, cars.year, cars.price, history.last_checked_out, history.person_number, history.checked_in FROM cars LEFT JOIN (SELECT  max(person_number) as person_number, register_number, max(checked_out) AS last_checked_out, if(min(IFNULL(checked_in, 0)) = 0, NULL, min(checked_in)) as checked_in FROM history GROUP BY register_number) history ON cars.register_number = history.register_number";
            $statement = $this->connection->prepare($sql);
            $statement->execute();
            $results = $statement->fetchAll();
            return $results;
        }

        public function updateCheckOut($registernumber, $personnumber) {
            date_default_timezone_set("Europe/Stockholm");
            $dateTime = date("Y-m-d h:m:s");
            $sql = "INSERT INTO history (person_number, register_number, checked_out) VALUES (?, ?, ?)";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$personnumber, $registernumber, $dateTime]);
        }

        public function getHistory() {
            $sql = "SELECT cars.register_number, history.checked_out, history.checked_in, cars.price, history.person_number, DATEDIFF(history.checked_in, history.checked_out) as days, cars.price*DATEDIFF(history.checked_in, history.checked_out) as cost FROM cars JOIN history ON cars.register_number = history.register_number";
            $statement = $this->connection->prepare($sql);
            $statement->execute();
            $results = $statement->fetchAll();
            return $results;
        }

        public function getHiredCars() {
            $sql = "SELECT * FROM history WHERE checked_in IS NULL AND checked_out IS NOT NULL";
            $statement = $this->connection->prepare($sql);
            $statement->execute();
            $results = $statement->fetchAll();
            return $results;
        }

        public function getActiveCustomers() {
            $sql = "SELECT history.person_number, cars.register_number, cars.make, cars.color FROM cars JOIN history ON cars.register_number = history.register_number WHERE history.checked_in IS NULL AND history.checked_out IS NOT NULL";
            $statement = $this->connection->prepare($sql);
            $statement->execute();
            $results = $statement->fetchAll();
            return $results;
        }

        public function updateCheckIn($registernumber) {
            date_default_timezone_set("Europe/Stockholm");
            $dateTime = date("Y-m-d h:m:s");
            $sql = "UPDATE history SET checked_in = ? WHERE register_number = ? AND checked_in IS NULL";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$dateTime, $registernumber]);
            $results = $statement->fetch();
            return $results;
        }

        public function deleteFromHistory($key) {
            $sql = "DELETE FROM history WHERE person_number = '".$key."'";
            $statement = $this->connection->prepare($sql);
            $statement->execute();
        }

    }