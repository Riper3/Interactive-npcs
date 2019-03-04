<?php

function CheckCompatiblity($human, $reciver)
{
  $human->GetElement();
  $reciver->GetElement();

  $points = 0;

  if($human->element == $reciver->element)
  {
    $points = $points + rand(1, 3);
  }
  else
  {
    $points = $points + rand(-3, 0);
  }

  if($human->professiontypeId == $reciver->professiontypeId)
  {
    $points = $points + rand(2, 4);
  }
  else
  {
    $points = $points + rand(-1, 1);
  }

  if($human->money < $reciver->money)
  {
    $points = $points + rand(2, 5);
  }
  else
  {
    $points = $points + rand(-3, 0);
  }

  return $points;
}
