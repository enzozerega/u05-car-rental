<?php

    class History extends Dbh {
        public function getHistory() {
            $sql = "SELECT * FROM history";
            $statement = $this->connect()->query($sql);
            while ($row = $statement->fetch()) {
                echo $row['person_number'] . '<br>';
            }
        }
    }