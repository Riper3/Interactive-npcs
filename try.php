<?php
include "Config/bbdd.php";
include "Classes/Beings/KindOfBeings/Human.php";

$pepe = new human();

$sql = "INSERT INTO beings (Name, Money, Strength)
VALUES ('John', $pepe->money, $pepe->strength)";

$conn->query($sql);

$conn->close();
