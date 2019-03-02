<?php
function FreeTime($freepeople)
{
  foreach ($freepeople as $human)
  {
    $luckynumber = rand(0,100);

    if($luckynumber <= 30)
    {
      $villagepeople = FilterMultiArray($freepeople, "villageId", $human->villageId);
      $peopleamount = count($villagepeople) - 1;

      $beingnumber = rand(0, $peopleamount);
      $otherbeingid = $villagepeople[$beingnumber]->beingId;

      $checkrelation = new relation;
      $checkrelation->SelectRelation($human->beingId, $otherbeingid);
      if($human->beingId != $otherbeingid && empty($checkrelation->relationId))
      {
        MeetUnknownPeople($human->beingId, $otherbeingid);
      }
    }
    else if($luckynumber >= 80)
    {
      $human->ImproveSkills();
    }
  }
}
