<?php
include("bd.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $nombre = $data['nombre'];
    $precio = $data['precio'];

    if (isset($nombre) && isset($precio)) {
        $conn->query("INSERT INTO clase20_productos(nombre, precio) VALUES ('$nombre', '$precio')");
        echo json_encode(array("message" => "Registrado correctamente!"));
    } else {
        echo json_encode(array("message" => "Nombre o precio no pueden ser nulos o vacios"));
    }
}






$conn->close();
