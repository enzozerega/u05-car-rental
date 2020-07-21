<?php
    namespace Main;

    use Main\CustomersController;
    use Main\MainController;
    
    class Router {

        public function route($request, $twig) {
            $fullpath = $request->getPath(); // Change to $path in production
            $subpath = "/u05-car-rental"; // Comment in production
            $path = $subpath . $fullpath; // Comment in production

            if ($path == "/u05-car-rental/customers") {
                $controller = new CustomersController();
                return $controller->showAllCustomers($twig);
            } else if ($path == "/u05-car-rental/") {
                $controller = new MainController();
                return $controller->mainMenu($twig);
            } else if ($path == "/u05-car-rental/addCustomer") {
                $controller = new CustomersController();
                return $controller->addCustomer($twig);
            } else if ($path == "/u05-car-rental/customerAdded") {
                $controller = new CustomersController();
                return $controller->insertCustomer($request, $twig);
            } else if (strpos($path, "customerEdited") && preg_match('#[0-9]#', $path)) {
                $controller = new CustomersController();
                $key = substr($path, 30, 40);
                return $controller->updatedCustomer($request, $key, $twig);
            } else if (strpos($path, "editCustomer") && preg_match('#[0-9]#', $path)) {
                $key = substr($path, 28, 38);
                $controller = new CustomersController();
                return $controller->editedCustomer($key, $twig);
            } else if (strpos($path, "customerRemoved") && preg_match('#[0-9]#', $path)) {
                $key = substr($path, 31, 41);
                $controller = new CustomersController();
                return $controller->removeCustomer($key, $twig);
            } else if ($path == "/u05-car-rental/cars") {
                $controller = new CarsController();
                return $controller->showAllCars($twig);
            } else if ($path == "/u05-car-rental/addCar") {
                $controller = new CarsController();
                return $controller->addCar($twig);
            } else if ($path == "/u05-car-rental/carAdded") {
                $controller = new CarsController();
                return $controller->insertCar($request, $twig);
            } else if (strpos($path, "carEdited") && preg_match('#[0-9]#', $path)) {
                $controller = new CarsController();
                $key = substr($path, 25, 31);
                return $controller->updatedCar($request, $key, $twig);
            } else if (strpos($path, "editCar") && preg_match('#[0-9]#', $path)) {
                $key = substr($path, 23, 33);
                $controller = new CarsController();
                return $controller->editedCar($key, $twig);
            } else if (strpos($path, "carRemoved") && preg_match('#[0-9]#', $path)) {
                $key = substr($path, 26, 36);
                $controller = new CarsController();
                return $controller->removeCar($key, $twig);
            } else if ($path == "/u05-car-rental/checkOut"){ 
                $controller = new CheckOutController();
                return $controller->carAvailables($twig);
            } else if ($path == "/u05-car-rental/carCheckedOut") {
                $controller = new CheckOutController();
                return $controller->checkOutCar($request, $twig);
            } else if ($path == "/u05-car-rental/history") {
                $controller = new HistoryController();
                return $controller->showHistory($twig);
            } else if ($path == "/u05-car-rental/checkIn") {
                $controller = new CheckInController();
                return $controller->activeCustomers($twig);
            } else if ($path == "/u05-car-rental/carCheckedIn") {
                $controller = new CheckInController();
                return $controller->checkInCar($request, $twig);
            } else {
                $controller = new NotFoundController();
                return $controller->notFound($twig);
            }
        }
    }