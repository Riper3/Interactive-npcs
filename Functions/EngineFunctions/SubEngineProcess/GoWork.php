<?php
function Gowork($schedule)
{
  $people = SelectAll("professions", "beingId, requieredskill, generatedresource", "schedule=$schedule AND professionId!=0");

  return $people;
}
