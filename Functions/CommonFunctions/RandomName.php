<?php
function RandomName($type)
{
  $url = "Etc/$type.json";
  $data = file_get_contents($url);
  $json = json_decode($data);
  $length = count($json);
  $key = rand(0, $length);
  return $json[$key];
}
