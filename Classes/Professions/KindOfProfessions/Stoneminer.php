<?php
require_once (dirname(__DIR__).'/MainProfession.php');

class stoneminer extends profession
{
  public $type = "Stoneminer";
  public $generatedresource = "Stone";

  function NewStoneMiner($villageid, $zoneId)
  {
    $this->villageId = $villageid;
    $this->zoneId = $zoneId;
    $this->schedule = rand(1,3);
    $this->requieredskill = "dexterity";
  }
}
