<?php
require_once (dirname(__DIR__).'/App.php');

class village extends app
{
 public $villageId;
 public $name;
 public $type;
 public $money;
 public $storageId;
 public $population;
 public $level;
 public $size;
 public $beingId;

 public $table = "villages";
}
