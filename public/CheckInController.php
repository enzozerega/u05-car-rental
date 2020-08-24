<?php
    namespace Main;
    /* Comments:

    ###Functions###
    activeCustomers: queries all customers that are currently renting a car.
    checkInCar: adds current time to checked in column in history database for the selected car.

    */
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
            return $twig->render("checkedInView.twig");
        }

    }