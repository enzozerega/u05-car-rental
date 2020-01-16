<?php
    include "customer.php";
    class Customercontrol extends Customer {
        public function createCustomer($personNumber, $name, $address, $postalCode, $phone) {
            $this->setCustomer($personNumber, $name, $address, $postalCode, $phone);
        }
    }

        /*public function setUserInput($personNumber, $name, $address, $postalCode, $phone) {
            $sql = "INSERT INTO customers (person_number, name, adress, postal_code, phone) VALUES (?, ?, ?, ?, ?)";
            $statement = $this->connect()->prepare($sql);
            $statement->execute([$personNumber, $name, $address, $postalCode, $phone]);
        }
        */