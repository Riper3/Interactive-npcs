<?php
function FreeTime($freepeople)
{
  $peopleamount = count($freepeople);

  foreach ($freepeople as $human)
  {
    $luckynumber = rand(0,100);

    if($luckynumber <= 30)
    {
      $otherbeing = rand(0, $peopleamount);
      if($human->beingId != $otherbeing)
      {
        MeetPeople($human->beingId, $otherbeing);
      }
    }
    else if($luckynumber >= 80)
    {
      $human->ImproveSkills();
    }
  }
}
