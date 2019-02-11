<?php
require (dirname(__DIR__).'/MainBeing.php');

class human extends being
{
   public $name = "human one";
   public $type = "human";

   public function NewHuman()
   {
    include_once "Functions/CommonFunctions/RandomName.php";
    $this->name = RandomName("names");
    $this->surname = RandomName("surnames");
    $genderoptions = array("male", "female");
    $genderkey = array_rand($genderoptions, 1);
    $this->gender = $genderoptions[$genderkey];
    $this->money = rand(100, 1000);
    $this->strength = rand(1, 100);
    $this->intelligence = rand(1, 100);
    $this->dexterity = rand(1, 100);
    $this->stamina = rand(1, 100);
   }
}
