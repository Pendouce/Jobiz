<?php

// Chargement d'autoload
require_once __DIR__ . "/../vendor/autoload.php";

// On definis un constante pour avoir le chemin racine de l'app
define('APP_ROOT', dirname(__DIR__));

//echo APP_ROOT;

use App\Controller\PageController;

$pageController = new PageController();
$pageController->about();
