<?php
require_once "Functions/BbddFunctions/Insert.php";
require_once "Functions/BbddFunctions/Select.php";
require_once "Functions/BbddFunctions/Update.php";
require_once "Classes/Beings/KindOfBeings/Human.php";
require_once "Classes/Buildings/KindOfBuilding/Shack.php";
require_once "Classes/Villages/KindOfVillages/Romanicvillage.php";
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
  $professionstype = ["strength" => "woodcuter", "intelligence" => "hunter", "dexterity" => "stoneminer"];
  $zonestype = ["woodcuter" => "Wood", "hunter" => "Food", "stoneminer" => "Stone"];
  $professionnew = $professionstype[$bestskill];
  $professiosource = $zonestype[$professionnew];

  $avaliablezones = SelectAll("zones", "zoneId, resource", "villageId = $villageid");

  if (array_search($professiosource, array_column($avaliablezones, "resource")))
  {
    $profession = new $professionnew;
    $q = array_search($professiosource, $avaliablezones);
    $newclass = "New".$professionnew;
    $profession->$newclass($villageid, $avaliablezones[$q]["zoneId"]);
    $professionid = NewInsertObject("professions", $profession);
  }
  else
  {
    $professionid = 0;
  }
  // hacer que cada trabajador pueda tener su tipo de zona y ver si está disponible

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
