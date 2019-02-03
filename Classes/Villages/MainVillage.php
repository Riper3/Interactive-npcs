<?php
require (dirname(__DIR__).'/App.php');

class village extends app
{
 public $villageId;
 public $name;
 public $type;
 public $money;
 public $population;
 public $level;
 public $size;
 public $beingId;

  protected $table = "villages";
}
