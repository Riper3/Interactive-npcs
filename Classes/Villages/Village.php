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

   $zone = new zone;
   $zones = $zone->SelectAll("villageId = $this->villageId");

   if(!empty($villagepeople))
   {
     $countpeople = count($villagepeople);
   }
   else
   {
     $countpeople = 0;
   }

   if(!empty($unemploymentpeople))
   {
   $countunemploymentpeople = count($unemploymentpeople);
   }
   else
   {
     $countunemploymentpeople = 0;
   }

   $minresources = $this->level * 5000;

   if($this->wood < $minresources)
   {
     $this->needresource[] = "wood";
   }

   if($this->stone < $minresources)
   {
   $this->needresource[] = "stone";
   }

   if($this->food < $minresources)
   {
   $this->needresource[] = "food";
   }


   $this->population = $countpeople;
   $this->unemploymentrate = ($countunemploymentpeople * 100)  / $countpeople;
   $this->zones = $zones;
 }
}
