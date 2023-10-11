<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="http://localhost/sistema/css/formulario.css" />
</head>

<body>
  <nav>
    <ul>
      <li onclick="mostrar_formulario('insertar')">Añadir</li>
      <li onclick="cargarNuevaPagina('mostrar_inventario.php')">Mostrar inventarios</li>
      <li onclick="mostrar_formulario('actualizar')">Actualizar</li>
      <li onclick="mostrar_formulario('eliminar')">Eliminar</li> 
    </ul>
  </nav>

  <!-- formulario para registrar inventario -->
  <div id="insertar" class="Formulario">
    <h1>Registrar inventarios</h1>
    <form id="1">



      <label for="id_producto">Seleccionar Producto:</label>
        <select id="id_producto" name="id_producto" class="select">
          <option selected disabled class="option-default">
            [id] -
            [nombre] -
            [precio] 

          </option>
          <?php
          $conexion = new mysqli("localhost", "root", "", "sistema");
          $consulta = "SELECT id,
          nombre,
          precio FROM productos";
          $resultado = $conexion->query($consulta);

          while ($fila = $resultado->fetch_assoc()) {
            $id = $fila['id'];
            $nombre = $fila['nombre'];
            $precio = $fila['precio'];

            echo "<option value='$id'>[$id] - [$nombre] - [$precio] </option>";
          }
          $conexion->close();
          ?>
        </select><br /><br />

        <label for="rut_tienda">direccion Tienda:</label>
      <select id="rut_tienda" name="rut_tienda">
        <option selected disabled class="option-default">
          [id] - [nombre] - [direccion] 
        </option>
        <?php
        $conexion = new mysqli("localhost", "root", "", "sistema");
        $consulta = "SELECT id, nombre, direccion FROM tiendas";
        $resultado = $conexion->query($consulta);

        while ($fila = $resultado->fetch_assoc()) {
          $rut = $fila['id'];
          $nombre = $fila['nombre'];
          $direccion = $fila['direccion'];
          echo "<option value='$rut'>[$rut] - [$nombre] - [$direccion] </option>";

        }
        $conexion->close();
        ?>
      </select><br /><br />


        <label for="stock">Stock:</label>
      <input type="number" name="stock" id="stock" min="0" /><br />

      <label for="fecha">Fecha:</label>
      <input type="date" id="fecha" name="fecha" /><br /><br />

      <input type="submit" id="miBoton" value="Agregar Lista de Productos" />
    </form>

</div>






  <!-- formulario para actualizar -->
  <div id="actualizar" class="Formulario">
    <h2>Actualizar Informacion de inventario</h2>
    <form id="2">


      <label for="id_inventario">Seleccionar inventario:</label>
      <select id="id_inventario1" name="id_inventario" class="select">
        <option selected disabled class="option-default">
          [ID] - [ID_producto] - [ID_tienda] 
        <?php
        $conexion = new mysqli("localhost", "root", "", "sistema");
        $consulta = "SELECT id, id_producto, id_ubi FROM inventarios";
        $resultado = $conexion->query($consulta);

        while ($fila = $resultado->fetch_assoc()) {
          $id_inventario = $fila["id"];
          $id_p = $fila["id_producto"];
          $id_ = $fila["id_ubi"];
          echo "<option value='$id_inventario'> [$id_inventario] - [$fecha_inventario] - [$rut_tienda] - [$descuento] - [$monto_final] </option>";
        }
        $conexion->close();
        ?>
      </select><br /><br />

      <label for="fecha">Fecha:</label>
      <input type="date" id="fecha1" name="fecha" /><br /><br />

      <label for="id_tienda">Seleccionar tienda:</label>
      <select id="rut_tienda1" name="id_tienda" class="select">
        <option selected disabled class="option-default">
          [rut] - [nombre] - [direccion] - [telefono]
        </option>
        <?php
        $conexion = new mysqli("localhost", "root", "", "sistema");
        $consulta = "SELECT rut, nombre, direccion, telefono FROM tiendas";
        $resultado = $conexion->query($consulta);

        while ($fila = $resultado->fetch_assoc()) {
          $rut = $fila['rut'];
          $nombre = $fila['nombre'];
          $direccion = $fila['direccion'];
          $telefono = $fila['telefono'];

          echo "<option value='$rut'>[$rut] - [$nombre] - [$direccion] - [$telefono]</option>";
        }
        $conexion->close();
        ?>
      </select><br /><br />
      <label for="descuento">Descuento (%):</label>
      <input type="number" id="descuento1" name="descuento" step="0.01" /><br /><br />

    
      <input type="submit" value="Guardar" />
    </form>
  </div>



  <!-- formulario para borrar -->
  <div id="eliminar" class="Formulario">
    <h2>eliminar inventario</h2>

    <form id="3">
      <label for="id_inventario2">Seleccionar inventario:</label>
      <select id="id_inventario2" name="id_inventario" class="select">
        <option selected disabled class="option-default">
          [ID] - [Fecha] - [tienda] - [Descuento] - [Monto Final]
        </option>
        <?php
        $conexion = new mysqli("localhost", "root", "", "sistema");
        $consulta = "SELECT id, fecha, rut_tienda, descuento, monto_final FROM inventarios";
        $resultado = $conexion->query($consulta);

        while ($fila = $resultado->fetch_assoc()) {
          $id_inventario = $fila["id"];
          $fecha_inventario = $fila["fecha"];
          $rut_tienda = $fila["rut_tienda"];
          $descuento = $fila["descuento"];
          $monto_final = $fila["monto_final"];

          echo "<option value='$id_inventario'> [$id_inventario] - [$fecha_inventario] - [$rut_tienda] - [$descuento] - [$monto_final] </option>";
        }
        $conexion->close();
        ?>
      </select><br /><br />
      <button type="submit">Enviar</button>
    </form>
  </div>

  <!-- inventariona -->
  <div id="popup" class="popup">
    <div class="popup-content">
      <p> Tarea realizada correctamente</p>
    </div>
  </div>

  <iframe id="miFrame" src="" style="display: none; width: 100%"></iframe>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../css/detalle_inventarios.js"></script>
  <script src="opcion.js"></script>
  <script>
       
 

     $(document).ready(function() {
      $("#1").submit(function(event) {
        event.preventDefault();
        document.getElementById("miBoton").style.display = "none";
        var fecha = $("#fecha").val();
        var rut_tienda = $("#rut_tienda").val();
        var descuento = $("#descuento").val();
        var monto_final = $("#monto_final").val();

        var datos = {
          fecha: fecha,
          rut_tienda: rut_tienda,
          descuento: descuento,
          monto_final: monto_final
        };

        $.ajax({
          type: "POST",
          url: "insertar_inventario.php", // Actualiza la URL según tu archivo PHP
          data: datos,
          success: function(response) {
           
          },
        });
        cargarNuevaPagina("../inventario_detalle copy/interfaz_detalle.php");
      });
    });


    $(document).ready(function() {
      $("#2").submit(function(event) {
        var id_ve = $("#id_inventario1").val();
        var fecha = $("#fecha1").val();
        var id_c = $("#rut_tienda1").val();
        var descuento = $("#descuento1").val();
        var monto = $("#monto_final1").val();

        // Crea un objeto de datos
        var datos = {
          id: id_ve,
          fecha: fecha,
          rut_tienda: id_c,
          descuento: descuento,
          monto_final: monto

        };

        console.log(datos);
        $.ajax({
          type: "POST",
          url: "actualizar_inventario.php",
          data: datos,
          success: function(response) {
            // Muestra la inventariona emergente
            $("#popup").fadeIn();
            // Cierra la inventariona emergente
            setTimeout(function() {
              $("#popup").fadeOut();
            }, 2000);
            $("#2")[0].reset();
          },
        });
      });
    });
    

    $(document).ready(function() {
      $("#3").submit(function(event) {
        var id = $("#id_inventario2").val();
        var datos = {
          id_delete: id
        }; // Debe ser un objeto con una clave "id"


        $.ajax({
          type: "POST",
          url: "delete_inventario.php",
          data: datos,
          success: function(response) {
            // Muestra la inventariona emergente
            $("#popup").fadeIn();
            // Cierra la inventariona emergente 
            setTimeout(function() {
              $("#popup").fadeOut();
            }, 2000);
            $("#3")[0].reset();

          },
        });
      });
    });






  </script>


  </script>



</body>

</html>