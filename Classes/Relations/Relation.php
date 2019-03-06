<?php
require_once (dirname(__DIR__).'/App.php');

class relation extends app
{
 public $relationId;
 public $beingId;
 public $type;
 public $reciverId;
 public $points;

 public $table = "relations";

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

 public function Interaction()
 {
   $human = new human;
   $human->SelectById($this->beingId);

   $reciver = new human;
   $reciver->SelectById($this->reciverId);

   $human->GetElement();
   $reciver->GetElement();

   return [$human, $reciver];
 }

 public function MeetUnknownPeople($beingid, $reciverid)
 {
   $newrelation = new acquaintance;
   $newrelation->beingId = $beingid;
   $newrelation->reciverId = $reciverid;
   $newrelation->Insert();

   $corelation = new acquaintance;
   $corelation->beingId = $reciverid;
   $corelation->reciverId = $beingid;
   $corelation->Insert();
 }

}
