<?php
    $usuario = "root";
    $password = "";
    $servidor = "localhost";
    $basededatos = "examen2ceron";
    $conexion = mysqli_connect( $servidor, $usuario, "" ) or die ("No se ha podido conectar al servidor de Base de datos");
    $db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );

    $id=$_GET['COD_MODULO'];
    $buscar=mysqli_query($conexion,"SELECT * FROM seg_modulo WHERE COD_MODULO='$id'");
    //retorna un arrary
    $fila=mysqli_fetch_array($buscar);
    //consumo por clave valor
    $nombre=$fila['NOMBRE'];
    $estadoUno=$fila['ESTADO'];
    $estado='INA';

 $Sql_Query = "UPDATE seg_modulo SET NOMBRE= '$nombre', ESTADO = '$estado' WHERE COD_MODULO = $id";
        if(mysqli_query($conexion,$Sql_Query)){
            header('location: index.php');
            echo 'Conexion Correcta';}
            else{
            echo 'Conexion Incorrecta';}
        
        mysqli_close($conexion);
?>