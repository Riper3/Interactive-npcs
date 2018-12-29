<?php
require "Functions/BbddFunctions/InsertObject.php";
require "Classes/Beings/KindOfBeings/Human.php";

$pepe = new human();
$pepe->NewHuman();
NewInsert("beings", $pepe);
print_r($pepe);
