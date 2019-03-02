<?php
function FilterMultiArray($array, $property, $value)
{
  $i = -1;
  foreach ($array as $key => $one)
  {
    $i++;
    if($one->$property != $value)
    {
      unset($array[$i]);
    }
  }

  return array_values($array);
}
