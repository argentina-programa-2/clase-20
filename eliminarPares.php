<?php
include("bd.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn->query("DELETE FROM clase20_productos
    WHERE id % 2 = 0");
    echo json_encode(array("message" => "Impares eliminados correctamente!"));
}

$conn->close();
