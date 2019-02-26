<?php
require_once (dirname(__DIR__).'/App.php');

class date extends app
{
 public $dateId;
 public $hour;
 public $day;
 public $month;
 public $year;

 public $table = "dates";
}
