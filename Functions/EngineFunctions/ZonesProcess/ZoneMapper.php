<?php

function ZoneMapper()
{
  $villages = SelectAllJoin("zones", "zones.villageId", "villages", "villages.villageId = zones.villageId");
  array_multisort($villages, SORT_ASC);
  $countzones = array_count_values(array_column($villages, 'villageId'));
  $countallzones = -1;
  foreach ($countzones as $realcount)
  {
    $countallzones = $realcount + $countallzones;
    if($realcount < 5)
    {
      $villageszones[] = $villages[$countallzones];
    }
  }
  if(!empty($villageszones))
  {
   return $villageszones;
  }
}
