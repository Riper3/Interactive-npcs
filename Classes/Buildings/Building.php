<?php
require_once (dirname(__DIR__).'/App.php');

class building extends app
{
 public $buildingId;
 public $street;
 public $number;
 public $villageId;
 public $beingId;
 public $buildingsize;

 public $table = "buildings";
 public $relations = ["beings", "villages"];
}
