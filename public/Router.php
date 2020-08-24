<?php
    namespace Main;

    use Main\CustomersController;
    use Main\MainController;
    
    class Router {

        public function route($request, $twig) {
            $path = $request->getPath();

            if ($path == "/customers") {
                $controller = new CustomersController();
                return $controller->showAllCustomers($twig);
            } else if ($path == "/") {
                $controller = new MainController();
                return $controller->mainMenu($twig);
            } else if ($path == "/addCustomer") {
                $controller = new CustomersController();
                return $controller->addCustomer($twig);
            } else if ($path == "/customerAdded") {
                $controller = new CustomersController();
                return $controller->insertCustomer($request, $twig);
            } else if (strpos($path, "customerEdited") && preg_match('#[0-9]#', $path)) {
                $controller = new CustomersController();
                $key = substr($path, 15, 25);
                return $controller->updatedCustomer($request, $key, $twig);
            } else if (strpos($path, "editCustomer") && preg_match('#[0-9]#', $path)) {
                $key = substr($path, 13, 23);
                $controller = new CustomersController();
                return $controller->editedCustomer($key, $twig);
            } else if (strpos($path, "customerRemoved") && preg_match('#[0-9]#', $path)) {
                $key = substr($path, 16, 26);
                $controller = new CustomersController();
                return $controller->removeCustomer($key, $twig);
            } else if ($path == "/cars") {
                $controller = new CarsController();
                return $controller->showAllCars($twig);
            } else if ($path == "/addCar") {
                $controller = new CarsController();
                return $controller->addCar($twig);
            } else if ($path == "/carAdded") {
                $controller = new CarsController();
                return $controller->insertCar($request, $twig);
            } else if (strpos($path, "carEdited") && preg_match('#[0-9]#', $path)) {
                $controller = new CarsController();
                $key = substr($path, 10, 16);
                return $controller->updatedCar($request, $key, $twig);
            } else if (strpos($path, "editCar") && preg_match('#[0-9]#', $path)) {
                $key = substr($path, 8, 18);
                $controller = new CarsController();
                return $controller->editedCar($key, $twig);
            } else if (strpos($path, "carRemoved") && preg_match('#[0-9]#', $path)) {
                $key = substr($path, 11, 21);
                $controller = new CarsController();
                return $controller->removeCar($key, $twig);
            } else if ($path == "/checkOut"){ 
                $controller = new CheckOutController();
                return $controller->carAvailables($twig);
            } else if ($path == "/carCheckedOut") {
                $controller = new CheckOutController();
                return $controller->checkOutCar($request, $twig);
            } else if ($path == "/history") {
                $controller = new HistoryController();
                return $controller->showHistory($twig);
            } else if ($path == "/checkIn") {
                $controller = new CheckInController();
                return $controller->activeCustomers($twig);
            } else if ($path == "/carCheckedIn") {
                $controller = new CheckInController();
                return $controller->checkInCar($request, $twig);
            } else {
                $controller = new NotFoundController();
                return $controller->notFound($twig);
            }
        }
    }