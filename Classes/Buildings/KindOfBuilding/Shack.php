<?php
require (dirname(__DIR__).'/MainBuilding.php');

class shack extends building
{
  public $size = 2;

  function NewShack($ownerid)
  {
    $this->beingId = $ownerid;
  }
}
