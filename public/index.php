<?php
    use Main\Router;
    use Main\Request;
    require_once __DIR__ . "/vendor/autoload.php";
    $loader = new \Twig\Loader\FilesystemLoader(__DIR__);
    $twig = new \Twig\Environment($loader);

    $request = new Request();
    $router = new Router();

    echo $router->route($request, $twig);