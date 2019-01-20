<?php
function Gowork($schedule)
{
  $people = SelectAll("professions", "beingId, requieredskill, generatedresource", "schedule=$schedule");

  return $people;
}
