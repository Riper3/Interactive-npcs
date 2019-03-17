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
     $peopleneeded = ($minresources - $this->wood) / 100;
     $this->needresource[] = ["resource" => "wood", "people" => $peopleneeded];
   }

   if($this->stone < $minresources)
   {
     $peopleneeded = ($minresources - $this->stone) / 100;
     $this->needresource []= ["resource" => "stone", "people" => $peopleneeded];
   }

   if($this->food < $minresources)
   {
     $peopleneeded = ($minresources - $this->food) / 100;
     $this->needresource[] = ["resource" => "food", "people" => $peopleneeded];
   }


   $this->population = $countpeople;
   $this->unemploymentrate = round(($countunemploymentpeople * 100)  / $countpeople);
   $this->zones = $zones;
 }

 public function PostJobs()
 {
   foreach ($this->needresource as $resource)
   {
     $x = 0;
     $countzones = count($this->zones);

     foreach ($this->zones as $zone)
     {
       if($zone->resource == $resource["resource"])
       {
         $job = SelectOne("professionstype", "name", "resource = '$resource[resource]'");
         $jobtypeid = SelectOne("professionstype", "professiontypeId", "resource = '$resource[resource]'");

         $profession = new profession;
         unset($profession->relations[0]);
         $professions = $profession->SelectAll("villageId = $this->villageId AND professionstype.professiontypeId = $jobtypeid AND professions.beingId = 0");

         if(!empty($professions))
         {
           $availableprofessions = count($professions);
           $newprofessions = $resource["people"] - $availableprofessions;
         }
         else
         {
           $newprofessions = $resource["people"];
         }

         if($newprofessions > 0)
         {
           for ($i=0; $i < $newprofessions; $i++)
           {
           $profession = new $job;
           $profession->villageId = $this->villageId;
           $profession->zoneId = $zone->zoneId;
           $profession->schedule = rand(1,3);
           $profession->Insert();
           }
         }
         break;
       }

       if($x == $countzones - 1)
       {
         //Here the village will post a offer to buy the resource
       }

      $x++;
     }
   }
 }

}
