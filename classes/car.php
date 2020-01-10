<?php

    class Car {
        // Properties
        protected $registrationNumber;
        protected $make;
        protected $color;
        protected $year;
        protected $price;
        protected $checkIn;
        protected $checkOut;

        protected function __construct($registrationNumber, $make, $color, $year, $price, $checkIn, $checkOut) {
            $this->registrationNumber = $registrationNumber;
            $this->make = $make;
            $this->color = $color;
            $this->year = $year;
            $this->price = $price;
            if(!$checkIn || !$checkOut) {
                $this->checkIn = date('m/d/Y H:i:s', time());
                $this->checkOut = date('m/d/Y H:i:s', time());
            } else {
                $this->checkIn = $checkIn;
                $this->checkOut = $checkOut;
            }
        }
        // Methods


        public function __destruct() {
            #Code for filling the table
        }

    }

?>