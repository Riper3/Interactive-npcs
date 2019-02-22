<?php

spl_autoload_register(function ($class) {
    $file = ucwords($class).'.php';
    $allclass = scandir("Classes");
    unset($allclass[0], $allclass[1], $allclass[2]);
    foreach ($allclass as $oneclass)
    {
      $firstfolder = scandir("Classes/".$oneclass);
      unset($firstfolder[0], $firstfolder[1]);
      $subfolder = "KindOf".$oneclass;

      if(in_array($file, $firstfolder))
      {
        require "Classes/".$oneclass."/".$file;
      }
      elseif(in_array($subfolder, $firstfolder))
      {
        $secondfolder = scandir("Classes/".$oneclass."/".$subfolder);
        unset($secondfolder[0], $secondfolder[1]);
        if(in_array($file, $secondfolder))
        {
          require "Classes/".$oneclass."/".$subfolder."/".$file;
        }
      }
    }
});
