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


  <section class="header2edi">
			<div class="regresar-edi">
				<a href="admin (1).html"><img src="img/REGRESAR.png" alt="REGRESAR"></a>
			</div>
		</section>





  <section class="formedi">
    <center><h1>USUARIOS</h1></center>

    <form method="POST" action="editar_usuarios.php" >

    <div class="form-group">
      <label for="name">Nombre completo</label>
      <input type="text" name="name" class="form-control" id="name">
    </div>

    <div class="form-group">
        <label for="user">Usuario</label>
        <input type="text" name="user" class="form-control" id="user" >
    </div>

    <div class="form-group">
        <label for="pass">Contraseña</label>
        <input type="text" name="pass" class="form-control" id="pass">
    </div>

    
    <center>
      <input type="submit" value="Registrar" class="btn btn-success" name="btn_registrar">
      <input type="submit" value="Consultar" class="btn btn-primary" name="btn_consultar">
      <input type="submit" value="Actualizar" class="btn btn-info" name="btn_actualizar">
      <input type="submit" value="Eliminar" class="btn btn-danger" name="btn_eliminar">
    </center>

  </form><br><br>

  </section>

  

  <?php
    include("conexion.php");
      
      $name    ="";
      $user ="";
      $pass    ="";

      if(isset($_POST['btn_registrar']))
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
          }
      }

      if(isset($_POST['btn_consultar']))
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

      if(isset($_POST['btn_actualizar']))
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

      if(isset($_POST['btn_eliminar']))
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