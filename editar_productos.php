<html>
<head>
  <title>Programando Ando</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  <link rel="stylesheet" href="styles.css">

  <!-- Optional theme -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous"> -->

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>




<body class="body-edi">


<div class="row">
  <div class="col-md-4"></div>

<!-- INICIA LA COLUMNA -->


  <div class="col-md-4">

  <header class="header2edi">
			<div class="regresar-edi">
				<a href="admin (1).html"><img src="REGRESAR.png" alt="REGRESAR"></a>
			</div>
		</header>


    <center><h1>PRODUCTOS</h1></center>

    <form method="POST" action="editar_productos.php" >

    <div class="form-group">
      <label for="nombre">Nombre</label>
      <input type="text" name="nombre" class="form-control" id="nombre">
    </div>

    <div class="form-group">
        <label for="descr">descrripción</label>
        <input type="text" name="descr" class="form-control" id="descr" >
    </div>

    <div class="form-group">
        <label for="precio">Precio </label>
        <input type="text" name="precio" class="form-control" id="precio">
    </div>
    <div class="form-group">
        <label for="cant">Cantidad </label>
        <input type="text" name="cant" class="form-control" id="cant">
    </div>

    
    <center>
      <input type="submit" value="Registrar" class="btn btn-success" name="registrar">
      <input type="submit" value="Consultar" class="btn btn-primary" name="consultar">
      <input type="submit" value="Actualizar" class="btn btn-info" name="actualizar">
      <input type="submit" value="Eliminar" class="btn btn-danger" name="eliminar">
    </center>

  </form>

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