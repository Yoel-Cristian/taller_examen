<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="http://localhost/sistema_2/css/formulario.css" />
</head>

<body>
  <nav>
    <ul>
      <li onclick="mostrar_formulario('tienda_insertar')">Añadir</li>
      <li onclick="terminar()">Mostrar</li>
      <li onclick="mostrar_formulario('tienda_actualizar')">Actualizar</li>
      <li onclick="mostrar_formulario('tienda_delete')">Eliminar</li>
    </ul>
  </nav>


  <!-- formulario para tiendas -->
  <div id="tienda_insertar" class="Formulario">
    <h2>Formulario Informacion de tienda</h2>
    <form class="miFormulario" id="1">
      <label for="nombre">Nombre:</label>
      <input type="text" name="nombre" id="nombre" /><br />

      <label for="direccion">Dirección:</label>
      <input type="text" name="direccion" id="direccion" /><br />


      <button type="submit">Enviar</button>
    </form>
  </div>




  <!-- formulario pra actualizar tiendas -->
  <div id="tienda_actualizar" class="Formulario">
    <h2> Actualizar Datos De tiendas</h2>
    <form class="miFormulario" id="2">
      <label for="id_tienda">Seleccionar tienda:</label>
      <select id="id_tienda1" name="id_tienda" class="select">
        <option selected disabled class="option-default">
          [rut] - [nombre] - [direccion]
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

      <label for="nombre">Nombre:</label>
      <input type="text" name="nombre_a" id="nombre1" /><br />

      <label for="direccion">Dirección:</label>
      <input type="text" name="direccion_a" id="direccion1" /><br />

      <button type="submit">Enviar</button>
    </form>
  </div>



  <!-- formulario para eliminar tiendas -->
  <div id="tienda_delete" class="Formulario">
    <h2> Eliminar tiendas</h2>

    <form class="miFormulario" id="4">
      <label for="id_tienda">Seleccionar tienda:</label>
      <select id="id_tienda2" name="id_tienda" class="select">
        <option selected disabled class="option-default">
          [rut] - [nombre] - [direccion] 
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

      <button type="submit">Enviar</button>
    </form>
  </div>


  <div id="popup" class="popup">
  <div class="popup-content">
        <p> Tarea ejecutada con éxito  <span class="emoji">&#128578;</span></p>
    </div>
  </div>

  <iframe id="miFrame" src="" style="display: none; width: 100%"></iframe>
  <script src="../css/opcion.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>

function cargarNuevaPagina(r) {


var elementos = document.querySelectorAll(".Formulario");

// Oculta todos los divs
elementos.forEach(function (elemento) {
  elemento.style.display = "none";
});



var iframe = document.getElementById("miFrame");
iframe.src = r;
iframe.style.display = "block";
}



function terminar(){
  cargarNuevaPagina('mostrar_tienda.php');

}

    $(document).ready(function() {
      $("#1").submit(function(event) {
        event.preventDefault();
        var nombre = $("#nombre").val();
        var direccion = $("#direccion").val();

        // Crea un objeto de datos
        var datos = {
          nombre: nombre,
          direccion: direccion        };

          console.log(datos);
        $.ajax({
          type: "POST",
          url: "insertar_tienda.php",
          data: datos,
          success: function(response) {
            // Muestra la ventana emergente
            $("#popup").fadeIn();
            // Cierra la ventana emergente 
            setTimeout(function() {
              $("#popup").fadeOut();
            }, 2000);
            $("#1")[0].reset();


          },
        });

      });
    });

    $(document).ready(function() {
      $("#2").submit(function(event) {
        event.preventDefault();

        var id = $("#id_tienda1").val();
        var nombre = $("#nombre1").val();
        var direccion = $("#direccion1").val();

        // Crea un objeto de datos
        var datos = {
          id: id,
          nombre: nombre,
          direccion: direccion,
          telefono: telefono
        };
        console.log(datos);
        $.ajax({
          type: "POST",
          url: "actualizar_tienda.php",
          data: datos,
          success: function(response) {
            // Muestra la ventana emergente
            $("#popup").fadeIn();
            // Cierra la ventana emergente 
            setTimeout(function() {
              $("#popup").fadeOut();
            }, 2000);
            $("#2")[0].reset();

          },
        });
      });
    });


    $(document).ready(function() {
      $("#4").submit(function(event) {
        var id = $("#id_tienda2").val();
        var datos = {
          id: id
        }; 
        $.ajax({
          type: "POST",
          url: "tienda_delete.php",
          data: datos,
          success: function(response) {
            // Muestra la ventana emergente
            $("#popup").fadeIn();
            // Cierra la ventana emergente 
            setTimeout(function() {
              $("#popup").fadeOut();
            }, 2000);
            $("#4")[0].reset();

          },
        });
      });
    });
  </script>
</body>

</html>