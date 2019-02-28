<?php

require "Day.php";

function Month($date)
{
  while($date->day < 31)
  {
      Day($date);
  }
  
  $date->day = 1;
  $date->month++;
  if($date->month <= 12)
  {
    $date->Update();
  }
}
