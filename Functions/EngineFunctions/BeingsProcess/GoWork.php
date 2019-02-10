<?php
function Gowork($schedule)
{
  $workingpeople = SelectAllJoin("professions", "beingId", "professionstype", "professions.professiontypeId = professionstype.professiontypeId", "schedule=$schedule");
  return $workingpeople;
}
