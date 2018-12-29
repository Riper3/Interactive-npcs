<?php
include "Functions/BbddFunctions/InsertObject.php";
include "Classes/Beings/KindOfBeings/Human.php";

$pepe = new human();
$pepe->NewHuman();
NewInsert("beings", $pepe);
print_r($pepe);
