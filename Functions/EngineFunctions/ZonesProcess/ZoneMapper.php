<?php

function ZoneMapper()
{
  $zone = new zone;
  $zones = $zone->SelectAll();
  $countzones = array_count_values(array_column($zones, 'villageId'));
  foreach ($countzones as $villageid => $realcount)
  {
    if($realcount < 5)
    {
      $villagesid[] = $villageid;
    }
  }
  if(!empty($villagesid))
  {
   return $villagesid;
  }
}
