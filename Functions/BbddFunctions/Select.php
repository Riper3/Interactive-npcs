<?php
function SelectAll($table, $columns, $condition)
{
 require "Config/bbdd.php";

 $sql = "SELECT $columns FROM $table WHERE $condition";

 $result = $conn->query($sql);

 $i = 0;
 while ($row = $result->fetch_assoc())
    {
      $finalresult[$i] = $row;
      $i++;
    }
    
 if(!empty($finalresult))
 {
  return $finalresult;
 }

 $conn->close();
}

function SelectOne($table, $columns, $condition)
{
 require "Config/bbdd.php";

 $sql = "SELECT $columns FROM $table WHERE $condition";

 $result = $conn->query($sql)->fetch_row();

 return $result[0];

 $conn->close();
}

function SelectOneJoin($table, $columns, $join, $onjoin, $condition)
{
 require "Config/bbdd.php";

 $sql = "SELECT $columns FROM $table JOIN $join ON $onjoin WHERE $condition";

 $result = $conn->query($sql)->fetch_row();

 return $result[0];

 $conn->close();
}
