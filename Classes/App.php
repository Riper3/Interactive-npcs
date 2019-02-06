<?php
class app
{
  public function SelectById($id)
  {
     require "Config/bbdd.php";

     $sqlfields = "SHOW COLUMNS FROM $this->table";
     $idname = $conn->query($sqlfields)->fetch_array()[0];

     if(!empty($this->relations))
     {
       $joins = NULL;
       foreach ($this->relations as $join)
       {
         $sqljoin = "JOIN $join ON $this->table.$idname = $join.$idname";
         $joins .= $sqljoin.' ';
       }
       $sql = "SELECT * FROM $this->table $joins WHERE $this->table.$idname = $id";
     }
     else
     {
       $sql = "SELECT * FROM $this->table $joins WHERE $this->table.$idname = $id";
     }
     $result = $conn->query($sql)->fetch_object();

     $conn->close();

     $vars = get_object_vars($result);

     foreach ($vars as $name => $oldvalue)
     {
       $this->$name = isset($vars[$name]) ? $vars[$name] : NULL;
     }
  }

  public function Delete()
  {
     require "Config/bbdd.php";

     $sqlfields = "SHOW COLUMNS FROM $this->table";
     $idname = $conn->query($sqlfields)->fetch_array()[0];
     $id = $this->$idname;

     $sql = "DELETE FROM $this->table WHERE $idname = $id";

     $conn->query($sql);

     $conn->close();
  }

  public function Insert()
  {
     require "Config/bbdd.php";
     $arrayvalues = (array) $this;
     unset($arrayvalues['table'], $arrayvalues['relations']);
     $columns = implode(", ",array_keys($arrayvalues));
     $values = implode("', '", $arrayvalues);
     $sql = "INSERT INTO $this->table ($columns) VALUES ('$values')";

     $sqlfields = "SHOW COLUMNS FROM $this->table";
     $idname = $conn->query($sqlfields)->fetch_array()[0];

     $conn->query($sql);
     $this->$idname = $conn->insert_id;

     $conn->close();
  }

  public function Update()
  {
     require "Config/bbdd.php";
     $arrayvalues = (array) $this;
     unset($arrayvalues['table'], $arrayvalues['relations']);

     $rawupdate = str_replace("&", "', ", http_build_query($arrayvalues));
     $update = str_replace("=", "='", $rawupdate)."'";

     $sqlfields = "SHOW COLUMNS FROM $this->table";
     $idname = $conn->query($sqlfields)->fetch_array()[0];
     $id = $this->$idname;

     $sql = "UPDATE $this->table SET $update WHERE $idname = $id";

     $conn->query($sql);

     return $conn->insert_id;

     $conn->close();
  }
}
