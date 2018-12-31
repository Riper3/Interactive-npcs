<?php
function NewInsert($table, $object)
{
 require "Config/bbdd.php";

 $conn = new mysqli($servername, $username, $password, $dbname);
 $arrayvalues = (array) $object;
 $columns = implode(", ",array_keys($arrayvalues));
 $values = implode("', '", $arrayvalues);
 $sql = "INSERT INTO $table ($columns) VALUES ('$values')";

 if ($conn->query($sql) === TRUE)
 {
    echo "New record created successfully";
 }
 else
 {
    echo "Error: ". $sql ."- - -". $conn->error;
 }

 $conn->close();
}
