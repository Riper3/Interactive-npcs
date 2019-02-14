<?php
function Manual($sql)
{
 require "Config/bbdd.php";

 if(!empty($sql))
 {
   $conn->query($sql);
 }

 $conn->close();
}
