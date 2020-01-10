<?php

    include "header.php";
    include_once "../scripts/add_customer.php";
    //$customer = new Customer();
    //unset($customer); // Deletes the instance




?>

    <main>
        <div id="logo">Add customer</div>
        <form action="add_customer.php" method="POST">
            <input type="text" name="personnumber" placeholder="YYMMDD-XXXX"><br>
            <input type="text" name="name" placeholder="Name"><br>
            <input type="text" name="address" placeholder="Address"><br>
            <input type="text" name="postalcode" placeholder="Postal code"><br>
            <input type="text" name="phone" placeholder="Phone number"><br>
            <button type="submit" name="submit">Add</button>
        </form>
    </main>

    <footer>

    </footer>
</body>

</html>