<?php
require_once (dirname(__DIR__).'/App.php');

class storage extends app
{
 public $storageId;
 public $ownertype;
 public $ownerId;
 public $money;
 public $wood;
 public $stone;
 public $metal;
 public $food;

 public $table = "storages";
}
