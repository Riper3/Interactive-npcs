<?php
function MeetPeople($beingid, $reciverid)
{
  $relation = new relation;
  $relation->SelectRelation($beingid, $reciverid);
  if(empty($relation->relationId))
  {
    $newrelation = new friend;
    $newrelation->NewFriend($beingid, $reciverid);
    $newrelation->Insert();
  }
  else
  {
    $relation->points = $relation->points + 1;
    $relation->Update();
  }
}
