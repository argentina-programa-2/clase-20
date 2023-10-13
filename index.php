<?php
include("bd.php");
$result = $conn->query("SELECT * FROM clase20_productos");
$productos = [];
if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $productos[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clase 20</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <nav class="d-flex flex-row justify-content-center">
        <button type="button" class="btn btn-success m-2" data-bs-toggle="modal" data-bs-target="#agregarProducto">Agregar un nuevo empleado</button>

        <div class="modal fade" id="agregarProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form id="agregar" method="POST" class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nombre_producto" class="form-label">Nombre Producto</label>
                            <input type="text" class="form-control" id="nombre_producto" required />
                        </div>
                        <div class="mb-3">
                            <label for="precio_producto" class="form-label">Precio Producto</label>
                            <input type="number" class="form-control" id="precio_producto" required />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>

        <form id="agregarCien" method="POST">
            <button type="submit" class="btn btn-success m-2">Agregar 100 productos</button>
        </form>
        <form id="eliminarImpares" method="POST">
            <button type="submit" class="btn btn-danger m-2">Elimina impares</button>
        </form>
        <form id="eliminarPares" method="POST">
            <button type="submit" class="btn btn-danger m-2">Elimina pares</button>
        </form>
    </nav>
    <h1 class="text-center">Usuarios</h1>
    <p class="text-center">Para ver reflejados los cambios hay que actualizar la pagina</p>
    <table class="table w-50 m-auto">
        <thead class="table-dark">
            <tr>
                <th class='text-center' scope="col">ID</th>
                <th class='text-center' scope="col">Nombre</th>
                <th class='text-center' scope="col">Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (count($productos) > 0) {
                for ($i = 0; $i < count($productos); $i++) {
                    echo "<tr>";
                    echo "<td class='text-center'>" . $productos[$i]['id'] . "</td>";
                    echo "<td class='text-center'>" . $productos[$i]['nombre'] . "</td>";
                    echo "<td class='text-center'>" . $productos[$i]['precio'] . "</td>";

                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script>
        document.querySelector("#agregar").addEventListener("submit", (e) => {
            e.preventDefault();
            const nombre = document.querySelector("#nombre_producto").value
            const precio = document.querySelector("#precio_producto").value

            fetch("nuevoEmpleado.php", {
                    method: "POST",
                    body: JSON.stringify({
                        nombre: nombre,
                        precio: precio
                    })
                })
                .then(res => res.json())
                .then(data => {
                    console.log(data)
                })

        })

        document.querySelector("#agregarCien").addEventListener("submit", (e) => {
            e.preventDefault()
            fetch("agregaCien.php", {
                    method: "POST",
                    body: JSON.stringify({})
                })
                .then(res => res.json())
                .then(data => {
                    console.log(data)
                })
        })
        document.querySelector("#eliminarImpares").addEventListener("submit", (e) => {
            e.preventDefault()
            fetch("eliminarImpares.php", {
                    method: "POST",
                    body: JSON.stringify({})
                })
                .then(res => res.json())
                .then(data => {
                    console.log(data)
                })
        })
        document.querySelector("#eliminarPares").addEventListener("submit", (e) => {
            e.preventDefault()
            fetch("eliminarPares.php", {
                    method: "POST",
                    body: JSON.stringify({})
                })
                .then(res => res.json())
                .then(data => {
                    console.log(data)
                })
        })
    </script>
</body>

</html>