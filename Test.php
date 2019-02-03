<?php
require_once "Classes/Beings/KindOfBeings/Human.php";



$human = new human;
$human->SelectById("beingId = 1");
print_r($human);
