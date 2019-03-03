<?php
require_once (dirname(__DIR__).'/Relation.php');

class acquaintance extends relation
{
  public $type = "acquaintance";
  public $points = 0;

  public function Talk()
  {
    $this->points++;
    $this->Update();
  }

}
