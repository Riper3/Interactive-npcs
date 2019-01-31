<?php
function MeetPeople($beingid, $reciverid)
{
  $checkrelation = SelectOne("relations", "relationId", "beingId=$beingid AND reciverId=$reciverid");
  if(empty($checkrelation))
  {
    $relation = new friend;
    $relation->NewFriend($beingid, $reciverid);
    NewInsertObject("relations", $relation);
  }
  else
  {
    $points = SelectOne("relations", "points", "beingId=$beingid AND reciverId=$reciverid");
    $newpoints = $points + 1;
    Update("relations", "points=$newpoints", "beingId=$beingid AND reciverId=$reciverid");
  }
}
