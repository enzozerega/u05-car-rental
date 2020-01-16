<?php
    include "header.php";
?>

    <main>
        <div id="logo">History</div>
        <?php
            $historyItem = new History();
            $historyItem->getHistory();
        ?>
    </main>

    <footer>

    </footer>
</body>

</html>