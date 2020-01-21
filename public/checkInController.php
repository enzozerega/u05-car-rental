<?php
    namespace Main;
    
    class CheckInController {
    
        public function activeCustomers($twig) {
            $model = new Model();
            $customerArray = $model->getActiveCustomers();
            $map["customerArray"] = $customerArray;
            return $twig->render("checkInView.twig", $map);
        }

        public function checkInCar($request, $twig) {
            $form = $request->getForm();
            if(isset($form)) {
                $registernumber = $_POST['customers'];
            } else {
                echo "The car was not checked in";
            }
            $model = new Model();
            $model->updateCheckIn($registernumber);
            echo "Car successfully checked in";
            return $twig->render("checkedInView.twig");
        }

    }