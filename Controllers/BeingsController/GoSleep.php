<?php
function GoSleep($schedule)
{
  if($schedule == 3)
  {
    $sleeptime = 2;
  }
  elseif($schedule == 2)
  {
    $sleeptime = 1;
  }
  else
  {
    $sleeptime = $schedule + 2;
  }

  $people = new human;
  $sleeppeople = $people->SelectAll("schedule = $sleeptime");

  if($schedule == 3)
  {
    unset($people->relations[1]);
    $stoppeople = $people->SelectAll("professionId = 0");
    if(!empty($stoppeople))
    {
      $sleeppeople = array_merge($sleeppeople, $stoppeople);
    }
  }

  if(!empty($sleeppeople))
  {
    foreach ($sleeppeople as $human)
    {
      $human->Sleep();
    }
  }
}
