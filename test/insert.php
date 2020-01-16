<?php
    include "user.php";
    $newUser = new User();
    if(isset($_POST['submit'])) {   
        $name = $_POST['name'];
        $newUser->setUser($name);
        echo "Success";
    }