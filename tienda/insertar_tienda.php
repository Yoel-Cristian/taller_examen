<?php


$conexion = new mysqli("localhost", "root", "", "sistema");

$nombre = mysqli_real_escape_string($conexion, $_POST["nombre"]);
$direccion = mysqli_real_escape_string($conexion, $_POST["direccion"]);

if ($nombre and $direccion  != "") {

    $sql = "INSERT INTO tiendas(nombre,	direccion) VALUES ('$nombre', '$direccion')";

    $conexion->query($sql);
    $conexion->close();

} else {
    // echo '<script>alert("No se han introducido todos los datos");</script>';
    // header("Location: interfaz.html");
    exit;
}
