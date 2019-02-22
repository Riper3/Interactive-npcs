<?php
require "Functions/BbddFunctions/Select.php";
require "Config/autoloader.php";
require "BeingsProcess/GoWork.php";
require "BeingsProcess/GetNewJob.php";
require "BeingsProcess/GoFreeTime.php";
require "BeingsProcess/FreeTime.php";
require "BeingsProcess/MeetPeople.php";
require "ZonesProcess/ZoneMapper.php";
require "Functions/EngineFunctions/Month.php";
require "Functions/CommonFunctions/RandomName.php";

function Year()
{
  Month();
}
