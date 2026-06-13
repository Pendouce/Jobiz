<?php


namespace App\Controller;
use App\Repository\CategoryRepository;

class PageController extends Controller
{
  // Afficher la page d'acceuil


  public function home(): void
  {

    $categoryRepository = new CategoryRepository();

    $category = $categoryRepository->findById(1);
    $categories = $categoryRepository->findAll();

    //var_dump($category);
    //var_dump($categories);
    $this->render("page/home", [
      "categories" => $categories,
    ]);
  }

  public function about(): void
  {
  $this->render("page/about");
  }

}