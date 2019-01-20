<?php
require_once (dirname(__DIR__).'/MainProfession.php');

class hunter extends profession
{
  public $type = "Hunter";
  public $generatedresource = "Food";

  function NewHunter($villageid, $zoneId, $beingid)
  {
    $this->beingId = $beingid;
    $this->villageId = $villageid;
    $this->zoneId = $zoneId;
    $this->schedule = rand(1,3);
    $this->requieredskill = "intelligence";
  }
}
