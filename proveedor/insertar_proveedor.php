<?php


$conexion = new mysqli("localhost", "root", "", "sistema");


$nombre = mysqli_real_escape_string($conexion, $_POST["nombre"]);
$direccion = mysqli_real_escape_string($conexion, $_POST["direccion"]);
$telefono = mysqli_real_escape_string($conexion, $_POST["telefono"]);

    $sql = "INSERT INTO proveedores(nombre,	direccion,	contacto) VALUES ('$nombre', '$direccion', '$telefono')";

    $conexion->query($sql);
    $conexion->close();



?>

