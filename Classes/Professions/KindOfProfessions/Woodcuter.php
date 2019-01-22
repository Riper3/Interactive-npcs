<?php
require_once (dirname(__DIR__).'/MainProfession.php');

class woodcuter extends profession
{
  public $professiontypeId = 1;

  function NewWoodcuter($villageid, $zoneId, $beingid)
  {
    $this->beingId = $beingid;
    $this->villageId = $villageid;
    $this->zoneId = $zoneId;
    $this->schedule = rand(1,3);
  }
}
