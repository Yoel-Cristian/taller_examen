<?php
$conexion = new mysqli("localhost", "root", "", "sistema");

$id = $_POST["id"];
$nombre = mysqli_real_escape_string($conexion, $_POST["nombre"]);
$direccion = mysqli_real_escape_string($conexion, $_POST["direccion"]);


if ($nombre && $direccion && $telefono  && $id != "") {
    $update_query = "UPDATE tiendas SET nombre='$nombre', direccion='$direccion'  WHERE id='$id'";
    
    if ($conexion->query($update_query)) {
        echo 'Registro actualizado exitosamente.';
    } else {
        echo 'Error al actualizar el registro: ' . $conexion->error;
    }

    $conexion->close();
} else {
    // header("Location: interfaz.html");
    exit;
}
