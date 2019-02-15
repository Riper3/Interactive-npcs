<?php
function Working($people)
{
  foreach ($people as $human)
  {
       $skill = SelectOne("professionstype", "skill", "professiontypeId = $human->professiontypeId");

       $resourceamount = (($human->$skill * 0.2) + ($human->stamina * 0.1));
       $earnmoney = round($resourceamount * 4);

       $zone  = new zone;
       $zone->SelectById($human->zoneId);
       $newresource = $zone->resourceamount - $resourceamount;
       if($newresource > 0)
       {
         $zone->resourceamount = $newresource;
         $zone->Update();
         $resource = strtolower($zone->resource);

         $human->money = $human->money + $earnmoney;
         $human->Update();

         $village = new village;
         $village->SelectById($human->villageId);
         $village->money = $village->money - $earnmoney;
         $village->Update();

         $storage = new storage;
         $storage->SelectById($village->storageId);
         $storage->$resource = $storage->$resource + $resourceamount;
         $storage->Update();
       }
       else
       {
         $zone->EndZone();
       }
  }
}
