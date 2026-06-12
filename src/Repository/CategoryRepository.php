<?php

namespace App\Repository;

class CategoryRepository extends Repository
{
  public function findAll():array
  {
    $sql = $this->pdo->prepare("SELECT id, name FROM category");

    $sql->execute();

    $category = $sql->fetchAll($this->pdo::FETCH_ASSOC);
    return $category;
  }
}