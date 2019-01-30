<?php
function Gowork($schedule)
{
  $workingpeople = SelectAllJoin("professions", "beingId, skill, resource", "professionstype", "professions.professiontypeId = professionstype.professiontypeId", "schedule=$schedule");
  return $workingpeople;
}
