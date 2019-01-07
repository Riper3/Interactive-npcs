<?php
require "Functions/BbddFunctions/InsertObject.php";
require "Functions/BbddFunctions/Select.php";
require "Functions/BbddFunctions/Update.php";
require "Classes/Beings/KindOfBeings/Human.php";
require "Classes/Buildings/KindOfBuilding/Shack.php";
require "Classes/Villages/KindOfVillages/Romanicvillage.php";
require "Classes/Professions/KindOfProfessions/Woodcuter.php";
require "Classes/Zones/KindOfZones/Forest.php";

$i = 0;
$x = 50;
$z = 0;
while($i < 100)
{
  if($x == 50)
  {
    $village = new romanicvillage();
    $village->NewVillage();
    $villageid = NewInsert("villages", $village);

    while($z < 5)
    {
      $zone = new forest();
      $zone->name = $i . '-' . $z . '- zonetest';
      $zone->resorceamount = rand(100,10000);
      $zoneid[$z] = NewInsert("zones", $zone);
      $z++;
    }
    $x = 0;
    $z = 0;
  }
  // $poblation = count(Select("buildings", "buildingId", "villageId=$villageid"));

  $human = new human();
  $human->NewHuman();
  $beingid = NewInsert("beings", $human);

  $profession = new woodcuter;
  $q = rand(0,4);
  $profession->NewWoodcuter($beingid, $villageid, $zoneid[$q]);
  $professionid = NewInsert("professions", $profession);

  $house = new shack();
  $house->NewShack($beingid);
  $house->villageId = $villageid;
  $buildingid = NewInsert("buildings", $house);
  Update("beings", "buildingId='$buildingid'", "beingId='$beingid'");

  $x++;
  $i++;
}
