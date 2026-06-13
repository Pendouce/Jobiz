<?php

namespace App\Entity;

class Entity
{
  public static function createAndHydrate(array $data):static
  {
    $entity = new static();
    $entity->hydrate($data);

    return $entity;
  }

    /* 
    Je parcour le tableau de donnée recupéré de la bdd
    tableau associatif avec cle => valeur
    Pour chacun d'entre eux je construit la methode a appelée (set)
    suivis du nom du champs (avec la premiere lettre en MAJ)
    J'appelle le setteur en lui passant la valeur
  */
  public function hydrate(array $data):void
  {
    foreach($data as $key => $value){
      // $key => "id"
      // On veut transformer cette chaine en setId
      // first_name => setFirst_name // setFirstname

      // first_name => first name => First Name => FirstName => setFirstName
      
      // first name
      $methodeName = str_replace(array('-', '_'), ' ', $key);
      // First Name
      $methodeName = ucwords($methodeName);
      // FirstName
      $methodeName = str_replace(' ', '', $methodeName);

      $methodeName = "set" .$methodeName;
      /* 
        Equivalant en une ligne
          $methodeName = "set".str_replace(' ', '', ucwords(str_replace(array('-', '_'), ' ', $key)));
       */
      // $methode = setId ou setName
      // Cette ligne est l'equivalent de $this->setId/Name($value)
      //var_dump($methodeName);

      if(method_exists($this, $methodeName)){
        $this->{$methodeName}($value);
      }
      
    }
  }
}