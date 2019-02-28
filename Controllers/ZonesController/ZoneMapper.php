<?php

function ZoneMapper()
{
  $zone = new zone;
  $zones = $zone->SelectAll();
  if(!empty($zones))
  {
    $countzones = array_count_values(array_column($zones, 'villageId'));
    foreach ($countzones as $villageid => $realcount)
    {
      if($realcount < 5)
      {
        $villagesid[] = $villageid;
      }
    }
  }
  if(!empty($villagesid))
  {
    foreach ($villagesid as $villageid)
    {
      $zone->NewZone($villageid);
    }
  }
}
