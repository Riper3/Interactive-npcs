<?php

function GetNewJob()
{
  $people = new human;
  unset($people->relations[1]);
  $freepeople = $people->SelectAll("professionId = 0");
  if(!empty($freepeople))
  {
    foreach ($freepeople as $human)
    {
      $human->GetBestProfession();
    }
  }
}
