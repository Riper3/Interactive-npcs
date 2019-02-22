<?php
require_once (dirname(__DIR__).'/App.php');

class relation extends app
{
 public $relationId;
 public $beingId;
 public $relationtypeId;
 public $reciverId;
 public $points;

 public $table = "relations";
 public $relations = ["beings"];

 public function SelectRelation($beingid, $reciverId)
 {
   require "Config/bbdd.php";

   $sql = "SELECT * FROM $this->table WHERE beingId = $beingid AND reciverId = $reciverId";

   $result = $conn->query($sql)->fetch_object();
   unset($sql);
   $conn->close();

   if(!empty($result))
   {
     $vars = get_object_vars($result);

     foreach ($vars as $name => $oldvalue)
     {
       $this->$name = isset($vars[$name]) ? $vars[$name] : NULL;
     }
   }
 }
}
