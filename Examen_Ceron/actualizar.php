<?php
   $usuario = "root";
   $password = "";
   $servidor = "localhost";
   $basededatos = "examen2ceron";
   
   $conexion = mysqli_connect( $servidor, $usuario, "" ) or die ("No se ha podido conectar al servidor de Base de datos");
    
    $db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );

    $id=$_POST['id'];
    $nombre=$_POST['nombre'];
    $url=$_POST['url'];
    $descripcion=$_POST['descripcion'];



    $Sql_Query = "UPDATE seg_funcionalidad SET NOMBRE= '$nombre', URL_PRINCIPAL = '$url', DESCRIPCION = '$descripcion' WHERE COD_FUNCIONALIDAD = $id";
        if(mysqli_query($conexion,$Sql_Query)){
            header('location: index.php');
            echo 'Conexion Correcta';}
            else{
            echo 'Conexion Incorrecta';}
        
        mysqli_close($conexion);
?>