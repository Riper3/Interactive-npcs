<?php
class app
{

  public function SelectById($id)
  {
     require "Config/bbdd.php";

     $sqlfields = "SHOW COLUMNS FROM $this->table";
     $idname = $conn->query($sqlfields)->fetch_array()[0];

     $sql = "SELECT * FROM $this->table WHERE $idname = $id";
     unset($this->table);

     $result = $conn->query($sql)->fetch_object();

     $conn->close();

     $vars = get_object_vars($result);

     foreach ($vars as $name => $oldvalue)
     {
     $this->$name = isset($vars[$name]) ? $vars[$name] : NULL;
     }
  }
}
