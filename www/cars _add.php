<?php
    include "header.php";
    date_default_timezone_set('Europe/Stockholm');
    $timezone = date_default_timezone_get();
    echo $timezone;
    $date = date('m/d/Y H:i:s', time());
    echo $date;
?>

    <main>
        <div id="logo">Add car</div>
    </main>

    <footer>

    </footer>
</body>

</html>