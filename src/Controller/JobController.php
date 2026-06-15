<?php


namespace App\Controller;

use App\Repository\JobRepository;
use App\Repository\Repository;
use Error;
use Exception;

//use App\Repository\CategoryRepository;

class JobController extends Controller
{
  // Lister les jobs

  public function list(): void
  {
    $jobRepository = new JobRepository();

    $jobs = $jobRepository->findAll();

    //var_dump($jobs);

    $this->render("job/list", [
      "jobs" => $jobs,
    ]);
  }

  public function show(): void
  {
    try{
      if(isset($_GET["id"])){
        $id = (int) $_GET["id"];
        $jobRepository = new JobRepository();
        $job = $jobRepository->findById($id);
        if($job){
            $this->render("job/show", [
            "job" => $job,
            ]);
          }else{
            throw new Exception("L'offre n'existe pas");
          }
       }else{
        throw new Exception("L'id est manquant en parametre d'url");
       }

    }catch(Exception $e){
        $this->render("errors/default", [
        "errorMessage" => $e->getMessage()
        ]);
    }
  }

}