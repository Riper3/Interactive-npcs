<?php
function RandomName()
{
  $url = "Etc/names.json";
  $data = file_get_contents($url);
  $json = json_decode($data);
  $key = rand(0, 21936);
  return $json[$key];
}

function RandomSurname()
{
  $url = "Etc/names.json";
  $data = file_get_contents($url);
  $json = json_decode($data);
  $key = rand(0, 21986);
  return $json[$key];
}
