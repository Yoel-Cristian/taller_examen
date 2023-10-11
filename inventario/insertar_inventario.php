<?php


$conexion = new mysqli("localhost", "root", "", "sistema");

$id_p = mysqli_real_escape_string($conexion, $_POST["id_producto"]);
$rut_tienda = mysqli_real_escape_string($conexion, $_POST["rut_tienda"]);
$stock = mysqli_real_escape_string($conexion, $_POST["stock"]);
$fecha = mysqli_real_escape_string($conexion, $_POST["fecha"]);



    $sql = "INSERT INTO inventario(id_producto	,id_ubi,	nivex,	ultac	
    ) VALUES ('$id_p', '$rut_tienda', '$stock', '$fecha')";

    $conexion->query($sql);
    $conexion->close();

    $conexion->close();
    exit;




?>

