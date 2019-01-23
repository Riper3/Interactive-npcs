<?php
function Working($people)
{
  foreach ($people as $person)
  {
     $checkprofession = SelectOne("beings", "professionId" ,"beingId=$person[beingId]");
     $villageid = SelectOneJoin("beings", "villageId", "buildings", "beings.beingId = buildings.beingId", "beings.beingId = $person[beingId]");

     if($checkprofession != 0)
     {
       $skill = SelectOne("beings", $person['skill'], "beingId=$person[beingId]");
       $stamina = SelectOne("beings", "stamina", "beingId=$person[beingId]");
       $professionid = SelectOne("beings", "professionId", "beingId=$person[beingId]");

       //by now the wood cost 5, this is only for test

       $resourceamount = (($skill * 20) + ($stamina * 0.1)) * 8;
       $earnmoney = round($resourceamount * 4);

       $zoneid = SelectOne("professions", "zoneId", "beingId=$person[beingId]");
       $zoneresource = SelectOne("zones", "resourceamount", "zoneId=$zoneid");
       $newresource = $zoneresource - $resourceamount;
       if($newresource > 0)
       {
         Update("zones", "resourceamount=$newresource", "zoneId=$zoneid");

         $currentmoney = SelectOne("beings", "money", "beingId=$person[beingId]");
         $totalmoney = $currentmoney + $earnmoney;
         Update("beings", "money=$totalmoney", "beingId=$person[beingId]");

         $currentmoney = SelectOne("villages", "money", "villageId=$villageid");
         $totalmoney = $currentmoney - $earnmoney;
         Update("villages", "money=$totalmoney", "villageId=$villageid");

         $currentresource = SelectOne("storages", "$person[resource]", "ownerId=$villageid");
         $totalresource = $currentresource + $resourceamount;
         Update("storages", "$person[resource]=$totalresource", "ownerId=$villageid");
       }
       else
       {
         UpdateJoin("beings", "beings.professionId=0", "professions", "beings.beingId=professions.beingId", "zoneId=$zoneid");
         DeleteOne("professions", "zoneId=$zoneid");
         DeleteOne("zones", "zoneId=$zoneid");
       }
     }
    else
    {

    }
  }

}