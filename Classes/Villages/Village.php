<?php
require_once (dirname(__DIR__).'/App.php');

class village extends app
{
 public $villageId;
 public $name;
 public $type;
 public $storageId;
 public $population;
 public $level;
 public $villagesize;
 public $beingId;

 public $table = "villages";
 public $relations = ["storages"];

 public function GetVillageInfo()
 {
   $people = new human;
   unset($people->relations[1]);
   $villagepeople = $people->SelectAll("villageId = $this->villageId");
   $unemploymentpeople = $people->SelectAll("villageId = $this->villageId AND professionId = 0");

   $countpeople = count($villagepeople);
   $countunemploymentpeople = count($unemploymentpeople);

   $this->population = $countpeople;
   $this->unemploymentrate = ($countunemploymentpeople * 100)  / $countpeople;
 }
}
