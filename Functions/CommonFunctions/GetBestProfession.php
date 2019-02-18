<?php
function GetBestProfession($human)
{
  $avaliablezones = SelectAll("zones", "zoneId, resource", "villageId = $human->villageId");
  $skills = ["strength" => $human->strength, "intelligence" => $human->intelligence, "dexterity" => $human->dexterity];
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
        $profession->$newclass($human->villageId, $avaliablezones[$q]["zoneId"], $human->beingId);
        $profession->Insert();

        $human->professionId = $profession->professionId;
        $human->Update();

        $i = 1;
      }
      else
      {
        unset($skills[$bestskill]);
      }
    }
  }
}
