<?php
require "Functions/BbddFunctions/Select.php";
require "Config/autoloader.php";
require "Controllers/BeingsController/GoWork.php";
require "Controllers/BeingsController/GetNewJob.php";
require "Controllers/BeingsController/GoFreeTime.php";
require "Controllers/BeingsController/FreeTime.php";
require "Controllers/BeingsController/MeetPeople.php";
require "Controllers/ZonesController/ZoneMapper.php";
require "Month.php";
require "Functions/CommonFunctions/RandomName.php";

function Year($date)
{
  for ($i=1; $i <= 12; $i++)
  {
      Month($date);
  }
  $date->day = 1;
  $date->month = 1;
  $date->year++;
  $date->Update();
}
