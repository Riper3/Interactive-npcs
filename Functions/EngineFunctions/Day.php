<?php

function Day()
{
  for ($i=1; $i <= 3; $i++)
  {

    for ($x=1; $x <= 8; $x++)
    {
        $freepeople = GoFreeTime($i);
        if(!empty($freepeople))
        {
            FreeTime($freepeople);
        }

        $workingpeople = Gowork($i);
        if(!empty($workingpeople))
        {
            Working($workingpeople);
        }
    }

    if($i == 1)
    {
      $villagesid = ZoneMapper();
      NewZone($villagesid);

      GetNewJob();
    }
  }
}
