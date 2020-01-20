<?php
    namespace Main;
    
    class CheckOutController {
    
        public function carAvailables($twig) {
            $model = new Model();
            $carArray = $model->getAvailableCars();
            $map["carArray"] = $carArray;
            $customerArray = $model->getAllCustomers();
            $map["customerArray"] = $customerArray;
            return $twig->render("checkOutView.twig", $map);
        }

        public function checkOutCar($carKey, $customerKey, $twig) {
            $registernumber = $carKey;
            $personnumber = $customerKey;
            $model = new Model();
            $model->updateCheckOut($registernumber, $personnumber);
            echo "Check out complete";
            return $twig->render("checkedOutView.twig");
        }
    }