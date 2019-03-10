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

 public function RefreshRelation()
 {
   $corelation = new relation;
   $corelation->SelectRelation($this->reciverId, $this->beingId);

   switch (true)
   {
     case $this->points >= 70 && $corelation->points >= 70:
         $this->type = "married";
         $corelation->type = "married";
         break;
     case $this->points >= 50 && $corelation->points >= 50:
         $this->type = "partner";
         $corelation->type = "partner";
         break;
     case $this->points >= 30 && $corelation->points >= 30:
         $this->type = "closefriend";
         $corelation->type = "closefriend";
         break;
     case $this->points >= 15 && $corelation->points >= 15:
         $this->type = "friend";
         $corelation->type = "friend";
         break;
     case $this->points >= 0 && $corelation->points >= 0:
         $this->type = "acquaintance";
         $corelation->type = "acquaintance";
         break;
     case $this->points <= -50 && $corelation->points >= -50:
         $this->type = "enemy";
         $corelation->type = "enemy";
         break;
   }

   $this->Update();
   $corelation->Update();
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
