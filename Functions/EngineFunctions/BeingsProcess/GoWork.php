<?php
function Gowork($schedule)
{
  $people = SelectAllJoin("professions", "beingId, skill, resource", "professionstype", "professions.professiontypeId = professionstype.professiontypeId", "schedule=$schedule");
  return $people;
}
