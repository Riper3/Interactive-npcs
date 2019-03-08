<?php
class app
{
  public function SelectById($id)
  {
     require "Config/bbdd.php";

     $sqlfields = "SHOW COLUMNS FROM $this->table";
     $idname = $conn->query($sqlfields)->fetch_array()[0];

     $sql = "SELECT * FROM $this->table WHERE $idname = $id";
     $object = $conn->query($sql)->fetch_object();

     if(!empty($this->relations))
     {
       $joins = NULL;
       foreach ($this->relations as $join)
       {
         $sqlfields = "SHOW COLUMNS FROM $join";
         $idjoin = $conn->query($sqlfields)->fetch_array()[0];
         $idvalue = $object->$idjoin;

         $checkjoin = "SELECT $idjoin FROM $join WHERE $idjoin = $idvalue";

         if($conn->query($checkjoin)->num_rows == 1)
         {
           $sqljoin = "JOIN $join ON $this->table.$idjoin = $join.$idjoin";
           $joins .= $sqljoin.' ';
         }
       }
       $sql = "SELECT * FROM $this->table $joins WHERE $this->table.$idname = $id";
       $object = $conn->query($sql)->fetch_object();
     }

     unset($sql);
     $conn->close();

     if(!empty($object))
     {
       $vars = get_object_vars($object);

       foreach ($vars as $name => $oldvalue)
       {
         $this->$name = isset($vars[$name]) ? $vars[$name] : NULL;
       }
    }
  }

  public function SelectAll($condition = NULL)
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
       if(!empty($condition))
       {
         $sql = "SELECT * FROM $this->table $joins WHERE $condition";
       }
       else
       {
         $sql = "SELECT * FROM $this->table $joins";
       }
     }
     else
     {
       if(!empty($condition))
       {
         $sql = "SELECT * FROM $this->table WHERE $condition";
       }
       else
       {
         $sql = "SELECT * FROM $this->table";
       }
     }

     $result = $conn->query($sql);

     $classname = get_class($this);
     $i = 0;
     while ($row = $result->fetch_object($classname))
     {
      $finalresult[$i] = $row;
      $i++;
     }

     unset($sql);
     $conn->close();

     if(!empty($finalresult))
     {
     return $finalresult;
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
     unset($sql);

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
     unset($sql);
     $this->$idname = $conn->insert_id;

     $conn->close();
  }

  public function Update()
  {
     require "Config/bbdd.php";

     $sqlfields = "SHOW COLUMNS FROM $this->table";
     $fields = $conn->query($sqlfields);
     $i = 0;
     while($field = mysqli_fetch_array($fields)[0])
     {
       if($i == 0)
       {
         $idname = $field;
         $i++;
       }
       $arrayupdate[$field] = $this->$field;
     }

     $rawupdate = str_replace("&", "', ", http_build_query($arrayupdate));
     $update = str_replace("=", "='", $rawupdate)."'";

     $id = $this->$idname;

     $sql = "UPDATE $this->table SET $update WHERE $idname = $id";

     $conn->query($sql);
     unset($sql);

     $conn->close();
  }
}
