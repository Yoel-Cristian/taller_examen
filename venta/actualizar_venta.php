<?php

$conexion = new mysqli("localhost", "root", "", "sistema");
$id = $_POST["id"];
$fecha = mysqli_real_escape_string($conexion, $_POST["fecha"]);
$rut_cliente = mysqli_real_escape_string($conexion, $_POST["rut_cliente"]);
$descuento = mysqli_real_escape_string($conexion, $_POST["descuento"]);




function total($id_venta, $conexion)
{
    $sql = "SELECT vd.id_producto, vd.cantidad, p.precio 
        FROM detalle_ventas vd 
        INNER JOIN productos p ON vd.id_producto = p.id 
        WHERE vd.id_venta = $id_venta";

    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        $totalVenta = 0;

        // Iterar a través de los resultados y realizar los cálculos
        while ($row = $result->fetch_assoc()) {
            $id_producto = $row["id_producto"];
            $cantidad = $row["cantidad"];
            $precio = $row["precio"];

            // Calcular el subtotal para este producto
            $subtotal = $cantidad * $precio;

            // Agregar el subtotal al total de la venta
            $totalVenta += $subtotal;

            // Puedes realizar otras acciones aquí, como mostrar los resultados o guardarlos en una estructura de datos
            echo "ID Producto: $id_producto, Cantidad: $cantidad, Precio: $precio, Subtotal: $subtotal<br>";
            $updateSql = "UPDATE detalle_ventas 
                      SET subtotal = $subtotal 
                      WHERE id_producto = $id_producto AND id_venta = $id_venta";
            $conexion->query($updateSql);
        }

        // Mostrar el total de la venta
        echo "Total de la venta: $totalVenta";
    } else {
        echo "No se encontraron detalles de venta para el ID de venta $id_venta";
    }

    $sql2 = "SELECT descuento from ventas WHERE id = $id_venta";


    $r = $conexion->query($sql2);
    $fila = $r->fetch_assoc();
    $descuento = $fila['descuento'];
    $descuento = $descuento / 100;
    $des = 1 - $descuento;
    $totalVenta = $totalVenta * $des;


    $sql3 = "UPDATE ventas SET monto_final = $totalVenta WHERE id = $id_venta";

    $conexion->query($sql3);
    $conexion->close();
}


$update_query = "UPDATE ventas SET fecha='$fecha', rut_cliente='$rut_cliente', descuento='$descuento' WHERE id='$id'";

if ($conexion->query($update_query)) {
    echo 'Registro actualizado exitosamente.';
    total($id,$conexion);
} else {
    echo 'Error al actualizar el registro: ' . $conexion->error;
}

$conexion->close();
?>
