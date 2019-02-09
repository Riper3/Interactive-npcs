<?php
require_once "Functions/BbddFunctions/Insert.php";
require_once "Functions/BbddFunctions/Select.php";
require_once "Functions/BbddFunctions/Update.php";
require_once "Functions/CommonFunctions/GetBestProfession.php";
require_once "Classes/Beings/KindOfBeings/Human.php";
require_once "Classes/Buildings/KindOfBuilding/Shack.php";
require_once "Classes/Villages/KindOfVillages/Romanicvillage.php";
require_once "Classes/Storages/MainStorage.php";
require_once "Classes/Professions/KindOfProfessions/Woodcuter.php";
require_once "Classes/Professions/KindOfProfessions/Hunter.php";
require_once "Classes/Professions/KindOfProfessions/Stoneminer.php";
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
    $village->Insert();

    $storage = new storage();
    $storage->ownertype = "village";
    $storage->ownerId = $village->villageId;
    $storage->Insert();

    while($z < 5)
    {
      $typezones = ["forest", "stonemine", "foodplace"];
      $newzone = $typezones[rand(0,2)];
      $zone = new $newzone();
      $zone->villageId = $village->villageId;
      $zone->name = $i . '-' . $z . '-'. $newzone;
      $zone->resourceamount = rand(10000,1000000);
      $zone->Insert();
      $z++;
    }
    $x = 0;
    $z = 0;
  }

  $human = new human();
  $human->NewHuman();
  $human->Insert();

  $house = new shack();
  $house->NewShack($human->beingId);
  $house->villageId = $village->villageId;
  $house->Insert();

  GetBestProfession($human->beingId);

  $human->buildingId = $house->buildingId;
  $human->Update();

  $x++;
  $i++;
}
