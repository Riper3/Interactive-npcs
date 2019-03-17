<?php

function Day($date)
{
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

        if($schedule == 1)
        {
          ZoneMapper();

          OfferJob();

          GetNewJob();
        }

        $date->hour++;
        if($date->hour <= 24)
        {
           $date->Update();
        }
    }

    $date->hour = 1;
    $date->day++;
    if($date->day <= 30)
    {
      $date->Update();
    }

}
