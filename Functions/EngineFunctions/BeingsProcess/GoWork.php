<?php
function Gowork($schedule)
{
  $people = new human;
  $workingpeople = $people->SelectAll("schedule = $schedule");

  foreach ($workingpeople as $human)
  {
    $human->Working();
  }
}
