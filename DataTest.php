<?php
require_once "Functions/BbddFunctions/Select.php";
require_once "Functions/CommonFunctions/RandomName.php";
require_once "Config/autoloader.php";

$i = 0;
$x = 50;
$z = 0;

$date = new date;
$date->day = 1;
$date->month = 1;
$date->year = 1;
$date->Insert();

while($i < 100)
{
  if($x == 50)
  {
    $village = new romanicvillage();
    $village->name = RandomName();
    $village->Insert();

    $storage = new storage();
    $storage->ownertype = "village";
    $storage->ownerId = $village->villageId;
    $storage->money = 50.000;
    $storage->Insert();

    $village->storageId = $storage->storageId;
    $village->Update();

    while($z < 5)
    {
      $typezones = ["forest", "stonemine", "foodplace"];
      $newzone = $typezones[rand(0,2)];
      $zone = new $newzone();
      $zone->villageId = $village->villageId;
      $zone->name = RandomName();
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

  $human->villageId = $village->villageId;
  $human->buildingId = $house->buildingId;
  $human->Update();

  $x++;
  $i++;
}
