<?php
function Working($people)
{
  foreach ($people as $person)
  {
     $skill = SelectOne("beings", $person['requieredskill'], "beingId=$person[beingId]");
     $stamina = SelectOne("beings", "stamina", "beingId=$person[beingId]");

     //by now the wood cost 5, this is only for test

     $resourceamount = (($skill * 0.2) + ($stamina * 0.1)) * 8;
     $earnmoney = $resourceamount/6;

     $currentmoney = SelectOne("beings", "money", "beingId=$person[beingId]");
     $totalmoney = $currentmoney + $earnmoney;
     Update("beings", "money=$totalmoney", "beingId=$person[beingId]");

     $villageid = SelectOneJoin("beings", "villageId", "buildings", "beings.beingId = buildings.beingId", "beings.beingId = $person[beingId]");

     $currentmoney = SelectOne("villages", "money", "villageId=$villageid");
     $totalmoney = $currentmoney - $earnmoney;
     Update("villages", "money=$totalmoney", "villageId=$villageid");

     $currentresource = SelectOne("storages", "$person[generatedresource]", "ownerId=$villageid");
     $totalresource = $currentresource + $resourceamount;
     Update("storages", "$person[generatedresource]=$totalresource", "ownerId=$villageid");
  }

}
