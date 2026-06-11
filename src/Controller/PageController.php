<?php


namespace App\Controller;

class PageController extends Controller
{
  // Afficher la page d'acceuil

  public function home(): void
  {
    $this->render("page/home");
  }

  public function about(): void
  {
  $this->render("page/about");
  }


}