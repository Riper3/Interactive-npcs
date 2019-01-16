<?php
function Update($table, $update, $condition)
{
 require "Config/bbdd.php";

 $sql = "UPDATE $table SET $update WHERE $condition";

 if ($conn->query($sql) === TRUE)
 {

 }
 else
 {
    echo "Error: ". $sql ."- - -". $conn->error;
 }

 $conn->close();
}

function UpdateJoin($table, $update, $join, $onjoin, $condition)
{
 require "Config/bbdd.php";

 $sql = "UPDATE $table JOIN $join ON $onjoin SET $update WHERE $condition";

 if ($conn->query($sql) === TRUE)
 {

 }
 else
 {
    echo "Error: ". $sql ."- - -". $conn->error;
 }

 $conn->close();
}
