<?php

function ZoneMapper()
{
  $villages = SelectAllJoin("zones", "zones.villageId", "villages", "villages.villageId = zones.villageId");
  array_multisort($villages, SORT_ASC);
  $countzones = array_count_values(array_column($villages, 'villageId'));
  print_r($villages);
  $countallzones = -1;
  foreach ($countzones as $realcount)
  {
    $countallzones = $countallzones + $realcount;
    if($realcount < 5)
    {
      $villageszones[] = $villages[$countallzones];
    }
  }

  return $villageszones;
}
