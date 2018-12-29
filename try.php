<?php
include "Functions/BbddFunctions/InsertObject.php";
include "Classes/Beings/KindOfBeings/Human.php";

$pepe = new human();
$pepe->NewBeing();
NewInsert("beings", $pepe);
print_r($pepe);
