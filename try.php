<?php
require "Functions/BbddFunctions/InsertObject.php";
require "Classes/Beings/KindOfBeings/Human.php";
require "Classes/Buildings/KindOfBuilding/Shack.php";

$human = new human();
$human->NewHuman();
NewInsert("beings", $human);
print_r($human->beingId);

$house = new shack();
$house->NewShack(1);
NewInsert("buildings", $house);
