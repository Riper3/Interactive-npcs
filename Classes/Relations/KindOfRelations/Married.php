<?php
require_once (dirname(__DIR__).'/Relation.php');

class married extends relation
{
  public $type = "married";

  public function Talk()
  {
    $persons = $this->Interaction();

    $human = $persons[0];
    $reciver = $persons[1];

    if($reciver->happiness >= 50)
    {
      $this->points = $this->points + rand(1, 3);
    }
    else
    {
      $this->points = $this->points - rand(1, 3);
    }
    $this->RefreshRelation();
  }

}
