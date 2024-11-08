<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Productos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="formulario">
        <h1>Proveedores</h1>
        <form method="post" class="formedi">
            <div class="div">
                <input type="text" name="nombre"  id="nombre" placeholder="NOMBRE">
            </div>
            <div class="div">
                <input type="text" name="prod" id="prod" placeholder="PRODUCTO">
            </div>
            <div class="div">
                <input type="text" name="tel"  id="tel" placeholder="TELÉFONO">
            </div>
            <div class="div">
                <input type="text" name="emp"  id="emp" placeholder="EMPRESA">
            </div>
            <div botones>
                <input class="registrar" type="submit" value="Registrar" name="registrar">
                <input class="consultar" type="submit" value="Consultar" name="consultar">
                <input class="actualizar" type="submit" value="Actualizar"name="actualizar">
                <button class="botoness" type="button" onclick="openDeleteForm()">Eliminar</button>
            </div>
        </form>
        <a  href="http://localhost/phpmyadmin/index.php?route=/sql&pos=0&db=pizzeria_venecia&table=proveedor"><button class="db">BASE DE DATOS</button></a>  

    </div>




    <style>/* Estilos generales para el formulario */



.db{
    width: 50%;
    height: 30px;
    border: 1px solid;
    background-color:rgb(116, 255, 250);
    border-radius: 25px;
    font-size: 18px;
    cursor: pointer;
    color: rgb(0, 0, 0);
    outline: none;
    margin-top: 10px;
    margin-bottom: 10px;
    margin-left: 87px;
    justify-content: center;
    align-items: center;
}
.db:hover{
    background-color: rgb(0, 255, 247);

}



#deleteForm {
  background-color: grey;
  color: white; /* Color de fondo suave */
    border-radius: 8px; /* Bordes redondeados */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Sombra sutil */
    padding: 20px; /* Espaciado interno */
    max-width: 400px; /* Ancho máximo */
    margin: 50px auto; /* Centrar el formulario */
    font-family: Arial, sans-serif; /* Fuente agradable */
    position: relative; /* Posición relativa para aplicar z-index */
    z-index: 1000; /* Asegura que esté por encima de otros elementos */
}

/* Estilo para las etiquetas */
.label {
    display: block; /* Hacer que las etiquetas ocupen toda la línea */
    margin-bottom: 10px; /* Espaciado debajo de las etiquetas */
    color: #white; /* Color del texto */
    font-weight: bold; /* Negrita */
}

/* Estilo para los campos de entrada */
.text {
    width: 100%; /* Ancho completo */
    padding: 10px; /* Espaciado interno */
    border: 1px solid #ccc; /* Borde suave */
    border-radius: 4px; /* Bordes redondeados */
    margin-bottom: 20px; /* Espaciado debajo de los campos */
    transition: border-color 0.3s; /* Transición suave para el borde */
}

/* Cambiar el color del borde al enfocarse */
.text:focus {
    border-color: #007BFF; /* Color de borde al enfocar */
    outline: none; /* Sin contorno */
}

/* Estilo para el botón de enviar */
.submit {
    background-color: #007BFF; /* Color de fondo */
    color: white; /* Color del texto */
    border: none; /* Sin borde */
    padding: 10px 15px; /* Espaciado interno */
    border-radius: 4px; /* Bordes redondeados */
    cursor: pointer; /* Cambiar el cursor al pasar el mouse */
    transition: background-color 0.3s; /* Transición suave para el fondo */
}

/* Cambiar el color de fondo al pasar el mouse */
.submit:hover {
    background-color: #0056b3; /* Color más oscuro al pasar el mouse */
}

/* Estilo para el botón de cancelar */
.button {
    background-color: #f44336; /* Color de fondo rojo */
    color: white; /* Color del texto */
    border: none; /* Sin borde */
    padding: 10px 15px; /* Espaciado interno */
    border-radius: 4px; /* Bordes redondeados */
    cursor: pointer; /* Cambiar el cursor al pasar el mouse */
    transition: background-color 0.3s; /* Transición suave para el fondo */
}

/* Cambiar el color de fondo al pasar el mouse */
.button:hover {
    background-color: #c62828; /* Color más oscuro al pasar el mouse */
}

/* Estilo para el párrafo de confirmación */
p {
    margin-bottom: 20px; /* Espaciado debajo del párrafo */
    color: white; /* Color del texto */
}</style>

<!-- style="display:none;" -->
<div id="deleteForm" style="display:none;">
    <form method="post" class="formelimi">
        <label class="label" for="deleteId">Ingrese el ID para eliminar:</label>
        <input type="text" class="id" name="id" id="deleteId" required>
        <p>¿Estás seguro de que deseas eliminar este elemento?</p>
        <input type="submit" class="submit" value="Confirmar Eliminación" name="eliminar">
        <button type="button" class="button" onclick="closeDeleteForm()">Cancelar</button>
    </form>
</div>
<script>
    function openDeleteForm() {
        document.getElementById("deleteForm").style.display = "block"; // Muestra el formulario
    }

    function closeDeleteForm() {
        document.getElementById("deleteForm").style.display = "none"; // Oculta el formulario
    }
</script>
</body>
</html>



<style>.db{
    width: 50%;
    height: 30px;
    border: 1px solid;
    background-color:rgb(116, 255, 250);
    border-radius: 25px;
    font-size: 18px;
    cursor: pointer;
    color: rgb(0, 0, 0);
    outline: none;
    margin-top: 10px;
    margin-bottom: 10px;
    margin-left: 87px;
    justify-content: center;
    align-items: center;
}
.db:hover{
    background-color: rgb(0, 255, 247);

}</style>





  <?php
    include("conexion3.php");
      
      $nombre    ="";
      $prod ="";
      $tel    ="";
      $emp    ="";

      if(isset($_POST['registrar']))
      {      
        $nombre    = $_POST['nombre'];
        $prod = $_POST['prod'];
        $tel    = $_POST['tel'];
        $emp    = $_POST['emp'];

        
        if($nombre=="" || $prod=="" || $tel=="" || $emp=="")
          {
            echo "<script> alert('los campos son obligatorios');</script>";          
          }

        else {
            //INSERTAR
            mysqli_query($conn,"INSERT INTO `$proveedor`
            (nombre, producto, telefono, empresa) 
              values 
            ('$nombre','$prod', '$tel','$emp')");
            echo "<script> alert('registro exitoso');</script>";          
          }
      }

      if(isset($_POST['consultar']))
      {
        $nombre    = $_POST['nombre'];


        $existe=0;
        if($nombre=="")
          {
            echo "<script> alert('los campos son obligatorios');</script>";          
          }

          else {
            //CONSULTAR
            $resultados = mysqli_query($conn,"SELECT * FROM `$proveedor` WHERE nombre = '$nombre'");
            while($consulta = mysqli_fetch_array($resultados))
          {
            echo $consulta['nombre']. "<br>";
            echo $consulta['producto']. "<br>";
            echo $consulta['telefono']. "<br>";
            echo $consulta['empresa']. "<br>";

            $existe++;
          }
          
          if ($existe==0) {
            echo "<script> alert('el proveedor no existe');</script>";          
          }
          
          }
        


      }

      if(isset($_POST['actualizar']))
      {
        $nombre    = $_POST['nombre'];
        $prod = $_POST['prod'];
        $tel    = $_POST['tel'];
        $emp    = $_POST['emp'];

        
        if($nombre=="" || $descr=="" || $precio=="" || $cant=="")
          {
            echo "<script> alert('los campos son obligatorios');</script>";          
          }

          else 
          {

            $existe=0;

            //CONSULTAR
            $resultados = mysqli_query($conn,"SELECT * FROM `$proveedor` WHERE nombre = '$nombre'");
            while($consulta = mysqli_fetch_array($resultados))
            {
              $existe++;
            }
          
            if ($existe==0) 
            {
              echo "<script> alert('el proveedor no existe');</script>";          
            }

            else {
              //ACTUALIZAR 
              $_UPDATE_SQL="UPDATE `$proveedor` Set 
              nombre='$nombre', 
              producto='$prod',
              telefono='$tel',
              empresa='$emp'


              WHERE nombre='$nombre'"; 

              mysqli_query($conn,$_UPDATE_SQL);
              echo "<script> alert('actualizacion con exito');</script>";          
            }
            
          }
      }

      if(isset($_POST['eliminar']))
      {
        $id = $_POST['id']; // Obtener el ID del formulario
    $existe=0;

    if($id=="")
    {
      $falli="el ID es un campo obligatorio";
      echo "<script> alert('los campos son obligatorios');</script>";     }
    else {
        // CONSULTAR
        $resultados = mysqli_query($conn,"SELECT * FROM $proveedor WHERE id_proveedor = '$id'"); // Asegúrate de que la columna se llame 'id'
        while($consulta = mysqli_fetch_array($resultados))
        {
            $existe++;
        }

        if ($existe==0)
        {
          $error="no existe";
          echo "<script> alert('no existe');</script>";         }
        else {
            // ELIMINAR
            $_DELETE_SQL =  "DELETE FROM $proveedor WHERE id_proveedor = '$id'"; // Cambia 'contraseña' por 'id'
            mysqli_query($conn,$_DELETE_SQL);
            $elimi="eliminacion con exito";
            echo "<script> alert('eliminacion con exito');</script>";         }
        }
     }

    include("cerrar_conexion.php");
  ?>

  </div>


<!-- TERMINA LA COLUMNA -->



  <div class="col-md-4"></div>
</div>



  
  
</body>
</html>