<?php
require "Controllers/DatesController/Year.php";

$date = new date;
$date->SelectById(1);

while (TRUE)
{
Year($date);
}
