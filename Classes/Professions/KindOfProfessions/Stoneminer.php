<?php
require_once (dirname(__DIR__).'/MainProfession.php');

class stoneminer extends profession
{
  public $name = "Stoneminer";
  public $resource = "Stone";

  function NewStoneMiner($villageid, $zoneId)
  {
    $this->villageId = $villageid;
    $this->zoneId = $zoneId;
    $this->schedule = rand(1,3);
    $this->requieredskill = "dexterity";
  }
}
