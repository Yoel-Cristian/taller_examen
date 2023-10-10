<?php
$conexion = new mysqli("localhost", "root", "", "sistema");

$nombre = mysqli_real_escape_string($conexion, $_POST["nombre"]);
$email = mysqli_real_escape_string($conexion, $_POST["email"]);
$contrasena = mysqli_real_escape_string($conexion, $_POST["contrasena"]);

$contrasena_cifrada = md5($contrasena);




$sql ="INSERT INTO `usuarios` (`id`, `nombre`, `email`, `contrasena`) VALUES (NULL, '$nombre', '$email', '$contrasena_cifrada')";




    $conexion->query($sql);

    header("Location: login.html");
    $conexion->close();
    exit;
