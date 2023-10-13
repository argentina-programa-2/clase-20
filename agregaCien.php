<?php
include("bd.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    for ($i = 0; $i < 100; $i++) {
        $nombre = "Producto " . $i;
        $precio = 2 * $i;
        $conn->query("INSERT INTO clase20_productos(nombre, precio) VALUES ('$nombre', '$precio')");
    }

    echo json_encode(array("message" => "100 productos agregados correctamente!"));
}


$conn->close();
