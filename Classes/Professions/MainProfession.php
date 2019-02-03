<?php
require (dirname(__DIR__).'/App.php');

class profession extends app
{
  public $professionId;
  public $beingId;
  public $professiontypeId;
  public $zoneId;
  public $villageId;
  public $schedule;

   protected $table = "professions";
}
