<?php
require_once "Functions/BbddFunctions/Insert.php";
require_once "Functions/BbddFunctions/Select.php";
require_once "Functions/BbddFunctions/Update.php";
require_once "Classes/Beings/KindOfBeings/Human.php";
require_once "Classes/Buildings/KindOfBuilding/Shack.php";
require_once "Classes/Villages/KindOfVillages/Romanicvillage.php";
require_once "Classes/Professions/KindOfProfessions/Woodcuter.php";
require_once "Classes/Zones/KindOfZones/Forest.php";
require_once "Classes/Zones/KindOfZones/Stonemine.php";
require_once "Classes/Zones/KindOfZones/Foodplace.php";

$i = 0;
$x = 50;
$z = 0;
while($i < 100)
{
  if($x == 50)
  {
    $village = new romanicvillage();
    $village->NewVillage();
    $villageid = NewInsertObject("villages", $village);

    $storage = new stdClass();
    $storage->ownertype = "village";
    $storage->ownerId = $villageid;
    NewInsertObject("storages", $storage);

    while($z < 5)
    {
      $typezones = ["forest", "stonemine", "foodplace"];
      $newzone = $typezones[rand(0,2)];
      $zone = new $newzone();
      $zone->villageId = $villageid;
      $zone->name = $i . '-' . $z . '-'. $newzone;
      $zone->resourceamount = rand(100,10000);
      $zoneid[$z] = NewInsertObject("zones", $zone);
      $z++;
    }
    $x = 0;
    $z = 0;
  }
  // $poblation = count(Select("buildings", "buildingId", "villageId=$villageid"));

  $human = new human();
  $human->NewHuman();
  $beingid = NewInsertObject("beings", $human);

  $skills = SelectAll("beings", "strength, intelligence, dexterity", "beingId = $beingid");
  $bestskill = array_search(max($skills[0]),$skills[0]);

  $avaliablezones = SelectAll("zones", "type", "villageId = $villageid");
  print_r($avaliablezones);

  $profession = new woodcuter;
  $q = rand(0,4);
  $profession->NewWoodcuter($villageid, $zoneid[$q]);
  $professionid = NewInsertObject("professions", $profession);

  $house = new shack();
  $house->NewShack($beingid);
  $house->villageId = $villageid;
  $buildingid = NewInsertObject("buildings", $house);
  Update("beings", "buildingId='$buildingid'", "beingId='$beingid'");
  Update("beings", "professionId='$professionid'", "beingId='$beingid'");
  Update("professions", "beingId='$beingid'", "beingId=0");

  $x++;
  $i++;
}
