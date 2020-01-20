<?php
    namespace Main;
    class CustomersController {
        public function showAllCustomers($twig) {
            $model = new Model();
            $customerArray = $model->getAllCustomers();
            $map = ["customerArray" => $customerArray];
            return $twig->render("customersView.twig", $map);
        }

        public function addCostumer($twig) {
            return $twig->render("addCostumerView.twig");
        }

        public function insertCustomer($request, $twig) {
            $form = $request->getForm();
            if(isset($form)) {
                $newcustomer = new Model();
                $personnumber = $_POST['personnumber'];
                $name = $_POST['name'];
                $address = $_POST['address'];
                $postalcode = $_POST['postalcode'];
                $phone = $_POST['phone'];
                $newcustomer->setCustomer($personnumber, $name, $address, $postalcode, $phone);
                echo "The customer was added to the database";
            } else {
                echo "No customer created";
            }
            return $twig->render("customerAddedView.twig");
        }

        public function editedCustomer($key, $twig) {
            $model = new Model();
            $selectedCustomer = $model->editCostumer($key);
            $map = ["selectedCustomer" => $selectedCustomer];
            return $twig->render("editCustomerView.twig", $map);
        }

        public function removeCustomer($key, $twig) {
            $selectedCustomer = new Model();
            $selectedCustomer->deleteCostumer($key);
            echo "Customer removed";
            return $twig->render("customerRemovedView.twig");
        }

        public function updatedCustomer($request, $key, $twig) {
            $form = $request->getForm();
            if(isset($form)) {
                $selectedCustomer = new Model();
                $name = $_POST['name'];
                $address = $_POST['address'];
                $postalcode = $_POST['postalcode'];
                $phone = $_POST['phone'];
                $selectedCustomer->updateCostumer($name, $address, $postalcode, $phone, $key);
                echo "The customer was successfully updated";
            } else {
                echo "The customer coud not be updated";
            }
            return $twig->render("customerEditedView.twig");
        }
    }