<?php

namespace App\Repository;
use App\Entity\Category;

class CategoryRepository extends Repository
{
  public function findAll():array
  {
    $sql = $this->pdo->prepare("SELECT id, name FROM category");
    $sql->execute();

    // Hydratation par PDO
    // Hydratation: instencie un objet pour chacune des categorie recuperées
    //$categories = $sql->fetchAll($this->pdo::FETCH_CLASS, Category::class);
    
    $categories = $sql->fetchAll($this->pdo::FETCH_ASSOC);

    $categoriesArray = [];
    if($categories){
      foreach($categories as $categoryArray){
        $categoriesArray[] = Category::createAndHydrate($categoryArray);
      }
    }

    return $categoriesArray;
  }

  public function findById(int $id):Category
  {
    $sql = $this->pdo->prepare("SELECT id, name FROM category
    WHERE id = :id");
    $sql->bindValue(':id', $id, $this->pdo::PARAM_INT);
    $sql->execute();
    $categoryArray = $sql->fetch($this->pdo::FETCH_ASSOC);

    $categoryArray["first_name"] = "John";

    $category = Category::createAndHydrate($categoryArray);
/* 
    $category->setId($categoryArray["id"]);
    $category->setName($categoryArray["name"]);
    //var_dump($categoryArray);
     */
    return $category;
  }
}