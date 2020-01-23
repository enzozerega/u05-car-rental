<?php
    namespace Main;
    /* Comments:

    ###Functions###

    showAllCustomers: queries all customers registered in database.
    addCustomer: generates page to select parameters for a new customer.
    insertCustomer: add a new item to the customers database.
    updatedCustomer: edits existing customer in database.
    editedCustomer: generates page to select parameters for editing existing customer.
    removeCustomer: removes item from customers database.
    */

    class CustomersController {
        public function showAllCustomers($twig) {
            $model = new Model();
            $customerArray = $model->getAllCustomers();
            $map = ["customerArray" => $customerArray];
            return $twig->render("customersView.twig", $map);
        }

        public function addCustomer($twig) {
            return $twig->render("addCustomerView.twig");
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
            } else {
                echo "No customer created";
            }
            return $twig->render("customerAddedView.twig");
        }

        public function editedCustomer($key, $twig) {
            $model = new Model();
            $selectedCustomer = $model->editCustomer($key);
            $map = ["selectedCustomer" => $selectedCustomer];
            return $twig->render("editCustomerView.twig", $map);
        }

        public function removeCustomer($key, $twig) {
            $selectedCustomer = new Model();
            $selectedCustomer->deleteCustomer($key);
            $selectedCustomer->deleteFromHistory($key);
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
                $selectedCustomer->updateCustomer($name, $address, $postalcode, $phone, $key);
            } else {
                echo "The customer coud not be updated";
            }
            return $twig->render("customerEditedView.twig");
        }
    }