<?php


namespace App\Controller;

class PageController
{
  // Affiecher la page d'acceuil

  public function home(): void
  {
    $this->render("page/home");
  }

  public function about(): void
  {
  $this->render("page/about");
  }

  protected function render(string $path, array $params = []): void
  {
    $filepath = APP_ROOT."/templates/$path.php";

    if(!file_exists($filepath)){
      echo "Le fichier $filepath n'existe pas";
    }else{
      // Transforme chaque clés de mon tableau en variable
      extract($params);
      require_once $filepath;
    }
  }
}