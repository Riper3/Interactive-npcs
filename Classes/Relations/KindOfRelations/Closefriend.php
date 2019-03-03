<?php
require_once (dirname(__DIR__).'/Relation.php');

class closefriend extends relation
{
  public $type = "closefriend";
  public $points = 30;

  public function Talk()
  {
    $this->points++;
    $this->Update();
  }

}
