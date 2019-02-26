<?php

require "Day.php";

function Month($date)
{
  for ($i=1; $i <= 30; $i++)
  {
      Day($date);
  }
  $date->day = 1;
  $date->month++;
  $date->Update();
}
