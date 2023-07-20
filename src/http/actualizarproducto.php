<?php
use App\Modelos\productos;
require __DIR__.'/../../vendor/autoload.php';
if(isset($_POST['editar']))
{
    $productos = new productos();
    extract($_POST);
    extract($_FILES);
    $dir = __DIR__.'/../../productosimg/';
    $pathinfo = pathinfo($imagen['name']);
    $filename = $pathinfo["filename"];
    $extension = isset($pathinfo["extension"]) ? $pathinfo["extension"] : '';
    $name= "{$filename}.{$extension}";
    $real_path = "{$dir}{$filename}.{$extension}";

    if(!file_exists($real_path))
    {

        move_uploaded_file($imagen['tmp_name'],$real_path);
        $productos->actualizarproducto($nombre,$descripcion,$precio,$categoria,$tipo_lente,$marca,$stock,$id);
        $productos->actualizarimg($name,$id);
        header('Location: /../../admin/app/aggimg.php');
    }
    else {
        $productos->actualizarproducto($nombre,$descripcion,$precio,$categoria,$tipo_lente,$marca,$stock,$id);
        header('Location: /../../admin/app/aggimg.php');
    }

}