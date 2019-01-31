<?php
require_once (dirname(__DIR__).'/MainRelation.php');

class friend extends relation
{
  public $relationtypeId = 1;

  function NewFriend($beingid, $reciverid)
  {
    $this->beingId = $beingid;
    $this->reciverId = $reciverid;
  }
}
