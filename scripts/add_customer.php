<?php
    include "../classes/customercontrol.php";
    
    if(isset($_POST['submit'])) {
        $newcustomer = new Customercontrol();
        $personnumber = $_POST['personnumber'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $postalcode = $_POST['postalcode'];
        $phone = $_POST['phone'];
        $newcustomer->createCustomer($personnumber, $name, $address, $postalcode, $phone);
        unset($newcustomer);
        header("Location: ../www/customers.php");
    } else {
        echo "No customer created";
    }


   // declare(strict_types = 1);
 /*
    // Input

   


*/

/* // In case there is an error with method
    $customer = new Customer ();

    try {
        $customer->method();
        echo $customer->method();
    } catch (TypeError $e) {
        echo "Error: " . $e->getMessage();
    }

*/