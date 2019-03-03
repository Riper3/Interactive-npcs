<?php
function RandomName($type = NULL)
{
  if(is_null($type))
  {
    $vowels = ["a", "e", "i", "o", "u"];
    $consonants = ["b", "c", "d", "f", "g", "h", "j", "k", "l", "m", "n", "p", "q", "r", "s", "t", "v", "w", "x", "y", "z"];
    $vowelscount = count($vowels) - 1;
    $consonantscount = count($consonants) - 1;
    $lengthname = rand(3, 15);

    for($i = 0; $i < $lengthname; $i++)
    {
      if($i%2==0)
      {
        $consonant = rand(0, $consonantscount);
        $name[$i] = $consonants[$consonant];
      }
      else
      {
        $vowel = rand(0, $vowelscount);
        $name[$i] = $vowels[$vowel];
      }
    }

    return ucfirst(implode("", $name));
  }
  else
  {
    $url = "Etc/$type.json";
    $data = file_get_contents($url);
    $json = json_decode($data);
    $length = count($json);
    $key = rand(0, $length);
    return $json[$key];
  }
}
