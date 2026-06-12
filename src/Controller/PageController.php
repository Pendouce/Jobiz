<?php


namespace App\Controller;
use App\Repository\CategoryRepository;

class PageController extends Controller
{
  // Afficher la page d'acceuil

  public function home(): void
  {
    $gretting = "Hello";
    $name = "John";

    $categoryRepository = new CategoryRepository();
    $categories =$categoryRepository->findAll();

    //var_dump($categories);
    $this->render("page/home", [
      "grettings" => $gretting,
      "name" => $name,
      "categories" => $categories,
    ]);
  }

  public function about(): void
  {
  $this->render("page/about");
  }



}