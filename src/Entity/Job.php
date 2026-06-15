<?php


namespace App\Entity;

use DateTimeImmutable;

class Job extends Entity
{
  protected ?int $id = null;
  protected ?string $tittle = null;
  protected ?string $description = null;
  protected ?int $salary = null;
  protected ?int $countryId = null;
  protected ?int $compagnyId = null;
  protected ?DateTimeImmutable $createdAt = null;
  
  /**
   * Get the value of id
   */
  public function getId(): ?int
  {
    return $this->id;
  }

  /**
   * Set the value of id
   */
  public function setId(?int $id): self
  {
    $this->id = $id;

    return $this;
  }

  /**
   * Get the value of tittle
   */
  public function getTittle(): ?string
  {
    return $this->tittle;
  }

  /**
   * Set the value of tittle
   */
  public function setTittle(?string $tittle): self
  {
    $this->tittle = $tittle;

    return $this;
  }

  /**
   * Get the value of description
   */
  public function getDescription(): ?string
  {
    return $this->description;
  }

  /**
   * Set the value of description
   */
  public function setDescription(?string $description): self
  {
    $this->description = $description;

    return $this;
  }

  /**
   * Get the value of salary
   */
  public function getSalary(): ?int
  {
    return $this->salary;
  }

  /**
   * Set the value of salary
   */
  public function setSalary(?int $salary): self
  {
    $this->salary = $salary;

    return $this;
  }

  /**
   * Get the value of countryId
   */
  public function getCountryId(): ?int
  {
    return $this->countryId;
  }

  /**
   * Set the value of countryId
   */
  public function setCountryId(?int $countryId): self
  {
    $this->countryId = $countryId;

    return $this;
  }

  /**
   * Get the value of compagnyId
   */
  public function getCompagnyId(): ?int
  {
    return $this->compagnyId;
  }

  /**
   * Set the value of compagnyId
   */
  public function setCompagnyId(?int $compagnyId): self
  {
    $this->compagnyId = $compagnyId;

    return $this;
  }

  /**
   * Get the value of createdAt
   */
  public function getCreatedAt(): ?DateTimeImmutable
  {
    return $this->createdAt;
  }

  /**
   * Set the value of createdAt
   */
  public function setCreatedAt(?DateTimeImmutable $createdAt): self
  {
    $this->createdAt = $createdAt;

    return $this;
  }
}