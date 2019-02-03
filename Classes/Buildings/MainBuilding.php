<?php
require (dirname(__DIR__).'/App.php');

class building extends app
{
 public $buildingId;
 public $street;
 public $number;
 public $villageId;
 public $beingId;
 public $size;

 public $table = "buildings";
}
