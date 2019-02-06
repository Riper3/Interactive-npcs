<?php
require (dirname(__DIR__).'/App.php');

class relation extends app
{
 public $beingId;
 public $relationtypeId;
 public $reciverId;
 public $points;

 public $table = "relations";
 public $relations = ["beings"];
}
