<?php
require_once "Functions/CommonFunctions/GetBestProfession.php";
require_once "Classes/Professions/KindOfProfessions/Woodcuter.php";
require_once "Classes/Professions/KindOfProfessions/Hunter.php";
require_once "Classes/Professions/KindOfProfessions/Stoneminer.php";

function GetNewJob()
{
  $people = SelectAll("beings", "beingId", 'professionId=0');

  if(!empty($people))
  {
    foreach ($people as $person)
    {
      GetBestProfession($person["beingId"]);
    }
  }
}
