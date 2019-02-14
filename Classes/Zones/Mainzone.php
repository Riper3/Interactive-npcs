<?php
require_once (dirname(__DIR__).'/App.php');

class zone extends app
{
 public $zoneId;
 public $name;
 public $villageId;
 public $type;
 public $resource;
 public $resourceamount;

 public $table = "zones";

 public function EndZone()
 {
   require "Functions/BbddFunctions/Manual.php";

   Manual("UPDATE beings JOIN professions ON beings.beingId = professions.beingId
   SET beings.professionId=0 WHERE zoneId = $this->zoneId");
   
   Manual("DELETE FROM professions WHERE zoneId = $this->zoneId");
   Manual("DELETE FROM zones WHERE zoneId = $this->zoneId");
 }
}
