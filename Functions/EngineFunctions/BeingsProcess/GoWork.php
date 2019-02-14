<?php
function Gowork($schedule)
{
  $people = new human;
  $workingpeople = $people->SelectAll("schedule = $schedule");
  return $workingpeople;
}
