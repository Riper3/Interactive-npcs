<?php
require_once (dirname(__DIR__).'/Profession.php');

class stoneminer extends profession
{
  public $professiontypeId = 3;

  function NewStoneMiner($villageid, $zoneId, $beingid)
  {
    $this->beingId = $beingid;
    $this->villageId = $villageid;
    $this->zoneId = $zoneId;
    $this->schedule = rand(1,3);
  }
}
