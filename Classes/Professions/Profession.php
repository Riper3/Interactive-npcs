<?php
require_once (dirname(__DIR__).'/App.php');

class profession extends app
{
 public $professionId;
 public $beingId;
 public $professiontypeId;
 public $zoneId;
 public $villageId;
 public $schedule;

 public $table = "professions";
 public $relations = ["beings", "professionstype"];
}
