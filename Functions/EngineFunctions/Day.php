<?php

function Day()
{
  for ($i=1; $i <= 3; $i++)
  {
    $people = Gowork($i);

    for ($x=1; $x <= 8; $x++)
    {
      if(!empty($people))
      {
        Working($people);
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
