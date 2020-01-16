<?php
    $url = "http//$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if (strpos($url, 'remove=success')) {
        echo "<span class='deleted-customer'>Customer deleted</span>";
    }