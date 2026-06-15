<?php

namespace App\Repository;
use App\Entity\Job;

class JobRepository extends Repository
{
  public function findAll():array
  {
    $sql = $this->pdo->prepare("SELECT id, tittle, description, salary, country_id, compagny_id, created_at FROM job");
    $sql->execute();

    $jobs = $sql->fetchAll($this->pdo::FETCH_ASSOC);

    $jobsArray = [];
    if($jobs){
      foreach($jobs as $jobArray){
        $jobsArray[] = Job::createAndHydrate($jobArray);
      }
    }

    return $jobsArray;
  }

  public function findById(int $id):Job | bool
  {
    $sql = $this->pdo->prepare("SELECT id, tittle, description, salary, country_id, compagny_id, created_at FROM job
    WHERE id = :id");
    $sql->bindValue(':id', $id, $this->pdo::PARAM_INT);
    $sql->execute();
    $jobArray = $sql->fetch($this->pdo::FETCH_ASSOC);
    if($jobArray){
      return Job::createAndHydrate($jobArray);
    }else{
      return false;
    }

/* 
    $category->setId($categoryArray["id"]);
    $category->setName($categoryArray["name"]);
    //var_dump($categoryArray);
    */
    } 
}