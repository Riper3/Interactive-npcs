<?php
function ImproveSkills($human)
{
  $skills = ["strength" => $human->strength, "intelligence" => $human->intelligence, "dexterity" => $human->dexterity];
  $bestskill = array_search(max($skills),$skills);
  $newskill = $human->$bestskill + 0.1;
  $human->Update();
}
