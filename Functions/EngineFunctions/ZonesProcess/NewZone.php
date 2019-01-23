<?php

require_once "Classes/Zones/KindOfZones/Forest.php";
require_once "Classes/Zones/KindOfZones/Stonemine.php";
require_once "Classes/Zones/KindOfZones/Foodplace.php";

function NewZone($villagesid)
{
  $zonestype = scandir("Classes/Zones/KindOfZones");
  unset($zonestype[0], $zonestype[1]);
  $zonesamount = count($zonestype) + 1;

  foreach ($villagesid as $villageid)
  {
    $zonenumber = rand(2, $zonesamount);
    $zonename = strtolower(str_replace(".php", "", $zonestype[$zonenumber]));

    $zone = New $zonename;
    $zone->name = $zonename;
    $zone->villageId = $villageid["villageId"];
    $zone->resourceamount = rand(10000,1000000);
    NewInsertObject("zones", $zone);
  }
}
