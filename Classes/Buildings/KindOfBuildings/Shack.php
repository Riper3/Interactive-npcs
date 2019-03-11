<?php
require (dirname(__DIR__).'/Building.php');

class shack extends building
{
  public $buildingsize = 2;

  function NewShack($ownerid)
  {
    $this->beingId = $ownerid;
  }
}
