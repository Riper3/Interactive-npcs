<?php
require (dirname(__DIR__).'/Being.php');

class human extends being
{
   public $name = "human one";
   public $type = "human";

   public function NewHuman()
   {
    $this->name = RandomName("names");
    $this->surname = RandomName("surnames");
    $genderoptions = array("male", "female");
    $genderkey = array_rand($genderoptions, 1);
    $this->gender = $genderoptions[$genderkey];
    $this->money = rand(100, 1000);
    $this->strength = rand(1, 100);
    $this->intelligence = rand(1, 100);
    $this->dexterity = rand(1, 100);
    $this->stamina = 100;
    $this->happiness = 100;
    $day = rand(1,30);
    $month = rand(1,12);
    $this->borndate = '0-'.$month.'-'.$day;
   }

   public function ImproveSkills()
   {
    $skills = ["strength" => $this->strength, "intelligence" => $this->intelligence, "dexterity" => $this->dexterity];
    $bestskill = array_search(max($skills),$skills);
    $this->$bestskill = $this->$bestskill + 0.1;
    $this->Update();
   }

   public function GetBestProfession()
   {
    $avaliablezones = SelectAll("zones", "zoneId, resource", "villageId = $this->villageId");
    $skills = ["strength" => $this->strength, "intelligence" => $this->intelligence, "dexterity" => $this->dexterity];
    if(!empty($avaliablezones))
    {
      for ($i=0; $i<1;)
      {
        $bestskill = array_search(max($skills),$skills);
        $professionnew = SelectOne("professionstype", "name", "skill = '$bestskill'");
        $professiosource = SelectOne("professionstype", "resource", "skill = '$bestskill'");

        if (in_array($professiosource, array_column($avaliablezones, "resource")))
        {
          $profession = new $professionnew;
          $q = array_search($professiosource, array_column($avaliablezones, "resource"));
          $newclass = "New".$professionnew;
          $profession->$newclass($this->villageId, $avaliablezones[$q]["zoneId"], $this->beingId);
          $profession->Insert();

          $this->professionId = $profession->professionId;
          $this->Update();

          $i = 1;
        }
        else
        {
          unset($skills[$bestskill]);
        }
      }
    }
   }

   public function Working()
   {
    $zone  = new zone;
    $zone->SelectById($this->zoneId);
    if(!empty($zone->zoneId))
    {
      $motivation = rand(1,5);
      $skill = SelectOne("professionstype", "skill", "professiontypeId = $this->professiontypeId");
      $resourceamount = ($this->$skill * 0.2) * $motivation;
      $earnmoney = round($resourceamount * 4);
      $newresource = $zone->resourceamount - $resourceamount;

      if($newresource > 0)
      {
       $zone->resourceamount = $newresource;
       $zone->Update();
       $resource = strtolower($zone->resource);

       $this->stamina = $this->stamina - $motivation;
       $this->money = $this->money + $earnmoney;
       $this->Update();

       $village = new village;
       $village->SelectById($this->villageId);
       $village->money = $village->money - $earnmoney;
       $village->Update();

       $storage = new storage;
       $storage->SelectById($village->storageId);
       $storage->$resource = $storage->$resource + $resourceamount;
       $storage->Update();
      }
      else
      {
        $zone->EndZone();
      }
    }
   }

   public function Sleep()
   {
     if($this->stamina < 100)
     {
     $sleepwell = rand(2,10);
     $this->stamina = $sleepwell + $this->stamina;
     if($this->stamina > 100)
     {
       $this->stamina = 100;
     }
     $this->Update();
     }
   }

}
