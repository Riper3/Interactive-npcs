<?php
class being
{
 public $name = "npc";
 public $gender;
 public $money;
 public $strength;
 public $intelligence;
 public $dexterity;
 public $stamina;

 function NewBeing()
 {
  $this->gender = rand(1, 2);
  $this->money = rand(100, 1000);
  $this->strength = rand(1, 100);
  $this->intelligence = rand(1, 100);
  $this->dexterity = rand(1, 100);
  $this->stamina = rand(1, 100);
 }
}
