<?php
function Gowork($schedule)
{
  $people = new human;
  $workingpeople = $people->SelectAll("schedule = $schedule");

  if(!empty($workingpeople))
  {
    foreach ($workingpeople as $human)
    {
      $human->Working();
    }
  }
}
