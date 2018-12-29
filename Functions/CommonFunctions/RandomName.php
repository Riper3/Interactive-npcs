<?php
function RandomName()
{
  $url = "Etc/names.json";
  $data = file_get_contents($url);
  $json = json_decode($data);
  $key = rand(0, 10000);
  return $json[$key];
}
