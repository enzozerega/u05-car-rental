<?php
    spl_autoload_register('myAutoLoader');
    function myAutoLoader($className) {
        $extension = ".php";
        $fullPath = $className . $extension;

        if (!file_exists($fullPath)) {
            return false;
        }

        include_once $fullPath;
    }