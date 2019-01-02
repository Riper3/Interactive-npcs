<?php
function Select($table, $columns, $condition)
{
 require "Config/bbdd.php";

 $sql = "SELECT $columns FROM $table WHERE $condition";

 $queryresult = $conn->query($sql);
 $result = $queryresult->fetch_assoc();

 $numberofelements = count($result);

 if($numberofelements == 1)
 {
   return $result[$columns];
 }
 else
 {
   return $result;
 }

 $conn->close();
}
