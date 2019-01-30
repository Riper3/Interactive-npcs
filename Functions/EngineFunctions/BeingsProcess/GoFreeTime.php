<?php
function GoFreeTime($schedule)
{
  if($schedule == 3)
  {
    $freetime = 1;
  }
  else
  {
    $freetime = $schedule + 1;
  }

  $peoplefree = SelectAllJoin("professions", "beingId", "professionstype", "professions.professiontypeId = professionstype.professiontypeId", "schedule=$freetime");

  if($schedule == 1 || $schedule == 2)
  {
    $stoppeople = SelectAll("beings", "beingId", "professionId=0");
    if(!empty($stoppeople))
    {
      $freepeople = array_merge($peoplefree, $stoppeople);
    }
  }

  return $freepeople;
}
