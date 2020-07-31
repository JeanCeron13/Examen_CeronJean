<!DOCTYPE html>
<html>
<head>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
    <title>EXAMEN CRUD</title>
<body>
    <?php
    $usuario = "root";
    $password = "";
    $servidor = "localhost";
    $basededatos = "examen2ceron";
    $conexion = mysqli_connect( $servidor, $usuario, "" ) or die ("No se ha podido conectar al servidor de Base de datos");
    $db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
    $consulta = "SELECT * FROM seg_funcionalidad";
    $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
    ?>
    <div>
    <h1></h1>
    <a class="btn btn-primary" href="index.php" role="button">FUNCIONALIDAD</a>
    <h1></h1>
    <h1></h1>
    <a class="btn btn-primary" href="modulos.php" role="button">MODULOS</a>
    <h1></h1>

    <select id="modulos" name="anmodulosimal">                      
    <option value="0">--Seleccione el modulo--</option>
    <option value="1">Seguridad</option>
    <option value="2">Web</option>
    <option value="3">Finanzas</option>
    </select>
        <h1></h1>
    <a class="btn btn-primary" href="#" role="button">Buscar</a>
    <h1></h1>
    <a class="btn btn-primary" href="agregar.html" role="button">Registrar</a>
   

    <?PHP
    echo "<table class=table table-bordered>";
	echo "<tr>";
	echo "<th>NOMBRE</th>";
    echo "<th>URL</th>";
    echo "<th>DESCRIPCION</th>";
	echo "</tr>";
	while ($columna = mysqli_fetch_array( $resultado ))
	{
  
        echo "<tr>";
        echo "<td>" . $columna['NOMBRE'] ."</td>
        <td>" . $columna['URL_PRINCIPAL'] ."</td>
        <td>".$columna['DESCRIPCION']."</td>
        <td>
            <button type='button' class='btn btn-warning'><a href='editar.php?COD_FUNCIONALIDAD=".$columna["COD_FUNCIONALIDAD"]."'>Editar</a></button>
            <button type='button' class='btn btn-danger'><a href='eliminar.php?COD_MODULO=".$columna["COD_MODULO"]."'>Eliminar</a></button>
            
        </td>";
        echo "</tr>";
        
	}
	echo "</table>"; 
    mysqli_close( $conexion );
    ?>
    </div>
    
</body>
</html>