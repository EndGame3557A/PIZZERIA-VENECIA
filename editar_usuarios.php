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
        <h1>Usuarios</h1>
        <form method="post" class="formedi">
            <div class="div">
                <input type="div" name="name"  id="name" placeholder="NOMBRE">
            </div>
            <div class="div">
                <input type="text" name="user" id="user" placeholder="USUARIO">
            </div>
            <div class="div">
                <input type="text" name="pass"  id="pass" placeholder="CONTRASEÑA">
            </div>
            <div class="botones">
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
    include("conexion.php");
      
      $name    ="";
      $user ="";
      $pass    ="";

      if(isset($_POST['registrar']))
      {      
        $name    = $_POST['name'];
        $user = $_POST['user'];
        $pass    = $_POST['pass'];
        
        if($name=="" || $user=="" || $pass=="")
          {
            echo " los campos son obligatorios";
          }

          else {
            //INSERTAR
            mysqli_query($conn, "INSERT INTO $tabla_db1 
            (nombre_completo, usuario, contraseña) 
              values 
            ('$name','$user', '$pass')");
            echo("Se registro éxitosamente");
          }
      }

      if(isset($_POST['consultar']))
      {
        $user    = $_POST['user'];
        $pass    = $_POST['pass'];

        $existe=0;
        if($pass=="")
          {
            echo "la contraseña es un campo obligatorio";
          }

          else {
            //CONSULTAR
            $resultados = mysqli_query($conn,"SELECT * FROM $tabla_db1 WHERE contraseña = '$pass'");
            while($consulta = mysqli_fetch_array($resultados))
          {
            echo $consulta['nombre_completo']. "<br>";
            echo $consulta['usuario']. "<br>";
            echo $consulta['contraseña']. "<br>";
            $existe++;
          }
          
          if ($existe==0) {
            echo "el documento no existe";
          }
          
          }
        


      }

      if(isset($_POST['actualizar']))
      {
        $name    = $_POST['name'];
        $user = $_POST['user'];
        $pass    = $_POST['pass'];
        
        if($name=="" || $user=="" || $pass=="")
          {
            echo " Los campos son obligatorios";
          }

          else 
          {

            $existe=0;

            //CONSULTAR
            $resultados = mysqli_query($conn,"SELECT * FROM $tabla_db1 WHERE contraseña = '$pass'");
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
              $_UPDATE_SQL="UPDATE $tabla_db1 Set 
              nombre_completo='$name', 
              usuario='$user',
              contraseña='$pass'

              WHERE contraseña='$pass'"; 

              mysqli_query($conn,$_UPDATE_SQL);
              echo "Actualización Con Éxito";
            }
            
          }
      }

      if(isset($_POST['eliminar']))
      {
        $user    = $_POST['user'];
        $pass    = $_POST['pass'];
        $existe=0;
        if($user=="" || $pass=="")
          {
            echo "el documento es un campo obligatorio";
          }

          else {
            //CONSULTAR
            $resultados = mysqli_query($conn,"SELECT * FROM $tabla_db1 WHERE contraseña = '$pass'");
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
            $_DELETE_SQL =  "DELETE FROM $tabla_db1 WHERE contraseña = '$pass'";
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