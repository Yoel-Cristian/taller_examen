<?php
$conexion = new mysqli("localhost", "root", "", "sistema");

$email = mysqli_real_escape_string($conexion, $_POST["email"]);
$contrasena = mysqli_real_escape_string($conexion, $_POST["contrasena"]);


$contrasena_cifrada = md5($contrasena);




$verificar = "SELECT * FROM usuarios WHERE email = '$email' and contrasena = '$contrasena_cifrada'";
$result = $conexion->query($verificar);

if ($result->num_rows > 0) {
        header("Location: index1.html");
        $conexion->close();
        exit;

} else {
    echo "<script>alert('Usuario no encontrado');</script>";
    header("Location: login.html");
    $conexion->close();
    exit;
}




$conexion->close();
