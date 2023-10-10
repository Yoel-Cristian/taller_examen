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
      <li onclick="mostrar_formulario('producto_insertar')">Añadir</li>
      <li onclick="cargarNuevaPagina('mostrar_producto.php')">Mostrar</li>
      <li onclick="mostrar_formulario('producto_actualizar')">Actualizar</li>
      <li onclick="mostrar_formulario('producto_delete')">Eliminar</li>
    </ul>
  </nav>




  <!-- formulario para insertar prodcutos -->
  <div class="Formulario" id="producto_insertar">
    <h2>Formulario Informacion de Producto</h2>
    <form class="miFormulario" id="1">

      <label for="nombre">Nombre:</label>
      <input type="text" name="nombre" id="nombre" /><br />

      <label for="descripcion">descripcion:</label>
      <textarea name="descripcion" id="descripcion"></textarea> <br> <br>

      <label for="id_categoria">Seleccionar Categoría:</label>
      <select id="id_categoria" name="id_categoria" class="select">
        <option selected disabled class="option-default">
          [id] - [nombre] - [descripcion]
        </option>
        <?php
        $conexion = new mysqli("localhost", "root", "", "sistema");
        $consulta = "SELECT id, nombre, descripcion FROM categorias";
        $resultado = $conexion->query($consulta);

        while ($fila = $resultado->fetch_assoc()) {
          $id_categoria = $fila["id"];
          $nombre_categoria = $fila["nombre"];
          $descripcion_categoria = $fila["descripcion"];
          echo "<option value='$id_categoria'> [$id_categoria] - [$nombre_categoria] - [$descripcion_categoria] </option>";
        }
        $conexion->close();
        ?>
      </select><br /><br />

      <label for="precio">Precio ($):</label>
      <input type="number" step="0.01" name="precio" id="precio" /><br />


      <label for="rut_proveedor">ID Proveedor:</label>
      <select id="rut_proveedor" name="rut_proveedor" class="select">
        <option selected disabled class="option-default">
          [ID] - [nombre] - [direccion] - [contacto]
        </option>
        <?php
        $conexion = new mysqli("localhost", "root", "", "sistema");
        $consulta = "SELECT id,	nombre,	direccion,	contacto
                        FROM proveedores";
        $resultado = $conexion->query($consulta);

        while ($fila = $resultado->fetch_assoc()) {
          $rut = $fila["id"];
          $nombre = $fila["nombre"];
          $direccion = $fila["direccion"];
          $telefono = $fila["contacto"];

          echo "<option value='$rut'> [$rut] - [$nombre] - [$direccion] - [$telefono] </option>";
        }
        $conexion->close();
        ?>
      </select><br /><br />


      <label for="stock">Stock:</label>
      <input type="number" name="stock" id="stock" min="0" /><br />

      <label for="imagen">Imagen:</label>
      <input type="file" name="imagen" id="imagen" accept="image/*" /><br /><br />

      <button type="submit">Enviar</button>
    </form>
  </div>


















  <!-- Formulario para actualizar datos de los productos -->
  <div class="Formulario" id="producto_actualizar">
    <h2>Modificar Datos De Producto</h2>
    <form class="miFormulario" id="2">
      <label for="id_producto">Seleccionar Producto a Actualizar:</label>
      <select id="id_producto1" name="id_producto" class="select">
        <option selected disabled class="option-default">
          [id] - [nombre] - [precio]
        </option>
        <?php
        $conexion = new mysqli("localhost", "root", "", "sistema");
        $consulta = "SELECT id, nombre, precio FROM productos";
        $resultado = $conexion->query($consulta);

        while ($fila = $resultado->fetch_assoc()) {
          $id_producto = $fila["id"];
          $nombre_producto = $fila["nombre"];
          $precio_producto = $fila["precio"];
          $stock_producto = $fila["stock"];
          echo "<option value='$id_producto'> [$id_producto] - [$nombre_producto] - [$precio_producto] </option>";
        }
        $conexion->close();
        ?>
      </select><br /><br />


      <label for="nombre">Nombre:</label>
      <input type="text" name="nombre" id="nombre1" /><br />

      <label for="descripcion">descripcion:</label>
      <textarea name="descripcion" id="descripcion"></textarea> <br> <br>

      <label for="precio">Precio ($):</label>
      <input type="number" step="0.01" name="precio" id="precio1" /><br />

      <label for="stock">Stock:</label>
      <input type="number" name="stock" id="stock1" min="0" /><br />

      <label for="rut_proveedor">ID Proveedor:</label>
      <select id="rut_proveedor1" name="rut_proveedor" class="select">

        <option selected disabled class="option-default">
          [ID] - [nombre] - [direccion] - [contacto]
        </option>
        <?php
        $conexion = new mysqli("localhost", "root", "", "sistema");
        $consulta = "SELECT id,	nombre,	direccion,	contacto
                        FROM proveedores";
        $resultado = $conexion->query($consulta);

        while ($fila = $resultado->fetch_assoc()) {
          $rut = $fila["id"];
          $nombre = $fila["nombre"];
          $direccion = $fila["direccion"];
          $telefono = $fila["contacto"];

          echo "<option value='$rut'> [$rut] - [$nombre] - [$direccion] - [$telefono] </option>";
        }
        $conexion->close();
        ?>

      </select><br /><br />

      <label for="id_categoria1">Seleccionar Categoría:</label>
      <select id="id_categoria1" name="id_categoria" class="select">
        <option selected disabled class="option-default">
          [id] - [nombre] - [descripcion]
        </option>
        <?php
        $conexion = new mysqli("localhost", "root", "", "sistema");
        $consulta = "SELECT id, nombre, descripcion FROM categorias";
        $resultado = $conexion->query($consulta);

        while ($fila = $resultado->fetch_assoc()) {
          $id_categoria = $fila["id"];
          $nombre_categoria = $fila["nombre"];
          $descripcion_categoria = $fila["descripcion"];
          echo "<option value='$id_categoria'> [$id_categoria] - [$nombre_categoria] - [$descripcion_categoria] </option>";
        }
        $conexion->close();
        ?>
      </select><br /><br />
      <label for="imagen">Imagen:</label>
      <input type="file" name="imagen" id="imagen" accept="image/*" /><br />

      <button type="submit">Enviar</button>
    </form>
  </div>




  <!-- Formulario para eliminar producto -->
  <div id="producto_delete" class="Formulario">
    <h2>Formulario Eliminar Datos</h2>

    <form id="3" class="miFormulario">
      <label for="id_producto2">Seleccionar Producto a Eliminar:</label>
      <select id="id_producto2" name="id_producto" class="select">
        <option selected disabled class="option-default">
          [id] - [nombre] - [precio]
        </option>
        <?php
        $conexion = new mysqli("localhost", "root", "", "sistema");
        $consulta = "SELECT id, nombre, precio FROM productos";
        $resultado = $conexion->query($consulta);

        while ($fila = $resultado->fetch_assoc()) {
          $id_producto = $fila["id"];
          $nombre_producto = $fila["nombre"];
          $precio_producto = $fila["precio"];
          echo "<option value='$id_producto'> [$id_producto] - [$nombre_producto] - [$precio_producto] </option>";
        }
        $conexion->close();
        ?>
      </select><br /><br />
      <button type="submit">Enviar</button>
    </form>
  </div>

  <div id="popup" class="popup">
    <div class="popup-content">
      <p> Tarea realizada correctamente</p>
    </div>
  </div>

  <!-- Frmae -->
  <iframe id="miFrame" src="" style="display: none; width: 100%"></iframe>


  <!-- scripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../css/opcion.js"> </script>
  <script>
    $(document).ready(function() {
      $("#1").submit(function(event) {
        event.preventDefault();
        var formData = new FormData(this);
        $.ajax({
          type: "POST",
          url: "insertar_producto.php",
          data: formData,

          processData: false, // Evitar el procesamiento automático de datos
          contentType: false, // Evitar el encabezado Content-Type por defecto
          success: function(response) {
            console.log(formData);
            // Manejar la respuesta del servidor aquí
            console.log(response);
            // Limpia el formulario si es necesario
            $("#popup").fadeIn();
            // Cierra la ventana emergente 
            setTimeout(function() {
              $("#popup").fadeOut();
            }, 2000);
            $("#1")[0].reset();
          },
          error: function(xhr, status, error) {
            // Manejar errores si es necesario
            console.error(error);
          }
        });

      });
    });

    $(document).ready(function() {
      $("#2").submit(function(event) {
        var formData = new FormData(this);


        $.ajax({
          type: "POST",
          url: "actualizar_producto.php",
          data: formData,
          processData: false, // Evitar el procesamiento automático de datos
          contentType: false, // Evitar el encabezado Content-Type por defecto
          success: function(response) {
            window.location.href = 'interfaz_producto.php';
            window.open("interfaz_producto.php", "_self");

            console.log(response);
            $("#popup").fadeIn();
            setTimeout(function() {
              $("#popup").fadeOut();
            }, 2000);
            $("#2")[0].reset();
          },
          error: function(xhr, status, error) {
            // Manejar errores si es necesario
            console.error(error);
          }
        });





      });
    });


    $(document).ready(function() {
      $("#3").submit(function(event) {
        var id = $("#id_producto2").val();
        var datos = {
          id: id
        }; // Debe ser un objeto con una clave "id"


        $.ajax({
          type: "POST",
          url: "producto_delete.php",
          data: datos,
          success: function(response) {
            // Muestra la ventana emergente
            $("#popup").fadeIn();
            // Cierra la ventana emergente 
            setTimeout(function() {
              $("#popup").fadeOut();
            }, 2000);
            $("#3")[0].reset();

          },
        });
      });
    });
  </script>



</body>

</html>