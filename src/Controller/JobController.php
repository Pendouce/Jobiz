<?php


namespace App\Controller;
//use App\Repository\CategoryRepository;

class JobController extends Controller
{
  // Lister les jobs

  public function list(): void
  {

    $this->render("job/list", [
      
    ]);
  }

}