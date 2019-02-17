<?php

function NewZone($villagesid)
{
  if(!empty($villagesid))
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
      $zone->villageId = $villageid;
      $zone->resourceamount = rand(10000,1000000);
      $zone->Insert();
    }
  }
}
