<?php
    include "customer.php";
    class Customerview extends Customer {
        public function showCustomer() {
            $result = $this->getCustomer();
            return $result;
        }
    }