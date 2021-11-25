<?php 
if(isset($_POST['btn'])){
    $msg=null;
if(isset($_POST["directorio"])){
    $carpeta=htmlspecialchars($_POST["carpeta"]);
    $ruta="archivos2/";
    $directorio=$ruta.$carpeta;

    if(!is_dir($directorio)){
        $crear= mkdir($directorio, 0777, true);
        if($crear){
            
            $msg="Directorio creado con exito";
            $msg.=" lo puedes ver en <a href='$directorio'>este link</a>";
    
        }else{
            $msg="ha ocurrido un error al crear el directorio";
        }
    }else{
        $msg="el directorio ya existe";
    }

    
}

}

if(isset($_POST['btn2'])){
    $msg2=null;
if(isset($_POST["escribir"])){
    $nombre=htmlspecialchars($_POST["nombre"]);
    $contenido=$_POST["contenido"];
    $ruta2= "archivos2/".$nombre.".txt";

    $manejador= fopen($ruta2, 'a');

    if(fwrite($manejador, $contenido)){
        $msg2="Archivo creado con exito ";
        $msg2.=" lo puedes ver en <a href='archivos2/'>este link</a>";
    }
    else{
        $msg2 = "ocurrio un error en la creacion del archivo";
    }
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>creacion de archivos y directorios</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h1>Creacion de directorio</h1>
    <strong><?php if(isset($msg)) echo $msg ?></strong>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
    
        <table>
            <tr>
                <td>Nombre del Directorio: </td>
                <td><input type="text" name="carpeta" id="carpeta"></td>
            </tr>
        </table>

        <input type="hidden" name="directorio" id="directorio">
        <input type="submit" value="Crear Directorio" name="btn" class="btn">
    
    </form>

    <h1>Creacion de archivo</h1>
    <strong><?php if(isset($msg2)) echo $msg2 ?></strong>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
    
        <table>
            <tr>
                <td>Nombre del archivo: </td>
                <td><input type="text" name="nombre" id="nombre"></td>
            </tr>
            
            <tr>
                <td>Contenido del archivo: </td>
                <td><textarea name="contenido" cols="30" rows="10"></textarea></td>
            </tr>
        </table>

        <input type="hidden" name="escribir" id="escribir">
        <input type="submit" value="Crear Archivo" name="btn2" class="btn">
    
    </form>
</body>
</html>