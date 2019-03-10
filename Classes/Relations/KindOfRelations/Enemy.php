<?php
require_once (dirname(__DIR__).'/Relation.php');

class enemy extends relation
{
  public $type = "enemy";
  public $points = -50;

  public function Talk()
  {
    $this->points--;
    $this->Update();
  }

}
