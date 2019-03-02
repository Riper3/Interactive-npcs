<?php
function MeetUnknownPeople($beingid, $reciverid)
{
  $newrelation = new friend;
  $newrelation->NewFriend($beingid, $reciverid);
  print_r($newrelation);
  $newrelation->Insert();
}
