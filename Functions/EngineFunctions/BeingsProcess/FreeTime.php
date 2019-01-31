<?php
function FreeTime($freepeople)
{
  $peopleamount = count($freepeople);

  foreach ($freepeople as $person)
  {
    $luckynumber = rand(0,100);

    if($luckynumber <= 30)
    {
      $otherbeing = rand(0, $peopleamount);
      if($person['beingId'] != $otherbeing)
      {
        MeetPeople($person['beingId'], $otherbeing);
      }
    }
    else if($luckynumber >= 80)
    {
      ImproveSkills($person['beingId']);
    }
  }
}
