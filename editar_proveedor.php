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

    <center><h1>PROVEEDORES</h1></center>

    <form method="POST" action="editar_proveedor.php" >

    <div class="form-group">
      <label for="nombre">Nombre</label>
      <input type="text" name="nombre" class="form-control" id="nombre">
    </div>

    <div class="form-group">
        <label for="prod">Producto</label>
        <input type="text" name="prod" class="form-control" id="prod" >
    </div>

    <div class="form-group">
        <label for="tel">Teléfono </label>
        <input type="text" name="tel" class="form-control" id="tel">
    </div>
    <div class="form-group">
        <label for="emp">Empresa</label>
        <input type="text" name="emp" class="form-control" id="emp">
    </div>

    
    <center>
      <input type="submit" value="Registrar" class="btn btn-success" name="registrar">
      <input type="submit" value="Consultar" class="btn btn-primary" name="consultar">
      <input type="submit" value="Actualizar" class="btn btn-info" name="actualizar">
      <input type="submit" value="Eliminar" class="btn btn-danger" name="eliminar">
    </center>

  </form>

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