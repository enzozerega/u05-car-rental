<?php

    class Customer {
        // Properties
        protected $personNumber;
        protected $name;
        protected $address;
        protected $postalCode;
        protected $phone;

        protected function __construct($personNumber, $name, $address, $postalCode, $phone) {
            $this->personNumber = $personNumber;
            $this->name = $name;
            $this->address = $address;
            $this->postalCode = $postalCode;
            $this->phone = $phone;
        }
        // Methods

        public function __destruct() {
            #Code for filling the table
        }

    }

?>