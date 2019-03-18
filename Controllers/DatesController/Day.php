<?php

function Day($date)
{
    $x = 3;

    while($date->hour <= 24)
    {
        $schedule = ceil($date->hour/8);

        $freepeople = GoFreeTime($schedule);
        if(!empty($freepeople))
        {
            FreeTime($freepeople);
        }

        Gowork($schedule);

        GoSleep($schedule);

        if($date->hour == 1)
        {
          GetNewJob();
        }

        if($x == 3)
        {
          ZoneMapper();

          OfferJob();

          $x = 0;
        }

        $date->hour++;

        if($date->hour <= 24)
        {
           $date->Update();
        }
    }

    $date->hour = 1;
    $date->day++;
    $x++;

    if($date->day <= 30)
    {
      $date->Update();
    }

}
