<?php
require_once "Classes/Beings/KindOfBeings/Human.php";



$human = new human;
// $human->NewHuman();
// $human->Insert();
$human->SelectById(2);
$human->name = "Flori";
$human->Update();
