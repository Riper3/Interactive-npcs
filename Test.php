<?php
require "Functions/EngineFunctions/Year.php";

$human = new human;
$human->SelectById(2);
$human->GetBestProfession();
