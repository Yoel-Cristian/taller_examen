<?php
require("../conexion_base.php");
$id_producto = $_POST["id_producto"];
$nombre1 = mysqli_real_escape_string($conexion, $_POST["nombre"]);
$desc =       mysqli_real_escape_string($conexion, $_POST["descripcion"]);
$precio = mysqli_real_escape_string($conexion, $_POST["precio"]);
$rut_proveedor = mysqli_real_escape_string($conexion, $_POST["rut_proveedor"]);
$id_categoria = mysqli_real_escape_string($conexion,  $_POST["id_categoria"]);


$imagen = '';
$imagen = '';
$file = $_FILES["imagen"];
$nombre = $file["name"];
$tipo = $file["type"];
$ruta_provisional = $file["tmp_name"];
$size = $file["size"];
$dimensiones = getimagesize($ruta_provisional);
$width = $dimensiones[0];
$height = $dimensiones[1];
$carpeta = "../fotos/";
$src = $carpeta . $nombre;
move_uploaded_file($ruta_provisional, $src);
$imagen = "../fotos/" . $nombre;



$update_query = "UPDATE productos SET nombre='$nombre1',descripcion='$desc', precio='$precio', id_proveedor='$rut_proveedor' , id_categoria='$id_categoria' , imagen='$imagen' WHERE id='$id_producto'";

if ($conexion->query($update_query)) {
	echo 'Registro actualizado exitosamente.';
} else {
	echo 'Error al actualizar el registro: ' . $conexion->error;
}

header("Location: mostrar_producto.php");


$conexion->close();
