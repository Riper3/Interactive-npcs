<?php

function Day($date)
{
  for ($i=1; $i <= 3; $i++)
  {

    for ($x=1; $x <= 8; $x++)
    {
        $date->hour++;
        $date->Update();
        
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
      ZoneMapper();

      GetNewJob();
    }
  }
  $date->hour = 0;
  $date->day++;
  $date->Update();
}
