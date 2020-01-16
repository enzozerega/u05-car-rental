<?php include "header.php";?>
    
    <main>
        <div id="logo">Customers</div>
        <?php include "../scripts/messages.php";?>

        <table>
            <tr>
                <th>Person number</th>
                <th>Name</th>
                <th>Adress</th>
                <th>postal code</th>
                <th>Phone</th>
            </tr><?php include "../scripts/getcustomerstable.php";?>

        </table>
        <a href="customers_add.php"><div>Add customer</div></a>
    </main>

    <footer>

    </footer>
</body>

</html>