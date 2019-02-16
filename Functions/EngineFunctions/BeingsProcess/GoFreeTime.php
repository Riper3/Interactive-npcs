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

  $people = new human;
  $freepeople = $people->SelectAll("schedule = $freetime");

  if($schedule == 1 || $schedule == 2)
  {
    unset($people->relations[1]);
    $stoppeople = $people->SelectAll("professionId = 0");
    if(!empty($stoppeople))
    {
      $freepeople = array_merge($freepeople, $stoppeople);
    }
  }
    return $freepeople;
}
