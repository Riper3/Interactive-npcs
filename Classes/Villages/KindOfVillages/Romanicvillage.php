<?php
require (dirname(__DIR__).'/MainVillage.php');

class romanicvillage extends village
{
 public $type = "romanic";
 public $money = 10000;
 public $level = 1;
 public $size = 100;

 function NewVillage()
 {
   include_once "Functions/CommonFunctions/RandomName.php";
   $this->name = RandomName("cities")->name;
 }
}
