<?php
    include "../classes/customerview.php";
    $newcustomer = new Customerview();
    $tablecontent = $newcustomer->showCustomer();
    foreach ($tablecontent as $row) {
        echo "
            <tr>
                <td>" . 
                    $row['person_number'] . "</td>
                <td>" .
                    $row['name'] . "</td>
                <td>" .
                    $row['adress'] . "</td>
                <td>" .        
                    $row['postal_code'] . "</td>
                <td>" .
                    $row['phone'] . "</td>
                <td>
                    <a href='../www/customers_edit.php'><span>Edit</span></a><a href='../www/customers.php?remove=success'><span>Remove</span></a>
                </td>
            </tr>";
    }    
    unset($newcostumer);
    