<?php
function NewInsertObject($table, $object)
{
 require "Config/bbdd.php";

 $arrayvalues = (array) $object;
 $columns = implode(", ",array_keys($arrayvalues));
 $values = implode("', '", $arrayvalues);
 $sql = "INSERT INTO $table ($columns) VALUES ('$values')";

 if ($conn->query($sql) === TRUE)
 {
   return $conn->insert_id;
 }
 else
 {
    echo "Error: ". $sql ."- - -". $conn->error;
 }

 $conn->close();
}
