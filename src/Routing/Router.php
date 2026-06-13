<?php


namespace App\Routing;

use App\Controller\ErrorController;
use Exception;

class Router
{
  private array $routes;
  public function __construct() 
  {
    $this->routes = require_once APP_ROOT."/config/routes.php";
  }

  public function handleRequest(string $uri)
  {
    try{
      // Je verifie si la route existe
        $path = $this->normalizePath($uri);
        if(!isset($this->routes[$path])){
          throw new Exception("La route n'existe pas");
        }
        $route = $this->routes[$path];

        $controllerPath = $route["controller"];
        $action = $route["action"];

        if(!class_exists($controllerPath)){
          throw new Exception("La classe n'existe pas");
        }
        $controller = new $controllerPath();
        if(!method_exists($controller, $action)){
          throw new Exception("L'action n'existe pas");

        }
        $controller->$action();
      }catch(Exception $e){
        $errorController = new ErrorController();
        $errorController->show($e->getMessage());
      }
    
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

  public static function isActiveRoute(string $path):bool
  {
    self::normalizePath($path);
    
    return self::normalizePath($_SERVER["REQUEST_URI"]) === $path;
  }
}