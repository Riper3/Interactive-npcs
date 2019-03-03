<?php
require_once (dirname(__DIR__).'/Relation.php');

class partner extends relation
{
  public $type = "partner";
  public $points = 50;

  public function Talk()
  {
    $this->points++;
    $this->Update();
  }

}
