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
                <input class="botoness" type="submit" value="Eliminar"  name="eliminar">
            </div>
        </form>
    </div>
</body>
</html>
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
            echo ("los campos son obligatorios");
          }

        else {
            //INSERTAR
            mysqli_query($conn,"INSERT INTO `$proveedor`
            (nombre, producto, telefono, empresa) 
              values 
            ('$nombre','$prod', '$tel','$emp')");
            echo("registro exitoso");
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
            echo "el proveedor no existe";
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
            echo " Los campos son obligatorios";
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
              echo "El proveedor no existe";
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
            $resultados = mysqli_query($conn,"SELECT * FROM `$proveedor` WHERE nombre = '$nombre'");
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
            $_DELETE_SQL =  "DELETE FROM `$proveedor` WHERE nombre = '$nombre'";
            mysqli_query($conn,$_DELETE_SQL);
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