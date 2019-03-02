<?php
require "Functions/BbddFunctions/Select.php";
require "Config/autoloader.php";
require "Controllers/BeingsController/GoWork.php";
require "Controllers/BeingsController/GetNewJob.php";
require "Controllers/BeingsController/GoFreeTime.php";
require "Controllers/BeingsController/GoSleep.php";
require "Controllers/BeingsController/FreeTime.php";
require "Controllers/BeingsController/MeetUnknownPeople.php";
require "Controllers/ZonesController/ZoneMapper.php";
require "Month.php";
require "Functions/CommonFunctions/RandomName.php";
require "Functions/CommonFunctions/FilterMultiArray.php";

function Year($date)
{
  while($date->month < 13)
  {
      Month($date);
  }
  $date->month = 1;
  $date->year++;
  $date->Update();
}
