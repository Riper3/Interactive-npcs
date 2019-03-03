<?php
require_once (dirname(__DIR__).'/App.php');

class being extends app
{
 public $beingId;
 public $name;
 public $surname;
 public $type;
 public $gender;
 public $professionId;
 public $money;
 public $buildingId;
 public $strength;
 public $intelligence;
 public $dexterity;
 public $stamina;
 public $happiness;
 public $borndate;

 public $table = "beings";
 public $relations = ["buildings", "professions"];

 public function GetElement()
 {
   $month = explode("-", $this->borndate)[1];
   
   if($month <= 3)
   {
   $this->element = "fire";
   }

   if($month >= 4 && $month <= 6)
   {
   $this->element = "air";
   }

   if($month >= 7 && $month <= 9)
   {
   $this->element = "earth";
   }

   if($month >= 10 && $month <= 12)
   {
   $this->element = "water";
   }
 }

}
