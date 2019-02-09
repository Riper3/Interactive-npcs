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

 public $table = "beings";
 public $relations = ["buildings", "professions"];
}
