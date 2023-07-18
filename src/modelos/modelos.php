<?php
use App\Modelos\Conexion;

class registrar{
    
    public function agregar($nombre,$descripcion,$precio,$lastid)
    {
        $query = $this->pdo->prepare("INSERT INTO productos(nombre,descripcion,precio,imagen) VALUES (?,?,?,?)");
        $query->execute([$nombre,$descripcion,$precio,$lastid]);
    }
}
?>