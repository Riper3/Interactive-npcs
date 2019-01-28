<?php
require "Functions/BbddFunctions/Select.php";
require "Functions/BbddFunctions/Update.php";
require "Functions/BbddFunctions/Insert.php";
require "Functions/BbddFunctions/Delete.php";
require "Classes/Zones/KindOfZones/Forest.php";
require "Classes/Zones/KindOfZones/Stonemine.php";
require "Classes/Zones/KindOfZones/Foodplace.php";
require "BeingsProcess/GoWork.php";
require "BeingsProcess/Working.php";
require "BeingsProcess/GetNewJob.php";
require "ZonesProcess/NewZone.php";
require "ZonesProcess/ZoneMapper.php";
require "Functions/EngineFunctions/Month.php";

function Year()
{
  Month();
}
