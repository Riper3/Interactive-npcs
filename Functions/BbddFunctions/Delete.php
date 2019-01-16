<?php
function DeleteOne($table, $condition)
{
 require "Config/bbdd.php";

 $sql = "DELETE FROM $table WHERE $condition";

 $conn->query($sql);

 $conn->close();
}
