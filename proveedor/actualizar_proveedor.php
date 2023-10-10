<?php
$conexion = new mysqli("localhost", "root", "", "sistema");

$id = $_POST["id"];
$nombre = mysqli_real_escape_string($conexion, $_POST["nombre"]);
$direccion = mysqli_real_escape_string($conexion, $_POST["direccion"]);
$telefono = mysqli_real_escape_string($conexion, $_POST["telefono"]);

if ($nombre && $direccion && $telefono  && $id != "") {
    $update_query = "UPDATE proveedores SET nombre='$nombre', direccion='$direccion', contacto='$telefono' WHERE id='$id'";
    
    if ($conexion->query($update_query)) {
        echo 'Registro actualizado exitosamente.';
    } else {
        echo 'Error al actualizar el registro: ' . $conexion->error;
    }

    $conexion->close();
   
}
?>
