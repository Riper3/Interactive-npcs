<?php
require (dirname(__DIR__).'/MainBuilding.php');

class shack extends building
{
  public $wood = 100;
  public $stone = 100;
  public $iron = 0;
  public $clay = 0;
  public $price = 2000;
  public $size = 2;

  function NewShack($ownerid)
  {
    $this->beingId = $ownerid;
  }
}
