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

 public function NewZone($villageid)
 {
   $zonestype = scandir("Classes/Zones/KindOfZones");
   unset($zonestype[0], $zonestype[1]);
   $zonesamount = count($zonestype) + 1;

   $zonenumber = rand(2, $zonesamount);
   $zonename = strtolower(str_replace(".php", "", $zonestype[$zonenumber]));

   $zone = New $zonename;
   $zone->name = $zonename;
   $zone->villageId = $villageid;
   $zone->resourceamount = rand(10000,1000000);
   $zone->Insert();
 }

 public function EndZone()
 {
   require_once "Functions/BbddFunctions/Manual.php";

   Manual("UPDATE beings JOIN professions ON beings.beingId = professions.beingId
   SET beings.professionId=0 WHERE zoneId = $this->zoneId");

   Manual("DELETE FROM professions WHERE zoneId = $this->zoneId");
   Manual("DELETE FROM zones WHERE zoneId = $this->zoneId");
 }
 
}
