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
        <h1>Productos</h1>
        <form method="post" class="formedi">
            <div class="div">
                <input type="div" name="nombre"  id="nombre" placeholder="NOMBRE">
            </div>
            <div class="div">
                <input type="text" name="descr" id="descr" placeholder="DESCRIPCIÓN">
            </div>
            <div class="div">
                <input type="text" name="precio"  id="precio" placeholder="PRECIO">
            </div>
            <div class="div">
                <input type="text" name="cant"  id="cant" placeholder="CANTIDAD">
            </div>
            <div botones>
                <input class="registrar" type="submit" value="Registrar" name="registrar">
                <input class="consultar" type="submit" value="Consultar" name="consultar">
                <input class="actualizar" type="submit" value="Actualizar"name="actualizar">
                <input class="botoness" type="submit" value="Eliminar"  name="eliminar">
            </div>
        </form>
        <a  href="http://localhost/phpmyadmin/index.php?route=/sql&pos=0&db=pizzeria_venecia&table=producto"><button class="db">BASE DE DATOS</button></a>  

    </div>
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
    include("conn.php");
      
      $nombre    ="";
      $descr ="";
      $precio    ="";
      $cant    ="";

      if(isset($_POST['registrar']))
      {      
        $nombre    = $_POST['nombre'];
        $descr = $_POST['descr'];
        $precio    = $_POST['precio'];
        $cant    = $_POST['cant'];

        
        if($nombre=="" || $descr=="" || $precio=="" || $cant=="")
          {
            echo ("los campos son obligatorios");
          }

        else {
            //INSERTAR
            mysqli_query($conexion,"INSERT INTO `$producto`
            (nombre, descripcion, precio, cantidad) 
              values 
            ('$nombre','$descr', '$precio','$cant')");
            echo ("ha sido registrado correctamente");
          }
      }

      if(isset($_POST['consultar']))
      {
        $nombre    = $_POST['nombre'];

        $existe=0;
        if($nombre=="")
          {
            echo "el nombre es un campo obligatorio";
          }

          else {
            //CONSULTAR
            $resultados = mysqli_query($conexion,"SELECT * FROM `$producto` WHERE nombre = '$nombre'");
            while($consulta = mysqli_fetch_array($resultados))
          {
            echo $consulta['nombre']. "<br>";
            echo $consulta['descripcion']. "<br>";
            echo $consulta['precio']. "<br>";
            echo $consulta['cantidad']. "<br>";

            $existe++;
          }
          
          if ($existe==0) {
            echo "el documento no existe";
          }
          
          }
        


      }

      if(isset($_POST['actualizar']))
      {
        $nombre    = $_POST['nombre'];
        $descr = $_POST['descr'];
        $precio    = $_POST['precio'];
        $cant    = $_POST['cant'];

        
        if($nombre=="" || $descr=="" || $precio=="" || $cant=="")
          {
            echo " Los campos son obligatorios";
          }

          else 
          {

            $existe=0;

            //CONSULTAR
            $resultados = mysqli_query($conexion,"SELECT * FROM `$producto` WHERE nombre = '$nombre'");
            while($consulta = mysqli_fetch_array($resultados))
            {
              $existe++;
            }
          
            if ($existe==0) 
            {
              echo "El usuario no existe";
            }

            else {
              //ACTUALIZAR 
              $_UPDATE_SQL="UPDATE `$producto` Set 
              nombre='$nombre', 
              descripcion='$descr',
              precio='$precio',
              cantidad='$cant'


              WHERE nombre='$nombre'"; 

              mysqli_query($conexion,$_UPDATE_SQL);
              echo "Actualización Con Éxito";
            }
            
          }
      }

      if(isset($_POST['eliminar']))
      {
        $nombre    = $_POST['nombre'];
        $existe=0;
        if($nombre=="")
          {
            echo "el documento es un campo obligatorio";
          }

          else {
            //CONSULTAR
            $resultados = mysqli_query($conexion,"SELECT * FROM `$producto` WHERE nombre = '$nombre'");
            while($consulta = mysqli_fetch_array($resultados))
          {
            $existe++;
          }
          
          if ($existe==0) 
          {
            echo "el documento no existe";
          }

          else {
            //ELIMINAR
            $_DELETE_SQL =  "DELETE FROM `$producto` WHERE nombre = '$nombre'";
            mysqli_query($conexion,$_DELETE_SQL);
            echo "Eliminación Con Éxito";
          }
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