<?php
    namespace Main;
    /* Comments:

    ###Functions###

    showAllCars: queries all cars registered in database.
    addCar: generates page to select parameters for a new car.
    insertCar: add a new item to the cars database.
    updatedCar: edits existing car in database.
    editCar: generates page to select parameters for editing existing car.
    removeCar: removes item from cars database.
    */


    class CarsController {
        public function showAllCars($twig) {
            $model = new Model();
            $carArray = $model->getAllCars();
            $map = ["carArray" => $carArray];
            return $twig->render("carsView.twig", $map);
        }

        public function addCar($twig) {
            $model = new Model();
            $colorArray = $model->getAllColors();
            $makeArray = $model->getAllMakes();
            $map["colorArray"] = $colorArray;
            $map["makeArray"] = $makeArray;
            return $twig->render("addCarView.twig", $map);
        }

        public function insertCar($request, $twig) {
            $form = $request->getForm();
            if(isset($form)) {
                $newcar = new Model();
                $registernumber = $_POST['registernumber'];
                $make = $_POST['make'];
                $color = $_POST['color'];
                $year = $_POST['year'];
                $price = $_POST['price'];
                $newcar->setCar($registernumber, $make, $color, $year, $price);
            } else {
                echo "No car added";
            }
            return $twig->render("carAddedView.twig");
        }

        public function updatedCar($request, $key, $twig) {
            $form = $request->getForm();
            if(isset($form)) {
                $selectedCar = new Model();
                $make = $_POST['make'];
                $color = $_POST['color'];
                $year = $_POST['year'];
                $price = $_POST['price'];
                $selectedCar->updateCar($make, $color, $year, $price, $key);
            } else {
                echo "The car coud not be updated";
            }
            return $twig->render("carEditedView.twig");
        }

        public function editedCar($key, $twig) {
            $model = new Model();
            $selectedCar = $model->editCar($key);
            $colorArray = $model->getAllColors();
            $makeArray = $model->getAllMakes();
            $map["colorArray"] = $colorArray;
            $map["makeArray"] = $makeArray;
            $map["selectedCar"] = $selectedCar;
            return $twig->render("editCarView.twig", $map);
        }

        public function removeCar($key, $twig) {
            $selectedCar = new Model();
            $selectedCar->deleteCar($key);
            return $twig->render("carRemovedView.twig");
        }

    }