<?php

function OfferJob()
{
  $villages = new village;
  $villages = $villages->SelectAll();

  foreach ($villages as $village)
  {
    $village->GetVillageInfo();

    if(isset($village->needresource))
    {
      $village->PostJobs();
    }
  }
}
