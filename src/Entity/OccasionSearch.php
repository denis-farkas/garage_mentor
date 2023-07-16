<?php

namespace App\Entity;

class OccasionSearch
{
  /**
   * @var int|null
   */
  private $maxPrice;

  /**
   * @var int|null
   */
  private $maxKilometre;

  /**
   * @var int|null
   */
  private $maxYear;

  /**
   * @return int|null
   */
  public function getMaxPrice(): ?int
  {
    return $this->maxPrice;
  }

  /**
   * @param int|null $maxPrice
   * @return OccasionSearch
   */
  public function setMaxPrice(int $maxPrice): OccasionSearch
  {
    $this->maxPrice = $maxPrice;
    return $this;
  }

  /**
   * @return int|null
   */
  public function getMaxKilometre(): ?int
  {
    return $this->maxKilometre;
  }

  /**
   * @param int|null $maxKilometre
   * @return OccasionSearch
   */
  public function setMaxKilometre(int $maxKilometre): OccasionSearch
  {
    $this->maxKilometre = $maxKilometre;
    return $this;
  }

  /**
   * @return int|null
   */
  public function getMaxYear(): ?int
  {
    return $this->maxYear;
  }

  /**
   * @param int|null $maxYear
   * @return OccasionSearch
   */
  public function setMaxYear(int $maxYear): OccasionSearch
  {
    $this->maxYear = $maxYear;
    return $this;
  }
}
