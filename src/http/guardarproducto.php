<?php
use App\Modelos\productos;
require __DIR__.'/../../vendor/autoload.php';

if(isset($_POST['agregar']))
{
    $productos = new productos();
    extract($_POST);
    extract($_FILES);
    $dir = __DIR__.'/../../productosimg/';
    $pathinfo = pathinfo($imagen['name']);
    $filename = $pathinfo["filename"];
    $extension = $pathinfo["extension"];
    $name= "{$filename}.{$extension}";
    $real_path = "{$dir}{$filename}.{$extension}";
    
    if(!file_exists($real_path))
    {
        move_uploaded_file($imagen["tmp_name"],$real_path);
        $productos->agregar_imagen($name);
        $imagenid = $productos->get_lastid();
        $productos->agregar_producto($nombre,$marca,$tipo_lente,$descripcion,$imagenid,$precio,$stock,$categoria);
        header('Location: /../../admin/app/aggimg.php');
    }
    else{
        echo 'Archivo existente';
    }
}

?>