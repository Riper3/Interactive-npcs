<?php
require_once "Classes/Beings/KindOfBeings/Human.php";



$human = new human;
$human->NewHuman();
$id = $human->Insert($human);
$human->DeleteById($id);
