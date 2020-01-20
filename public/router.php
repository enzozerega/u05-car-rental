<?php
    namespace Main;

    use Main\CustomersController;
    use Main\MainController;
    
    class Router {

        public function route($request, $twig) {
            $path = $request->getPath();
            $form = $request->getForm();

            if ($path == "/customers") {
                $controller = new CustomersController();
                return $controller->showAllCustomers($twig);
            } else if ($path == "/") {
                $controller = new MainController();
                return $controller->mainMenu($twig);
            } else if ($path == "/addCustomer") {
                $controller = new CustomersController();
                return $controller->addCostumer($twig);
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
            } else {
                return "Router Error!";
            }
        }

    }