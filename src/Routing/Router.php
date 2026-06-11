<?php


namespace App\Routing;

class Router
{
  private $routes;
  public function __construct() 
  {
    $this->routes = require_once APP_ROOT."/config/routes.php";
  }

  public function handleRequest(string $uri)
  {
    $path = $this->normalizePath($uri);
    $route = $this->routes[$path];

    $controllerPath = $route["controller"];
    $action = $route["action"];

    $controller = new $controllerPath();

    $controller->$action();
    //var_dump($controller);
  }

  // recupéraltion du chemin et gestion du slash
  public static function normalizePath(string $uri):string
  {
    // Retourne le chemin de l'url
    $path = parse_url($uri, PHP_URL_PATH);
    // Supprime les espaces ou slash de fin de chaine 
    // Je supprime le slash si l'utilisateur le rentre et l'ajoute moi meme
    $path = rtrim($path, "/"). "/";
    return $path;
  }
}