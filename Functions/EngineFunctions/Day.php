<?php

function Day()
{
  for ($i=1; $i <= 3; $i++)
  {
    $workingpeople = Gowork($i);
    $freepeople = GoFreeTime($i);

    for ($x=1; $x <= 8; $x++)
    {
      if(!empty($workingpeople))
      {
        Working($workingpeople);
      }
      if(!empty($freepeople))
      {
        FreeTime($freepeople);
      }
    }

    if($i == 1)
    {
      $villagesid = ZoneMapper();
      if(!empty($villagesid))
      {
        NewZone($villagesid);
      }

      GetNewJob();
    }
  }
}
