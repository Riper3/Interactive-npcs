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

      $relation = new relation;
      $relation->SelectRelation($human->beingId, $otherbeingid);
      if($human->beingId != $otherbeingid && empty($relation->relationId))
      {
        $relation->MeetUnknownPeople($human->beingId, $otherbeingid);
      }
      else if(!empty($relation->relationId))
      {
        $relation = new $relation->type;
        $relation->SelectRelation($human->beingId, $otherbeingid);
        $relation->Talk($human, $villagepeople[$beingnumber]);
      }
    }
    else if($luckynumber >= 80)
    {
      $human->ImproveSkills();
    }
  }
}
