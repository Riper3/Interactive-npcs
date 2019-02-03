<?php
require (dirname(__DIR__).'/App.php');

class zone extends app
{
 public $zoneId;
 public $name;
 public $villageId;
 public $type;
 public $resource;
 public $resourceamount;

 public $table = "zones";
}
