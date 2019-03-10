<?php
require_once (dirname(__DIR__).'/Relation.php');

class closefriend extends relation
{
  public $type = "closefriend";
  public $points = 30;

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

    $this->Update();
  }

}
