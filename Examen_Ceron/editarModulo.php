<!DOCTYPE html>
<html>
<head>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<?php
  $usuario = "root";
  $password = "";
  $servidor = "localhost";
  $basededatos = "examen2ceron";
  $conexion = mysqli_connect( $servidor, $usuario, "" ) or die ("No se ha podido conectar al servidor de Base de datos");
  $db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
    $id=$_GET['COD_MODULO'];
    $buscar=mysqli_query($conexion,"SELECT * FROM seg_modulo WHERE COD_MODULO='$id'");
     $fila=mysqli_fetch_array($buscar);
     $nombre=$fila['NOMBRE'];
     $estado=$fila['ESTADO'];


?>
<body>
  <div>
        <h2>Editar Modulo</h2>
        <form method="POST" action="actualizarmodulo.php">
        <input type="hidden" name="id" value="<?php echo $id;?>">
        <label> Nombre</label>
        <input type="text" name="nombre" value="<?php echo $nombre;?>">
        </br></br>
        <label> ESTADO</label>
        <input type="text" name="estado" value="<?php echo $estado;?>">
        </br></br>
        <input class="btn btn-primary" type="submit" value="Actualizar" name="">
        <a class="btn btn-secondary" href="modulos.php" role="button" aria-pressed="true">Volver</a>
        </form>
</div>

</body>
</html>