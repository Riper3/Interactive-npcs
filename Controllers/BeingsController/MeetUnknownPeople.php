<?php
function MeetUnknownPeople($beingid, $reciverid)
{
  $newrelation = new friend;
  $newrelation->NewFriend($beingid, $reciverid);
  $newrelation->Insert();
}
