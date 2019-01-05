<?php
require "Functions/BbddFunctions/InsertObject.php";
require "Functions/BbddFunctions/Select.php";
require "Functions/BbddFunctions/Update.php";
require "Classes/Beings/KindOfBeings/Human.php";
require "Classes/Buildings/KindOfBuilding/Shack.php";
require "Classes/Villages/KindOfVillages/Romanicvillage.php";
require "Classes/Professions/MainProfession.php";

/*
$profession = new profession;
$profession->name = "Woodcuter";
$profession->moneyperhour = 10;
$profession->fatigueperhour = 5;
$villageid = NewInsert("professions", $profession);
die();
*/

$i = 0;
$x = 50;
while($i < 1000)
{
if($x == 50)
{
$village = new romanicvillage();
$village->NewVillage();
$villageid = NewInsert("villages", $village);
$x = 0;
}
// $poblation = count(Select("buildings", "buildingId", "villageId=$villageid"));

$human = new human();
$human->NewHuman();
$beingid = NewInsert("beings", $human);

$house = new shack();
$house->NewShack($beingid);
$house->villageId = $villageid;
$buildingid = NewInsert("buildings", $house);
Update("beings", "buildingId='$buildingid'", "beingId='$beingid'");

$x++;
$i++;
}
