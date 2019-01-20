<?php
function GetBestProfession($beingid)
{
  $villageid = SelectOneJoin("beings", "villageId", "buildings", "beings.beingId = buildings.beingId", "beings.beingId = $beingid");
  $skills = SelectAll("beings", "strength, intelligence, dexterity", "beingId = $beingid");
  $professionstype = ["strength" => "woodcuter", "intelligence" => "hunter", "dexterity" => "stoneminer"];
  $zonestype = ["woodcuter" => "Wood", "hunter" => "Food", "stoneminer" => "Stone"];
  $avaliablezones = SelectAll("zones", "zoneId, resource", "villageId = $villageid");

  for ($i=0; $i=1;)
  {
    $bestskill = array_search(max($skills[0]),$skills[0]);
    $professionnew = $professionstype[$bestskill];
    $professiosource = $zonestype[$professionnew];

    if (in_array($professiosource, array_column($avaliablezones, "resource")))
    {
      $profession = new $professionnew;
      $q = array_search($professiosource, array_column($avaliablezones, "resource"));
      $newclass = "New".$professionnew;
      $profession->$newclass($villageid, $avaliablezones[$q]["zoneId"], $beingid);
      $professionid = NewInsertObject("professions", $profession);
      Update("beings", "professionId='$professionid'", "beingId='$beingid'");
      $i = 1;

      return $professionid;
    }
    else
    {
      unset($skills[0][$bestskill]);
    }
  }
}
