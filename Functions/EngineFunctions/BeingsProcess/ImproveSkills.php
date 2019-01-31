<?php
function ImproveSkills($beingid)
{
  $skills = SelectAll("beings", "strength, intelligence, dexterity", "beingId=$beingid")[0];
  $bestskill = array_search(max($skills),$skills);
  $rawskill = SelectOne('beings', "$bestskill", "beingId=$beingid");
  $newskill = $rawskill + 0.1;
  Update("beings", "$bestskill=$newskill", "beingId=$beingid");
}
