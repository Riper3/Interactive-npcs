<?php
require_once (dirname(__DIR__).'/Relation.php');

class married extends relation
{
  public $type = "married";
  public $points = 70;

  public function Talk()
  {
    $this->points++;
    $this->Update();
  }

}
