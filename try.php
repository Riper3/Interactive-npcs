<?php
require "Functions/BbddFunctions/InsertObject.php";
require "Functions/BbddFunctions/Select.php";
require "Functions/BbddFunctions/Update.php";
require "Classes/Beings/KindOfBeings/Human.php";
require "Classes/Buildings/KindOfBuilding/Shack.php";

$i = 0;
while($i < 10000)
{
$human = new human();
$human->NewHuman();
$beingid = NewInsert("beings", $human);

$house = new shack();
$house->NewShack($beingid);
$buildingid = NewInsert("buildings", $house);

Update("beings", "buildingId='$buildingid'", "beingId='$beingid'");
$i++;
}
