<?php
require_once (dirname(__DIR__).'/Profession.php');

class hunter extends profession
{
  public $professiontypeId = 2;

  function NewHunter($villageid, $zoneId, $beingid)
  {
    $this->beingId = $beingid;
    $this->villageId = $villageid;
    $this->zoneId = $zoneId;
    $this->schedule = rand(1,3);
  }
}
