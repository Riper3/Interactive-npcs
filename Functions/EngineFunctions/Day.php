<?php
require "Functions/BbddFunctions/Select.php";
require "Functions/BbddFunctions/Update.php";
require "Functions/BbddFunctions/Delete.php";
require "SubEngineProcess/GoWork.php";
require "SubEngineProcess/Working.php";

function Day()
{
  for ($i=1; $i <= 3; $i++)
  {
    $people = Gowork($i);
    Working($people);
  }
}
