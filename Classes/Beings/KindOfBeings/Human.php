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
   
}
