<?php
require "Functions/BbddFunctions/Select.php";
require "Classes/Storages/Mainstorage.php";
require "Classes/Zones/Mainzone.php";
require "Classes/Zones/KindOfZones/Forest.php";
require "Classes/Zones/KindOfZones/Stonemine.php";
require "Classes/Zones/KindOfZones/Foodplace.php";
require "Classes/Relations/KindOfRelations/Friend.php";
require "Classes/Beings/KindOfBeings/Human.php";
require "Classes/Villages/MainVillage.php";
require "BeingsProcess/GoWork.php";
require "BeingsProcess/GetNewJob.php";
require "BeingsProcess/Working.php";
require "BeingsProcess/GoFreeTime.php";
require "BeingsProcess/FreeTime.php";
require "BeingsProcess/MeetPeople.php";
require "ZonesProcess/NewZone.php";
require "ZonesProcess/ZoneMapper.php";
require "Functions/EngineFunctions/Month.php";
require "Functions/CommonFunctions/RandomName.php";

function Year()
{
  Month();
}
