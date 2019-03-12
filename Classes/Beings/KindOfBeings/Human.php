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
    $works = new profession;
    unset($works->relations[0]);
    $avaiableworks = $works->SelectAll("beingId = 0 AND villageId = $this->villageId");

    $skills = ["strength" => $this->strength, "intelligence" => $this->intelligence, "dexterity" => $this->dexterity];

    if(!empty($avaiableworks))
    {
      for ($i=0; $i<1;)
      {
        $bestskill = array_search(max($skills),$skills);

        if (in_array($bestskill, array_column($avaiableworks, "skill")))
        {
          foreach ($avaiableworks as $avaiablework)
          {
            if($bestskill == $avaiablework->skill)
            {
              $avaiablework->beingId = $this->beingId;
              $avaiablework->Update();
              
              $this->professionId = $avaiablework->professionId;
              $this->Update();

              $i = 1;
              break;
            }
          }
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

   public function MoveHouse($reciver)
   {
     if($this->buildingsize >= $reciver->buildingsize)
     {
       $newhouse = $this->buildingId;
       $oldhouse = $reciver->buildingId;
     }
     else
     {
       $newhouse = $reciver->buildingId;
       $oldhouse = $this->buildingId;
     }

     $this->buildingId = $newhouse;
     $reciver->buildingId = $newhouse;

     $oldbuilding = new building;
     $oldbuilding->SelectById($oldhouse);
     $oldbuilding->beingId = 0;

     $oldbuilding->Update();
     $this->Update();
     $reciver->Update();
   }

}
