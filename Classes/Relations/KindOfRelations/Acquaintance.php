<?php
require_once (dirname(__DIR__).'/Relation.php');

class acquaintance extends relation
{
  public $type = "acquaintance";
  public $points = 0;

  public function Talk()
  {
    $persons = $this->Interaction();

    $human = $persons[0];
    $reciver = $persons[1];

    if($human->element == $reciver->element)
    {
      $this->points = $this->points + rand(1, 3);
    }
    else
    {
      $this->points = $this->points + rand(-3, 0);
    }

    if($human->professiontypeId == $reciver->professiontypeId)
    {
      $this->points = $this->points + rand(2, 4);
    }
    else
    {
      $this->points = $this->points + rand(-1, 1);
    }

    if($human->money < $reciver->money)
    {
      $this->points = $this->points + rand(2, 5);
    }
    else
    {
      $this->points = $this->points + rand(-3, 0);
    }

    $this->Update();
  }

}
