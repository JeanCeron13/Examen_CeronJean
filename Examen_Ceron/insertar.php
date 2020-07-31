<?PHP 
    $nombre=$_POST['nombre'];
    $url=$_POST['url'];
    $descripcion=$_POST['descripcion'];
    if(!empty($nombre)||!empty($tipo)||!empty($costo)||!empty($cantidad)){
        $usuario = "root";
        $password = "";
        $servidor = "localhost";
        $basededatos = "examen2ceron";
        $conexion = mysqli_connect( $servidor, $usuario, "" ) or die ("No se ha podido conectar al servidor de Base de datos");
        $db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
        //Inserto datos
        $sql="insert into seg_funcionalidad (URL_PRINCIPAL,NOMBRE,DESCRIPCION) values('".$nombre."','".$url."','".$descripcion."')";
        if($conexion -> query($sql)===TRUE){
            $conexion-> insert_id;
            header("location:index.php");
        }
    }else {
        echo "Los campos son requeridos";
        die();
       }
?>