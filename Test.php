<?php
require_once "Classes/Beings/KindOfBeings/Human.php";



$human = new human;
$human->NewHuman();
$human->Insert();
$human->name = "Flori";
$human->Update();
