<?php
require_once (dirname(__DIR__).'/Relation.php');

class friend extends relation
{
  public $type = "friend";
  public $points = 15;

  public function Talk()
  {
    $this->points++;
    $this->Update();
  }

}
