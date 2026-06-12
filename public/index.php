<?php

// Chargement d'autoload
require_once __DIR__ . "/../vendor/autoload.php";

// On definis un constante pour avoir le chemin racine de l'app
define('APP_ROOT', dirname(__DIR__));
define('APP_ENV', ".env");
//define('APP_ENV', ".env.local");

use App\Routing\Router;
use App\db\Mysql;

$router = new Router();
$router->handleRequest($_SERVER["REQUEST_URI"]);


/* $mysql = Mysql::getInstance();
$mysql->getPDO();
 */



/* use App\Controller\PageController;

$pageController = new PageController();
$pageController->about();
 */