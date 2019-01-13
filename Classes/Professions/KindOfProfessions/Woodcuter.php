<?php
require (dirname(__DIR__).'/MainProfession.php');

class woodcuter extends profession
{
  public $type = "Woodcuter";
  public $generatedresource = "Wood";

  function NewWoodcuter($villageid, $zoneId)
  {
    $this->villageId = $villageid;
    $this->zoneId = $zoneId;
    $this->schedule = rand(1,3);
    $this->requieredskill = "strength";
  }
}
