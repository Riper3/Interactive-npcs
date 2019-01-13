<?php
require_once (dirname(__DIR__).'/MainProfession.php');

class hunter extends profession
{
  public $name = "Hunter";
  public $resource = "Food";

  function NewHunter($villageid, $zoneId)
  {
    $this->villageId = $villageid;
    $this->zoneId = $zoneId;
    $this->schedule = rand(1,3);
    $this->requieredskill = "intelligence";
  }
}
