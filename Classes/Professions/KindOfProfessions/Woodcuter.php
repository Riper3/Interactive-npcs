<?php
require (dirname(__DIR__).'/MainProfession.php');

class woodcuter extends profession
{
  public $type = "Woodcuter";
  public $generatedresource = "Wood";

  function NewWoodcuter($beingid, $villageid, $zoneId)
  {
    $this->beingId = $beingid;
    $this->villageId = $villageid;
    $this->zoneId = $zoneId;
    $this->moneyperhour = rand(8,10);
    $this->schedule = rand(1,3);
    $this->amountperhour = rand(80,100);
  }
}
