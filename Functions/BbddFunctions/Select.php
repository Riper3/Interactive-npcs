<?php
function Select($table, $columns, $condition)
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
    
 return $finalresult;

 $conn->close();
}
