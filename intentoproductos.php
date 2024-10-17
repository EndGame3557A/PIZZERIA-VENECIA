<html>
<head>
  <title>Programando Ando</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>

<div class="row">
  <div class="col-md-4"></div>

<!-- INICIA LA COLUMNA -->


  <div class="col-md-4">

    <center><h1>PRODUCTOS</h1></center>

    <form method="POST" action="intentoproductos.php" >

    <div class="form-group">
      <label for="nam">Nombre</label>
      <input type="text" nam="nam" class="form-control" id="nam">
    </div>

    <div class="form-group">
        <label for="descr">descrripción</label>
        <input type="text" nam="descr" class="form-control" id="descr" >
    </div>

    <div class="form-group">
        <label for="precio">Precio </label>
        <input type="text" nam="precio" class="form-control" id="precio">
    </div>
    <div class="form-group">
        <label for="cant">Cantidad </label>
        <input type="text" nam="cant" class="form-control" id="cant">
    </div>

    
    <center>
      <input type="submit" value="Registrar" class="btn btn-success" nam="registrar">
      <input type="submit" value="Consultar" class="btn btn-primary" nam="consultar">
      <input type="submit" value="Actualizar" class="btn btn-info" nam="actualizar">
      <input type="submit" value="Eliminar" class="btn btn-danger" nam="eliminar">
    </center>

  </form>

  <?php
    include("tupapaelproducto.php");
      
      $nam    ="";
      $descr ="";
      $precio    ="";
      $cant    ="";

      if(isset($_POST['registrar']))
      {      
        $nam    = $_POST['nam'];
        $descr = $_POST['descr'];
        $precio    = $_POST['precio'];
        $cant    = $_POST['cant'];

        
        if($nam=="" || $descr=="" || $precio=="" || $cant=="")
          {
            echo " los campos son obligatorios";
          }

          else {
            //INSERTAR
            mysqli_query($conexion,"INSERT INTO $producto 
            (nombre, descripcion, precio, cantidad) 
              values 
            ('$nam','$descr', '$precio','$cant')");
          }
      }

      if(isset($_POST['consultar']))
      {
        $nam    = $_POST['nam'];

        $existe=0;
        if($nam=="")
          {
            echo "el nombre es un campo obligatorio";
          }

          else {
            //CONSULTAR
            $resultados = mysqli_query($conexion,"SELECT * FROM $producto WHERE nombre = '$nam'");
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
        $nam    = $_POST['nam'];
        $descr = $_POST['descr'];
        $precio    = $_POST['precio'];
        $cant    = $_POST['cant'];

        
        if($nam=="" || $descr=="" || $precio=="" || $cant=="")
          {
            echo " Los campos son obligatorios";
          }

          else 
          {

            $existe=0;

            //CONSULTAR
            $resultados = mysqli_query($conexion,"SELECT * FROM $producto WHERE nombre = '$nam'");
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
              $_UPDATE_SQL="UPDATE $producto Set 
              nombre='$nam', 
              descripcion='$descr',
              precio='$precio',
              cantidad='$cant'


              WHERE nombre='$nam'"; 

              mysqli_query($conexion,$_UPDATE_SQL);
              echo "Actualización Con Éxito";
            }
            
          }
      }

      if(isset($_POST['eliminar']))
      {
        $nam    = $_POST['nam'];
        $existe=0;
        if($nam=="")
          {
            echo "el documento es un campo obligatorio";
          }

          else {
            //CONSULTAR
            $resultados = mysqli_query($conexion,"SELECT * FROM $producto WHERE nombre = '$nam'");
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
            $_DELETE_SQL =  "DELETE FROM $producto WHERE nombre = '$nam'";
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